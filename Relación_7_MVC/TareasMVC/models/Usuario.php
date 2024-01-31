<?php

// MODELO DE Usuario

require_once "model.php";

class Usuario extends Model {

  // Constructor. Conecta con la base de datos.
  public function __construct() {
    $this->table = "usuarios";
    $this->idColumn = "id";
    parent::__construct();
  }

  // Devuelve un usuario por su nombre de usuario
  public function getUsuario($usuario) {
    return $this->db->dataManipulation("SELECT * FROM usuarios WHERE usuario = '$usuario'");
  }

  // Verifica la contraseña de un usuario
  public function verificarContraseña($usuario, $contraseña) {
    $usuario = $this->getUsuario($usuario);
    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
      return true;
    } else {
      return false;
    }
  }

  // Inserta un usuario. Devuelve 1 si tiene éxito o 0 si falla.
  public function insert($usuario, $contraseña){
    return $this->db->dataManipulation("INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')");
  }
}