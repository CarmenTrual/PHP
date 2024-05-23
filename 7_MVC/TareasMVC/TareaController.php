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
  // Obtener el ID del usuario logueado desde la sesión
  $usuarioId = $_SESSION['usuario_id'];

  // Obtener solo las tareas del usuario logueado
  $data["listaTareas"] = $this->tarea->tareasDelUsuario($usuarioId);
  
  View::render("tarea/all", $data);
}

// --------------------------------- FORMULARIO ALTA DE TAREAS ----------------------------------------
  public function formularioInsertarTarea() {
    // Obtener solo las tareas del usuario logueado
    $data["tareas"] = $this->tarea->tareasDelUsuario($_SESSION["usuario_id"]);
    View::render("tarea/form", $data);
  }

// --------------------------------- INSERTAR TAREAS ----------------------------------------
public function insertarTarea() {
  // Primero, recuperamos todos los datos del formulario
  $titulo = $_REQUEST["titulo"];
  $descripcion = $_REQUEST["descripcion"];

  // Obtener el ID del usuario logueado desde la sesión
  $usuarioId = $_SESSION['usuario_id'];

  // Mensaje de depuración
  //echo "Antes de insertar la tarea. Usuario ID: $usuarioId"; 

  // Insertar la tarea asociada al usuario logueado
  $result = $this->tarea->insert($titulo, $descripcion);

  // Mensaje de depuración
  //echo "Después de insertar la tarea. Resultado: $result";

  if ($result) {
    // Obtener el ID de la tarea recién insertada
    $tareaId = $this->tarea->getMaxId();
    // Insertar la relación entre la tarea y el usuario en usuarios_tarea
    $this->tarea->insertRelacionUsuario($tareaId, $usuarioId);

    // Redirigir a la página que muestra la lista de tareas
    header('Location: index.php?action=mostrarListaTareas');
    exit;
  } 
}

// --------------------------------- BORRAR TAREA ----------------------------------------
  public function borrarTarea() {
    // Recuperamos el id de la tarea que hay que borrar
    $id = $_REQUEST["id"];

    // Obtener el ID del usuario logueado desde la sesión
    $usuarioId = $_SESSION['usuario_id'];

    // Llamamos a la función 
    $this->tarea->deleteTarea($id, $usuarioId);

    // Redirigir a la página que muestra la lista de tareas
    header('Location: index.php?action=mostrarListaTareas');
    exit;
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
    // Verificar si el usuario está logueado
    if (!isset($_SESSION['usuario_id'])) {
        // Si no está logueado
        header('Location: ../login.php');
        exit;
    }

    // Recuperamos todos los datos del formulario
    $id = $_REQUEST["id"];
    $titulo = $_REQUEST["titulo"];
    $descripcion = $_REQUEST["descripcion"];
    $usuarioLogueado = $_SESSION["usuario_id"]; // Obtenemos el ID del usuario logueado

    // Hacemos la verificación y el update
    $result = $this->tarea->update($id, $titulo, $descripcion, $usuarioLogueado);

    // Verificamos el resultado de la actualización
    if (!$result) {
        // Manejo de error 
        die("Error al actualizar la tarea.");
    }

    // Redirigir a la página que muestra la lista de tareas
    header('Location: index.php?action=mostrarListaTareas');
    exit;
}


// --------------------------------- BUSCAR TAREA ----------------------------------------
public function buscarTarea() {
  // Recuperamos el texto de búsqueda de la variable de formulario
  $textoBusqueda = $_REQUEST["textoBusqueda"];

   // Verificar si el usuario está logueado
    if (isset($_SESSION['usuario_id'])) {
        $usuarioLogueado = $_SESSION['usuario_id'];

        // Buscamos las tareas que coinciden con la búsqueda y el usuario logueado
        $data["listaTareas"] = $this->tarea->search($textoBusqueda, $usuarioLogueado);

        // Mostramos el resultado en la misma vista que la lista completa de tareas
        View::render("tarea/all", $data);
        return;
    }
  }  
}
