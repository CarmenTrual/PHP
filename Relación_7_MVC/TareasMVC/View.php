<?php

// PLANTILLA DE LAS VISTAS

class View {
    public static function render($nombreVista, $data = null) {
        include("views/header.php");
        include("views/nav.php");
        include("views/$nombreVista.php");
        include("views/footer.php");
    }
}