<?php
session_start();

// Archivos necesarios para la funcionalidad de inicio de sesión
require_once '../../Db.php';
require_once '../../UsuarioController.php';

// Creamos una instancia del controlador del usuario
$controller = new UsuarioController();

// Llamamos al método de inicio de sesión del controlador del usuario
$controller->login();
