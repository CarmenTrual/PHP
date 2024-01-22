<?php
// VISTA PARA INSERCIÓN/EDICIÓN DE LIBROS

extract($data);   // Extrae el contenido de $data y lo convierte en variables individuales ($libro, $todosLosAutores y $autoresLibro)
//echo extract($data);
//echo (int)$autoresLibro[0]->idPersona;
// Vamos a usar la misma vista para insertar y modificar. Para saber si hacemos una cosa u otra,
// usaremos la variable $libro: si existe, es porque estamos modificando un libro. Si no, estamos insertando uno nuevo.
if (isset($libro)) {   
    echo "<h1>Modificación de libros</h1>";
} else {
    echo "<h1>Inserción de libros</h1>";
}

// Sacamos los datos del libro (si existe) a variables individuales para mostrarlo en los inputs del formulario.
// (Si no hay libro, dejamos los campos en blanco y el formulario servirá para inserción).
$idLibro = $libro->idLibro ?? ""; 
$titulo = $libro->titulo ?? "";
$genero = $libro->genero ?? "";
$pais = $libro->pais ?? "";
$ano = $libro->año ?? "";
$numPags = $libro->numPaginas ?? "";

// Creamos el formulario con los campos del libro
echo "<form action = 'index.php' method = 'get'>
        <input type='hidden' name='idLibro' value='".$idLibro."'>
        Título:<input type='text' name='titulo' value='".$titulo."'><br>
        Género:<input type='text' name='genero' value='".$genero."'><br>
        País:<input type='text' name='pais' value='".$pais."'><br>
        Año:<input type='text' name='ano' value='".$ano."'><br>
        Número de páginas:<input type='text' name='numPaginas' value='".$numPags."'><br>";
echo "Autores: <select name='autor[]' multiple size='3'>";

foreach ($todosLosAutores as $fila) {
    $idsAutoresLibro = array_map(function ($autorLibro) {
        return $autorLibro->idPersona;
    }, $autoresLibro);
    if (in_array($fila->idPersona, $idsAutoresLibro))
        echo "<option value='$fila->idPersona' selected>$fila->nombre $fila->apellido</option>";
    else
        echo "<option value='$fila->idPersona'>$fila->nombre $fila->apellido</option>";
}
echo "</select>";

// Finalizamos el formulario
if (isset($libro)) {
    echo "  <input type='hidden' name='action' value='modificarLibro'>";
} else {
    echo "  <input type='hidden' name='action' value='insertarLibro'>";
}
echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";