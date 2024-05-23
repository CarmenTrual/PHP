<?php
class Persona{
  // Atributos
  public $nombre;
  public $apellido;
  public $edad;

  // Constructor
  public function __construct($nombre, $apellido, $edad){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->edad = $edad;
  }

  //Métodos Get y set
  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function getApellido(){
    return $this->apellido;
  }

  public function setApellido($apellido){
    $this->apellido = $apellido;
  }

  public function getEdad(){
    return $this->edad;
  }

  public function setEdad($edad){
    $this->edad= $edad;
  }

  // otras funciones 
  public function mayorEdad() {
    return $this->edad >= 18;
  }

  public function nombreCompleto() {
    return $this->nombre . ' ' . $this->apellido;
  }
  
  // Método mágico __toString
  public function __toString(){
    return $this->nombre . ' ' . $this->apellido;
  }  
}
?>