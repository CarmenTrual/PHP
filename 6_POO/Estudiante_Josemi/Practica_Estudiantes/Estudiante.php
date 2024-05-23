<?php
class Estudiante {

    private $nombre;

    private $edad;
    
    private $curso;

    private $notas = array();

    public function __construct($nombre, $edad, $curso){

        $this->nombre = $nombre;

        $this->edad = $edad;

        $this->curso = $curso;
    }

    public function agregarNota($nota) {
        array_push($notas, $nota);
    }

    public function obtenerMedia() {
        $suma = 0;
        foreach ($this->notas as $nota) {
            $suma += $nota;
        }
        
        $longitud = count($this->notas);

        $media = $suma/$longitud;

        return $media;
    }
}

?>