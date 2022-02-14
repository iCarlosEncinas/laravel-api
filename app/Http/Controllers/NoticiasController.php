<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;

class NoticiasController extends Controller
{
    public function index() {
        $noticias = Noticia::all();
        $argumentos = array();
        $argumentos['noticias'] = $noticias;
        return view("noticias.index", $argumentos);
    }

    public function create() {
        return view('noticias.create');
    }

    public function store(Request $request) {
        $nuevaNoticia = new Noticia();
        $nuevaNoticia->titulo = $request->input('titulo');
        $nuevaNoticia->autor = $request->input('autor');
        $nuevaNoticia->fecha = $request->input('fecha');
        $nuevaNoticia->noticia = $request->input('noticia');
        
        if ($nuevaNoticia->save()){
            return redirect()->route('noticias.index')->with('exito','Noticia creada con èxito');
        }
        return redirect()->route('noticias.index')->with('error', 'No se pudo crear noticia');
    }
    
    public function edit($id){
        $noticia = Noticia::find($id);
        
        if($noticia){
            $argumentos = array(); 
            $argumentos['noticia'] = $noticia;
            return view('noticias.edit', $argumentos);
        }
        
        return redirect()->route('noticias.index')->with('error', 'No se encontró la noticia.');
        
    }
    
    public function update($id, Request $request){
        $noticia = Noticia::find($id);
        
        if($noticia){
            $noticia->titulo = $request->input('titulo');
            $noticia->autor = $request->input('autor');
            $noticia->fecha = $request->input('fecha');
            $noticia->noticia = $request->input('noticia');
            
            if($noticia->save()){
                return redirect()->route('noticias.edit', $noticia->id)->with('éxito', 'Se actualizo con exito la noticia');
            }
            return redirect()->route('noticias.edit', $noticia->id)->with('error', 'No se actualizo la noticia.');
        }
        return redirect()->route('noticias.index')->with('error', 'no se encontró la noticia');
    }

    public function destroy($id){
        $noticia = Noticia::find($id);
        if ($noticia){
            //si la encuentra, la borra
            if($noticia->delete()){
                return redirect()->route('noticias.index')->with('exito', 'noticia eliminada');
            }
            return redirect()->route('noticias.index')->with('error', 'No se pudo eliminar noticia.');
        }
        return redirect()->route('noticias.index')->with('error', 'no se encontró la noticia');
    }
}
