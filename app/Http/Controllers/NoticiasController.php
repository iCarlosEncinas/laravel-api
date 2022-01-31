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
}
