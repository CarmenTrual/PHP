<?php
// VISTA PARA INSERCIÓN/EDICIÓN DE TAREA

extract($data);   
// Vamos a usar la misma vista para insertar y modificar. Para saber si hacemos una cosa u otra,
// usaremos la variable $tarea: si existe, es porque estamos modificando un tarea. Si no, estamos insertando uno nuevo.
if (isset($tarea)) {   
  echo "<h1>Modificación de tarea</h1>";
} else {
  echo "<h1>Inserción de tarea</h1>";
}

// Sacamos los datos de la tarea (si existe) a variables individuales para mostrarlo en los inputs del formulario.
// (Si no hay tarea, dejamos los campos en blanco y el formulario servirá para inserción).
$id = $tarea->id ?? ""; 
$titulo = $tarea->titulo ?? "";
$descripcion = $tarea->descripcion ?? "";

// Creamos el formulario con los campos de la tarea
echo "<form action = 'index.php' method = 'post'>
    <input type='hidden' name='id' value='".$id."'>
    Título:<input type='text' name='titulo' value='".$titulo."'><br>
    Descripción:<input type='text' name='descripcion' value='".$descripcion."'><br>";

// Finalizamos el formulario
if (isset($tarea)) {
  echo "  <input type='hidden' name='action' value='modificartarea'>";
} else {
  echo "  <input type='hidden' name='action' value='insertartarea'>";
}
echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";