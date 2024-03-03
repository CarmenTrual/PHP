<?php
class Mamifero{
  // Atributos
  public $mama;
  public $lame;

  // Constructor
  public function __construct($mama, $lame){
    $this->mama = $mama;
    $this->lame = $lame;
  }

  //Métodos Get y set
  public function getmama(){
    return $this->mama;
  }

  public function setmama($mama){
    $this->mama = $mama;
  }

  public function getlame(){
    return $this->lame;
  }

  public function setlame($lame){
    $this->lame = $lame;
  }
  
  // Método mágico __toString
  public function __toString(){
    return $this->mama . ' ';
  }  
}
?>