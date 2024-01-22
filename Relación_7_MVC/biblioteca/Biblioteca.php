<?php
include_once("models/libro.php");  // Modelos
include_once("models/persona.php");
include_once("View.php");          // Plantilla de vista

class Biblioteca {
        private $db;             // Conexión con la base de datos
        private $libro, $persona;// Modelos

        public function __construct() {
            $this->libro = new Libro();
            $this->persona = new Persona();
        }

        // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
        public function mostrarListaLibros() {
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);
        }

        // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

        public function formularioInsertarLibros() {
            $data["todosLosAutores"] = $this->persona->getAll();
            $data["autoresLibro"] = array();  // Array vacío (el libro aún no tiene autores asignados)
            View::render("libro/form", $data);
        }

        // --------------------------------- INSERTAR LIBROS ----------------------------------------

        public function insertarLibro() {
            // Primero, recuperamos todos los datos del formulario
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $ano = $_REQUEST["ano"];
            $numPaginas = $_REQUEST["numPaginas"];
            $autores = $_REQUEST["autor"];            

            $result = $this->libro->insert($titulo, $genero, $pais, $ano, $numPaginas);
            if ($result == 1) {
                // Si la inserción del libro ha funcionado, continuamos insertando los autores, pero
                // necesitamos conocer el id del libro que acabamos de insertar
                $idLibro = $this->libro->getMaxId();
                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                $result = $this->libro->insertAutores($idLibro, $autores);
                
            } 
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);

        }

        // --------------------------------- BORRAR LIBROS ----------------------------------------

          public function borrarLibro() {
            // Recuperamos el id del libro que hay que borrar
            $idLibro = $_REQUEST["idLibro"];
            // Pedimos al modelo que intente borrar el libro
            $result = $this->libro->delete($idLibro);
 
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);

        }

        // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

        public function formularioModificarLibro() {
            // Recuperamos los datos del libro a modificar
            $idLibro = $_REQUEST["idLibro"];
            $data["libro"] = $this->libro->get($idLibro)[0];
            // Renderizamos la vista de inserción de libros, pero enviándole los datos del libro recuperado.
            // Esa vista necesitará la lista de todos los autores y, además, la lista
            // de los autores de este libro en concreto.
            $data["todosLosAutores"] = $this->persona->getAll();
            $data["autoresLibro"] = $this->persona->getAutores($_REQUEST["idLibro"]);
            View::render("libro/form", $data);
        }

        // --------------------------------- MODIFICAR LIBROS ----------------------------------------

        public function modificarLibro() {
            // Primero, recuperamos todos los datos del formulario
            $idLibro = $_REQUEST["idLibro"];
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $ano = htmlspecialchars($_REQUEST["ano"]);
            $numPaginas = $_REQUEST["numPaginas"];
            $autores = $_REQUEST["autor"];

            // Pedimos al modelo que haga el update
            $result = $this->libro->update($idLibro, $titulo, $genero, $pais, $ano, $numPaginas);
           
            // Eliminamos todos los autores asociados con el libro en "escriben"
            $result = $this->libro->deleteAutores($idLibro);
           
            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            $result = $this->libro->insertAutores($idLibro, $autores);
                
            
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);
        }

        // --------------------------------- BUSCAR LIBROS ----------------------------------------

        public function buscarLibros() {
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            // Buscamos los libros que coinciden con la búsqueda
            $data["listaLibros"] = $this->libro->search($textoBusqueda);
            // Mostramos el resultado en la misma vista que la lista completa de libros
            View::render("libro/all", $data);
        }

        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            $data["listaPersonas"] =  $this->persona->getAll();
            View::render("persona/all",$data);
        }   
        public function formularioInsertarPersonas() {
            View::render("persona/form");
        }

        public function insertarPersona() {
            // Primero, recuperamos todos los datos del formulario
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];          

            $result = $this->persona->insert($nombre, $apellidos);
           
            $data["listaPersonas"] = $this->persona->getAll();
            View::render("persona/all", $data);

        }

        public function borrarPersona() {
            // Recuperamos el id de la persona que hay que borrar
            $idPersona = $_REQUEST["idPersona"];
            // Pedimos al modelo que intente borrar el libro
            $result = $this->persona->delete($idPersona);
 
            $data["listaPersonas"] = $this->persona->getAll();
            View::render("persona/all", $data);

        }
    } // class