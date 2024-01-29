<?php
session_start();

require '../../Db.php';
require '../../UsuarioController.php';
echo "hola2";
$controller = new UsuarioController();
$controller->login();
