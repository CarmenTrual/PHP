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

    // Mostramos la lista de tareas actualizada del usuario logueado
    $data["listaTareas"] = $this->tarea->tareasDelUsuario($usuarioId);
    View::render("tarea/all", $data);
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

    // Obtener las tareas actualizadas del usuario logueado y mostrarlas
    $data["listaTareas"] = $this->tarea->tareasDelUsuario($usuarioId);
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
  /*public function modificarTarea() {
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
    // Recuperamos todas las tareas del usuario logueado y las mostramos en la vista "tarea/all"
    $usuarioId = $_SESSION["usuario_id"]; // Obtenemos el ID del usuario logueado
    $data["listaTareas"] = $this->tarea->tareasDelUsuario($usuarioId);
    View::render("tarea/all", $data);
  }*/


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

    // Pedimos al modelo que haga la verificación y el update
    $result = $this->tarea->update($id, $titulo, $descripcion, $usuarioLogueado);

    // Verificamos el resultado de la actualización
    if (!$result) {
        // Aquí puedes manejar el error como prefieras
        die("Error al actualizar.");
    }

    // Recuperamos todas las tareas del usuario logueado y las mostramos en la vista "tarea/all"
    $data["listaTareas"] = $this->tarea->tareasDelUsuario($usuarioLogueado);
    View::render("tarea/all", $data);
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
