<?php
class EstudianteGraduado extends Estudiante {
  private $nivel;

  function __construct($nombre, $edad, $curso, $nivel){
    parent::__construct($nombre, $edad, $curso);
    $this->nivel = $nivel;
  }

  public function getNivel(){
    return $this -> nivel;
  }

  public function setNivel($nivel){
    $this -> nivel = $nivel;
  }
}
?>

