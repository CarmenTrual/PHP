<?php
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
  header('Location: index.php');
  exit;
}

require './UsuarioController.php';
$controller = new UsuarioController();
$controller->login();
