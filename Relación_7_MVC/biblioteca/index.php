<!-- BIBLIOTECA VERSIÓN 3
     Características de esta versión:
       - Código con arquitectura MVC
       - Un solo controlador
       - Con capa de abstracción de datos
-->
<?php
    include_once("TareaController.php");  

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaTareas";  // Acción por defecto
    }

    // Creamos un objeto de tipo TareaController y llamamos al método $action()
    $controller = new TareaController();
    $controller->$action();

    