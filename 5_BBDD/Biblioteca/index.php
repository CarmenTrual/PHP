<!-- BIBLIOTECA VERSIÓN 1
  Características de esta versión:
  - Código monolítico (sin arquitectura MVC)
  - Sin seguridad
  - Sin sesiones ni control de acceso
  - Sin reutilización de código
-->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
</head>

<body>
  <?php

  // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
  } else {
    $action = "mostrarListaLibros";  // Acción por defecto
  }

  if ($action == "mostrarListaLibros") {
    mostrarListaLibros();
  }
  if ($action == "formularioInsertarLibros") {
    formularioInsertarLibros();
  }
  if ($action == "insertarLibro") {
    insertarLibro();
  }
  if ($action == "borrarLibro") {
    borrarLibro();
  }
  if ($action == "formularioModificarLibro") {
    formularioModificarLibro();
  }
  if ($action == "modificarLibro") {
    modificarLibro();
  }
  if ($action == "buscarLibros") {
    buscarLibros();
  }
  if ($action == "formularioInsertarAutores") {
    formularioInsertarAutores();
  }
  if ($action == "insertarAutor") {
    insertarAutor();
  }


  // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
  function mostrarListaLibros()
  {
    echo "<h1>Biblioteca</h1>";
    //Conecta con la BD y comprueba si hay libros. Si no hay muestra un mensaje indicando que no hay libros.
    
    //En el caso que haya libros. Muestra los libros y además, muestra un formulario de búsqueda y que busque por el título del libro.

    $db = new mysqli("db", "root", "test", "biblioteca");
    $result = $db->query();
    // Buscamos todos los libros de la biblioteca
    if ($result = $db->query("SELECT * FROM libros
    INNER JOIN escriben ON libros.idLibro = escriben.idLibro
    Inner join personas ON escriben.idPersona =  "))//SIN TERMINAR DE COPIARLO


    if ($result->num_rows != 0) {

    
    
    } else {
    // La consulta no contiene registros
    echo "No se encontraron datos";
    }
    echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
  }

  echo "form action='index.php'>
  <input type = 'hedden' name='action' value='buscarLibros'>
  <input type = 'text' name='textoBusqueda'>
  <input type = 'submit' value='buscar'>
  </form>";

  //Ahora, la tabla con los datos de los libros
  echo "<table border = '1'>";
  while ($fila = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$fila["titulo"]."</td>";
    echo "<td>".$fila["genero"]."</td>";
    echo "<td>".$fila["pais"]."</td>";
  }



  // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

  function formularioInsertarLibros()
  {
    echo "<h1>Modificación de libros</h1>";

    // Crear el formulario con los campos del libro
    echo "<form action = 'index.php' method = 'get'>
      Título:<input type='text' name='titulo'><br>
      Género:<input type='text' name='genero'><br>
      País:<input type='text' name='pais'><br>
      Año:<input type='text' name='ano'><br>
      Número de páginas:<input type='text' name='numPaginas'><br>";

    // Añadimos un select para seleccionar id del autor o autores
    $db = new mysqli("db", "root", "test", "biblioteca");
    $result = $db->query("");
    echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

    // Finalizamos el formulario
    echo "  <input type='hidden' name='action' value='insertarLibro'>
    <input type='submit'>
		</form>";
    echo "<p><a href='index.php'>Volver</a></p>";
  }

  // --------------------------------- INSERTAR LIBROS ----------------------------------------

  function insertarLibro()
  {
    echo "<h1>Alta de libros</h1>";

    // Vamos a procesar el formulario de alta de libros
    // Primero, recuperamos todos los datos del formulario (titulo, género...)
      

    // Lanzamos el INSERT contra la BD.
    if ($db->affected_rows == 1) {
      // Si la inserción del libro ha funcionado, continuamos insertando en la tabla "escriben"
      // Tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar
      
      // Ya podemos insertar todos los autores junto con el libro en "escriben"
      
    echo "Libro insertado con éxito";
    } else {
      // Si la inserción del libro ha fallado, mostramos mensaje de error
      echo "Ha ocurrido un error al insertar el libro. Por favor, inténtelo más tarde.";
    }
    echo "<p><a href='index.php'>Volver</a></p>";
  }

  // --------------------------------- BORRAR LIBROS ----------------------------------------

  function borrarLibro()
  {
    echo "<h1>Borrar libros</h1>";

    // Recuperamos el id del libro y lanzamos el DELETE contra la BD
    
    // Mostramos mensaje con el resultado de la operación
    if ($db->affected_rows == 0) {
      echo "Ha ocurrido un error al borrar el libro. Por favor, inténtelo de nuevo";
    } else {
      echo "Libro borrado con éxito";
    }
    echo "<p><a href='index.php'>Volver</a></p>";
  }

  // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

  function formularioModificarLibro()
  {
    echo "<h1>Modificación de libros</h1>";

    // Recuperamos el id del libro que vamos a modificar y sacamos el resto de sus datos de la BD
      
    // Creamos el formulario con los campos del libro
    // y lo rellenamos con los datos que hemos recuperado de la BD
    

    // Vamos a añadir un selector para el id del autor o autores.
    // Para que salgan preseleccionados los autores del libro que estamos modificando, vamos a buscar
    // también a esos autores.
    
    // Vamos a convertir esa lista de autores del libro en un array de ids de personas
    
    
    // Ya tenemos todos los datos para añadir el selector de autores al formulario
    
    
    // Por último, un enlace para crear un nuevo autor
    echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

    // Finalizamos el formulario
    echo "  <input type='hidden' name='action' value='modificarLibro'>
      <input type='submit'>
      </form>";
      echo "<p><a href='index.php'>Volver</a></p>";
    }

  // --------------------------------- MODIFICAR LIBROS ----------------------------------------

  function modificarLibro()
  {
    echo "<h1>Modificación de libros</h1>";

    // Vamos a procesar el formulario de modificación de libros
    // Primero, recuperamos todos los datos del formulario (idLibro, titulo....)
    
    // Lanzamos el UPDATE contra la base de datos.
    
    
    if ($db->affected_rows == 1) {
      // Si la modificación del libro ha funcionado, continuamos actualizando la tabla "escriben".
      // Primero borraremos todos los registros del libro actual y luego los insertaremos de nuevo
      
      

      // Ya podemos insertar todos los autores junto con el libro en "escriben"
      
      echo "Libro actualizado con éxito";
    } else {
      // Si la modificación del libro ha fallado, mostramos mensaje de error
      echo "Ha ocurrido un error al modificar el libro. Por favor, inténtelo más tarde.";
    }
      echo "<p><a href='index.php'>Volver</a></p>";
  }

  // --------------------------------- BUSCAR LIBROS ----------------------------------------

  function buscarLibros()
  {
    // Recuperamos el texto de búsqueda de la variable de formulario
    
    echo "<h1>Resultados de la búsqueda: \"$textoBusqueda\"</h1>";

    // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
    if(){
    // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
      if ($result->num_rows != 0) {
        // La consulta ha devuelto registros: vamos a mostrarlos
        // Primero, el formulario de búsqueda
    
        // Después, la tabla con los datos
    
      } else {
        // La consulta no contiene registros
        echo "No se encontraron datos";
      }
    } else {
      // La consulta ha fallado
        echo "Error al tratar de recuperar los datos de la base de datos. Por favor, inténtelo más tarde";
    }
    echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
    echo "<p><a href='index.php'>Volver</a></p>";
  }
  // --------------------------------- FORMULARIO Insetar Autores ----------------------------------------

  function formularioInsertarAutores()
  {
    echo "<h1>Insertar autores</h1>";

    echo "<form action = 'index.php' method = 'get'>
          Nombre:<input type='text' name='nombre'><br>
          Apellido:<input type='text' name='apellido'><br>";

    // Finalizamos el formulario
    echo "  <input type='hidden' name='action' value='insertarAutor'>
		<input type='submit'>
		</form>";
    echo "<p><a href='index.php'>Volver</a></p>";
  }
  // --------------------------------- INSERTAR autores ----------------------------------------


  function insertarAutor()
  {
    echo "<h1>Alta de autores</h1>";

    // Vamos a procesar el formulario de alta de libros
    // Primero, recuperamos todos los datos del formulario (nombre, apellido)
    
    
    // Lanzamos el INSERT contra la BD.
    
    
    if ($db->affected_rows == 1) {

      echo "Autor insertado con éxito";
    } else {
      // Si la inserción del libro ha fallado, mostramos mensaje de error
      echo "Ha ocurrido un error al insertar el autor. Por favor, inténtelo más tarde.";
    }
    echo "<p><a href='index.php'>Volver</a></p>";
  }
  ?>

</body>
</html>