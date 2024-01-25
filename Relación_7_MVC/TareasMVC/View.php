<?php

// PLANTILLA DE LAS VISTAS

class View {
    public static function render($nombreVista, $data = null) {
        session_start(); 

//Comprobamos si hay un usuario en la sesión
if(isset($_SESSION['usuario'])) { 
    }
        include("views/header.php");
        include("views/nav.php");
        include("views/$nombreVista.php");
        include("views/footer.php");
    }
}