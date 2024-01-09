<?php
class Sesion{
  // Atributos
  public $usuario;
  public $Carmen;

  // Constructor
  public function __construct($nombre, $apellido, $edad){
    $this->usuario= $usuario;
    $this->Carmen= $Carmen;
  }

  //Métodos Get y set
  public function setAttribute(){
    return $this->usuario;
  }

  public function getAttribute($nombre){
    $this->usuario = $usuario;
  }

  public function deleteAttribute(){
    return $this->apellido;
  }

  public function destroySession($apellido){
    $this->apellido = $apellido;
  }
  
  // Método mágico __toString
  public function __toString(){
    return $this->nombre . ' ' . $this->apellido;
  }  
}
?>