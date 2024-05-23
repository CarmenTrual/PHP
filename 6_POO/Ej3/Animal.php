<?php
class Animal{
  // Atributos
  public $nombre;
  public $raza;
  public $edad;

  // Constructor
  public function __construct($nombre, $raza, $edad){
    $this->nombre = $nombre;
    $this->raza = $raza;
    $this->edad = $edad;
  }

  //Métodos Get y set
  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function getraza(){
    return $this->raza;
  }

  public function setraza($raza){
    $this->raza = $raza;
  }

  public function getEdad(){
    return $this->edad;
  }

  public function setEdad($edad){
    $this->edad= $edad;
  }

  // otras funciones 
  public function mayorEdad() {
    return $this->edad >= 4;
  }

  public function nombreAnimal() {
    return $this->nombre . ' ' . $this->raza;
  }
  
  // Método mágico __toString
  public function __toString(){
    return $this->nombre . ' ' . $this->raza;
  }  
}
?>