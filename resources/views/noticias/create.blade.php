<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear noticia</title>
</head>
<body>
    <h1>Nueva Noticia</h1>
    <a href="{{route('noticias.index')}}">Regresar</a>
    <form method="post" action="{{route('noticias.store')}}">
        @csrf
        <label>Titulo</label>
        <input name="titulo" type="text">
        <label>Autor</label>
        <input name="autor" type="text">
        <label>Fecha</label>
        <input name="fecha" type="date">
        <label>Noticia</label>
        <textarea name="noticia" rows="5"></textarea>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>