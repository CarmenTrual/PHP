<?php
require_once("models/Tarea.php");  // Modelos
require_once("View.php");          // Plantilla de vista

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
    
    $data["listaTareas"] = $this->tarea->getAll();
    View::render("tarea/all", $data);
  }

// --------------------------------- BORRAR TAREA ----------------------------------------
  public function borrarTarea() {
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
} 