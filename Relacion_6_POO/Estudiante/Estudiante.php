<?php
class Estudiante {
  //Atributos
  private $nombre;
  private $edad;
  private $curso;
  private $notas = array();

  //Constructor
  function __construct($nombre, $edad, $curso, ){
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->curso = $curso; 
  }

    //Métodos
    public function getNombre(){
      return $this -> nombre;
    }
  
    public function setNombre($nombre){
      $this -> nombre = $nombre;
    }

    public function getEdad(){
      return $this -> edad;
    }

    public function setEdad($edad){ 
      $this -> edad = $edad;
    }

    public function getCurso(){
      return $this -> curso;
    }

    public function setCurso($curso){
      $this -> curso = $curso;
    }

    public function getNotas(){
      return $this -> notas;
      }

    public function setNotas($notas){
      $this -> notas[] = $notas;
    }

    function agregarNota($nota) {
      $this->notas[] = $nota;
    }

    function obtenerMedia() {
      $suma = array_sum($this->notas);
      $media = $suma / count($this->notas);
      return $media;
  }
}
?>
