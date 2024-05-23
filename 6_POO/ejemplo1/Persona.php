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

  public function saludar(){
    echo "Hola, soy " . $this . " y tengo " . $this->edad . " años.";
  }

  // Método mágico __toString
  public function __toString(){
    return  $this->nombre .  $this->apellido ;
  }
}
?>