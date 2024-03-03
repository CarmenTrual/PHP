<?php
class Libro{
  //Atributos
  private $titulo;
  private $genero;
  private $pais;
  private $año;
  private $numPaginas;

  //Constructor
  public function __construct($titulo,$genero, $pais, $año, $numPaginas){
    $this -> titulo = $titulo;
    $this -> genero = $genero;
    $this -> pais = $pais;
    $this -> año = $año;
    $this -> numPaginas = $numPaginas;
  } 

  //Métodos
  public function getTitulo(){
    return $this -> titulo;
  }

  public function setTitulo($titulo){
    $this -> titulo = $titulo;
  }

  public function getGenero(){
    return $this -> genero;
  }

  public function setGenero($genero){
    $this -> genero = $genero;
  }

  public function getPais(){
    return $this -> pais;
  }

  public function setPais($pais){
    $this -> pais = $pais;
  }

  public function getAño(){
    return $this -> año;
  }

  public function setAño($año){
    $this -> año = $año;
  }

  public function getNumPaginas(){
    return $this -> numPaginas;
  }

  public function setNumPaginas($numPaginas){
    $this -> numPaginas = $numPaginas;
  }
}