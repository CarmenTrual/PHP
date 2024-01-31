<?php
session_start();
  require_once("TareaController.php");  

  // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
  } else {
    $action = "mostrarListaTareas";  // Acción por defecto
  }

  // Creamos un objeto de tipo TareaController y llamamos al método $action()
  $controller = new TareaController();
  $controller->$action();
?>