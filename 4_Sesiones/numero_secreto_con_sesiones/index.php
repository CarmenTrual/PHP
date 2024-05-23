<?php
session_start();

if (!isset($_SESSION['aleatorio'])) {
    $_SESSION['aleatorio'] = rand(1,100);
    $_SESSION['intentos'] = 0;
}

if (!isset($_REQUEST['numero'])) {
    include 'formulario.php';
} else {
    include 'juego.php';
}
