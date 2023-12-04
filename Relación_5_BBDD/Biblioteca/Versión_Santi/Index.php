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
    <title>Biblioteca</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4285f4;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #4285f4;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            width: 50%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        input[type="text"],
        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4285f4;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #357ae8;
        }
    </style>

</head>

<body>
    <!--
-->
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
        $db = new mysqli("db", "root", "test", "biblioteca");

        if ($result = $db->query("SELECT * FROM libros
        INNER JOIN escriben ON libros.idLibro = escriben.idLibro
        INNER JOIN personas ON escriben.idPersona = personas.idPersona
        ORDER BY libros.titulo")) {
            // Buscamos todos los libros de la biblioteca
            if ($result->num_rows != 0) {
                // Mostrar los libros
                echo "<table border='1', align='center'>
                <tr>
                    <th>Título</th>
                    <th>Género</th>
                    <th>País</th>
                    <th>Año</th>
                    <th>Número de Páginas</th>
                    <th>Autor</th>
                    <th>Apellido</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>";

                while ($fila = $result->fetch_assoc()) {
                    echo "<tr>
                    <td style='text-align: center'>{$fila['titulo']}</td>
                    <td style='text-align: center'>{$fila['genero']}</td>
                    <td style='text-align: center'>{$fila['pais']}</td>
                    <td style='text-align: center'>{$fila['año']}</td>
                    <td style='text-align: center'>{$fila['numPaginas']}</td>
                    <td style='text-align: center'>{$fila['nombre']}</td>
                    <td style='text-align: center'>{$fila['apellido']}</td>
                    <td style='text-align: center'><a href = 'index.php?action=formularioModificarLibro&idLibro=" . $fila['idLibro'] . "'>Modificar</a></td>
                    <td style='text-align: center'><a href = 'index.php?action=borrarLibro&idLibro=" . $fila['idLibro'] . "'>Borrar</a></td>
                </tr>";
                }

                echo "</table>";
            } else {
                // La consulta no contiene registros
                echo "No se encontraron datos";
            }
            echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
        }
    }

    // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

    function formularioInsertarLibros()
    {
        echo "<h1>Alta de libros</h1>";

        // Crear el formulario con los campos del libro
        echo "<form action = 'index.php' method = 'get'>
                    Título:<input type='text' name='titulo'><br><br>
                    Género:<input type='text' name='genero'><br><br>
                    País:<input type='text' name='pais'><br><br>
                    Año:<input type='text' name='año'><br><br>
                    Número de páginas:<input type='text' name='numPaginas'><br>";
        echo "<br>";

        // Añadimos un select para seleccionar id del autor o autores
        $db = new mysqli("db", "root", "test", "biblioteca");
        $sql = "SELECT * FROM personas";
        $result = $db->query($sql);
        echo "Autores en nuestra BBDD: <br><br><select name='idPersona[]' multiple='true'>";
        while ($fila = $result->fetch_assoc()) {
            echo "<option value='{$fila['idPersona']}'>{$fila['nombre']} {$fila['apellido']}</option>";
        }
        echo "</select>";
        echo "<br><br>";

        // Añadimos un botón para añadir otro autor
        echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";
        echo "<br>";

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
        $titulo = $_REQUEST['titulo'];
        $genero = $_REQUEST['genero'];
        $pais = $_REQUEST['pais'];
        $año = $_REQUEST['año'];
        $numPaginas = $_REQUEST['numPaginas'];
        $idPersona = $_REQUEST['idPersona'];

        $db = new mysqli("db", "root", "test", "biblioteca");

        // Lanzamos el INSERT contra la BD.
        $db->query("INSERT INTO libros (titulo, genero, pais, año, numPaginas) VALUES ('$titulo', '$genero', '$pais', '$año', '$numPaginas')");

        if ($db->affected_rows == 1) {
            // Si la inserción del libro ha funcionado, continuamos insertando en la tabla "escriben"
            $result = $db->query("SELECT MAX(idLibro) AS ultimoIdLibro FROM libros");
            $idLibro = $result->fetch_assoc()['ultimoIdLibro'];
            foreach ($idPersona as $id) {
                $db->query("INSERT INTO escriben (idLibro, idPersona) VALUES (" . $idLibro . ", " . $id . ")");
                // Tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar

                // Ya podemos insertar todos los autores junto con el libro en "escriben"
            }
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
        $idLibro = $_REQUEST['idLibro'];

        $db = new mysqli("db", "root", "test", "biblioteca");

        $db->query("DELETE FROM libros WHERE idLibro = $idLibro");

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
        $idLibro = $_REQUEST['idLibro'];

        $db = new mysqli("db", "root", "test", "biblioteca");

        $result = $db->query("SELECT * FROM libros WHERE idLibro = $idLibro");

        if ($result->num_rows == 1) {
            $libro = $result->fetch_assoc();

            // Creamos el formulario con los campos del libro
            // y lo rellenamos con los datos que hemos recuperado de la BD
            echo "<form action='index.php' method='get'>
                Título:<input type='text' name='titulo' value='{$libro['titulo']}'><br><br>
                Género:<input type='text' name='genero' value='{$libro['genero']}'><br><br>
                País:<input type='text' name='pais' value='{$libro['pais']}'><br><br>
                Año:<input type='text' name='año' value='{$libro['año']}'><br><br>
                Número de páginas:<input type='text' name='numPaginas' value='{$libro['numPaginas']}'><br>";
            echo "<br>";


            // Vamos a añadir un selector para el id del autor o autores.
            // Para que salgan preseleccionados los autores del libro que estamos modificando, vamos a buscar
            // también a esos autores.
            $sqlAutores = "SELECT idPersona, nombre, apellido FROM personas";
            $resultAutores = $db->query($sqlAutores);

            $sqlAutoresLibro = "SELECT idPersona FROM escriben WHERE idLibro = $idLibro";
            $resultAutoresLibro = $db->query($sqlAutoresLibro);

            $autoresLibro = [];
            while ($row = $resultAutoresLibro->fetch_assoc()) {
                $autoresLibro[] = $row['idPersona'];
            }

            echo "Autores en nuestra BBDD: <br><br><select name='idPersona[]' multiple='true'>";
            while ($fila = $resultAutores->fetch_assoc()) {
                $selected = in_array($fila['idPersona'], $autoresLibro) ? 'selected' : '';
                echo "<option value='{$fila['idPersona']}' $selected>{$fila['nombre']} {$fila['apellido']}</option>";
            }
            echo "</select>";
            echo "<br><br>";

            // Agregamos un campo oculto para el idLibro
            echo "<input type='hidden' name='idLibro' value='$idLibro'>";

            // Por último, un enlace para crear un nuevo autor
            echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br><br>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='modificarLibro'>
                        <input type='hidden' name='idLibro' value='$idLibro'>
                        <input type='submit'>
                    </form>";
            echo "<p><a href='index.php'>Volver</a></p>";
        } else {
            echo "Error al recuperar datos del libro.";
        }
    }

    // --------------------------------- MODIFICAR LIBROS ----------------------------------------

    function modificarLibro()
    {
        echo "<h1>Modificación de libros</h1>";

        // Recuperamos el id del libro que vamos a modificar y sacamos el resto de sus datos de la BD
        $idLibro = $_REQUEST['idLibro'];

        $db = new mysqli("db", "root", "test", "biblioteca");

        // Verificar que el libro existe antes de modificarlo
        $comprobarQuery = "SELECT * FROM libros WHERE idLibro = $idLibro";
        $comprobarResult = $db->query($comprobarQuery);

        if ($comprobarResult->num_rows > 0) {
            // El libro existe, continuamos con la actualización

            $idLibro = $_REQUEST['idLibro'];
            $titulo = $_REQUEST['titulo'];
            $genero = $_REQUEST['genero'];
            $pais = $_REQUEST['pais'];
            $año = $_REQUEST['año'];
            $numPaginas = $_REQUEST['numPaginas'];
            $idPersona = $_REQUEST['idPersona'];

            // Lanzamos el UPDATE contra la base de datos.
            $updateQuery = "UPDATE libros SET titulo='$titulo', genero='$genero', pais='$pais', año='$año', numPaginas='$numPaginas' WHERE idLibro=$idLibro";
            if ($db->query($updateQuery)) {
                // Si la modificación del libro ha funcionado, continuamos actualizando la tabla "escriben".
                // Primero, borramos todos los registros del libro actual y luego los insertamos de nuevo
                $db->query("DELETE FROM escriben WHERE idLibro=$idLibro");

                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                foreach ($idPersona as $id) {
                    $db->query("INSERT INTO escriben (idLibro, idPersona) VALUES ($idLibro, $id)");
                }

                echo "Libro actualizado con éxito";
            } else {
                // Si la modificación del libro ha fallado, mostramos mensaje de error
                echo "Error al modificar el libro. Por favor, inténtelo más tarde. Detalles: " . $db->error;
            }
        } else {
            echo "El libro que intentas modificar no existe. Por favor, inténtelo más tarde.";
        }

        echo "<p><a href='index.php'>Volver</a></p>";
    }

    /*
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
    */
    // --------------------------------- FORMULARIO Insertar Autores ----------------------------------------

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

        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];

        $db = new mysqli("db", "root", "test", "biblioteca");


        // Lanzamos el INSERT contra la BD.
        $db->query("INSERT INTO personas(nombre, apellido) VALUES ('$nombre', '$apellido')");

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