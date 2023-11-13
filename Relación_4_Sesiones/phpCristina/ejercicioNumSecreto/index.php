<?php
session_start();

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 4;
    $_SESSION['numSecreto'] = rand(0, 9999);
} else {
    $_SESSION["intentos"]--;
}

if (isset($_POST['prueba'])) {
    if ($_SESSION['numSecreto'] == $_POST['prueba']) {
        header('location: ganado.php');

        session_destroy();
    } else if ($_SESSION['intentos'] <= 0) {
        header('location: perdido.php');

        session_destroy();
    }
}

require './views/index.view.php';
