<?php
include_once("models/Tarea.php");  // Modelos
include_once("View.php");          // Plantilla de vista

class TareaController {
  private $db;             // Conexión con la base de datos
  private $tarea;// Modelos

  public function __construct() {
    $this->tarea = new Tarea(); 
    }

// --------------------------------- MOSTRAR LISTA DE TAREAS ----------------------------------------
  public function mostrarListaTareas() {
    $data["listaTareas"] = $this->tarea->getAll();
    View::render("tarea/all", $data);
  }

// --------------------------------- FORMULARIO ALTA DE TAREAS ----------------------------------------

  public function formularioInsertarTarea() {
    $data["tareas"] = $this->tarea->getAll();
    View::render("tarea/form", $data);
  }

// --------------------------------- INSERTAR TAREAS ----------------------------------------

  public function insertarTarea() {
    // Primero, recuperamos todos los datos del formulario
    $titulo = $_REQUEST["titulo"];
    $descripcion = $_REQUEST["descripcion"];          

    $result = $this->tarea->insert($titulo, $descripcion);
    //if ($result == 1) {
    // Si la inserción de la tarea ha funcionado, continuamos insertando los autores, pero
    // necesitamos conocer el id del libro que acabamos de insertar
    //$idLibro = $this->libro->getMaxId();
    // Ya podemos insertar todos los autores junto con el libro en "escriben"
    //$result = $this->libro->insertAutores($idLibro, $autores);
    //} 
    $data["listaTareas"] = $this->tarea->getAll();
    View::render("tarea/all", $data);
  }

// --------------------------------- BORRAR TAREA ----------------------------------------
  public function borrarTarea() {
    echo "hola";
    // Recuperamos el id de la tarea que hay que borrar
    $id = $_REQUEST["id"];
    // Pedimos al modelo que intente borrar la tarea
    $result = $this->tarea->deleteTarea($id);

    $data["listaTareas"] = $this->tarea->getAll();
    View::render("tarea/all", $data);
  }

// --------------------------------- FORMULARIO MODIFICAR TAREA ----------------------------------------
  public function formularioModificarTarea() {
    // Recuperamos los datos de la tarea a modificar
    $id = $_REQUEST["id"];
    $data["tarea"] = $this->tarea->get($id)[0];
    // Renderizamos la vista de inserción de libros, pero enviándole los datos del libro recuperado.
    // Esa vista necesitará la lista de todos los autores y, además, la lista
    // de los autores de este libro en concreto.
    //$data["todosLosAutores"] = $this->persona->getAll();
    //$data["autoresLibro"] = $this->persona->getAutores($_REQUEST["idLibro"]);
    View::render("tarea/form", $data);
  }

// --------------------------------- MODIFICAR TAREA ----------------------------------------
  public function modificarTarea() {
    // Primero, verificamos que todos los datos del formulario estén presentes
    if (!isset($_REQUEST["id"]) || !isset($_REQUEST["titulo"]) || !isset($_REQUEST["descripcion"])) {
      // Manejo de errores
      die("Faltan datos del formulario");
  }

    // Recuperamos todos los datos del formulario
    $id = $_REQUEST["id"];
    $titulo = $_REQUEST["titulo"];
    $descripcion = $_REQUEST["descripcion"];

    // Pedimos al modelo que haga el update
    $result = $this->tarea->update($id, $titulo, $descripcion);

    // Verificamos el resultado de la actualización
    if (!$result) {
      // Aquí puedes manejar el error como prefieras
      die("Error al actualizar.");
  }
    // Eliminamos todos los autores asociados con el libro en "escriben"
    //$result = $this->libro->deleteAutores($idLibro);

    // Ya podemos insertar todos los autores junto con el libro en "escriben"
    //$result = $this->libro->insertAutores($idLibro, $autores);

    // Recuperamos todas las tareas de la base de datos y las mostramos en la vista "tarea/all"
    $data["listaTareas"] = $this->tarea->getAll();
    View::render("tarea/all", $data);
  }

// --------------------------------- BUSCAR TAREA ----------------------------------------
  public function buscarTarea() {
    // Recuperamos el texto de búsqueda de la variable de formulario
    $textoBusqueda = $_REQUEST["textoBusqueda"];
    // Buscamos las tareas que coinciden con la búsqueda
    $data["listaTareas"] = $this->tarea->search($textoBusqueda);
    // Mostramos el resultado en la misma vista que la lista completa de tareas
    View::render("tarea/all", $data);
  }

// --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
  /*public function mostrarListaAutores() {
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

  }*/
} // class