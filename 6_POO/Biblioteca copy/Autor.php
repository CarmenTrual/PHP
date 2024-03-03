<?php
class Autor{
  //Atributos
  private $nombre;
  private $apellido;


  //Constructor
  public function __construct($nombre,$apellido){
    $this -> nombre = $nombre;
    $this -> apellido = $apellido;
  }

  //Métodos
  public function getNombre(){
    return $this -> nombre;
  }

  public function setNombre($nombre){
    $this -> nombre = $nombre;
  }

  public function getApellido(){
    return $this -> apellido;
  }

  public function setApellido($apellido){
    $this -> apellido = $apellido;
  }
}

?>