<?php
session_start();

require_once '../../Db.php';
require_once '../../UsuarioController.php';
$controller = new UsuarioController();
$controller->login();
