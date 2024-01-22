<?php

class Estudiante {
    public $nombre;
    public $edad;
    public $curso;
    public $notas = array();

    public function __construct($nombre, $edad, $curso) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->curso = $curso;
    }

    public function agregarNota($nota) {
        $this->notas[] = $nota;
    }

    public function obtenerMedia() {
        if (empty($this->notas)) {
            return 0;
        }
        return array_sum($this->notas) / count($this->notas);
    }

    public function mostrarInformacion() {
        echo "<br><br>Nombre: $this->nombre";
        echo "<br>Edad: $this->edad";
        echo "<br>Curso: $this->curso";
        echo "<br>Notas: " . implode(", ", $this->notas) ;
        echo "<br>Media de notas: " . $this->obtenerMedia() ;
    }
}

class EstudianteGraduado extends Estudiante {
    public $nivel;

    public function __construct($nombre, $edad, $curso, $nivel) {
        parent::__construct($nombre, $edad, $curso);
        $this->nivel = $nivel;
    }
}


$estudiante1 = new Estudiante("Juan", 20, "2º");
$estudiante2 = new Estudiante("María", 22, "3º");


$estudiante1->agregarNota(4);
$estudiante1->agregarNota(8);
$estudiante2->agregarNota(5);
$estudiante2->agregarNota(8);


$estudiante1->mostrarInformacion();
$estudiante2->mostrarInformacion();

//estudiantes graduados
$graduado1 = new EstudianteGraduado("Pablo", 25, "Posgrado", "Ingenieria");
$graduado2 = new EstudianteGraduado("Laura", 28, "Doctorado", "DAW");


$graduado1->agregarNota(9);
$graduado1->agregarNota(3);
$graduado2->agregarNota(2);
$graduado2->agregarNota(6);

$graduado1->mostrarInformacion();
$graduado2->mostrarInformacion();

?>
