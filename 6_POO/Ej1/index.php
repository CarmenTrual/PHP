
<?php
/* Crea una clase Persona con los siguientes atributos: nombre, apellidos y edad.
Crea su constructor y get y set.
Crear las siguientes funciones:
– mayorEdad: indica si es o no mayor de edad.
– nombreCompleto: devuelve el nombre y apellidos.
*/
require 'Persona.php';

//Instancia de la clase persona
$persona = new Persona("Carmen", "Trujillo", "39");

// Llamada a los métodos
echo "Nombre completo: " . $persona->nombreCompleto() . "<br>";

// Verificar si la persona es mayor de edad
if ($persona->mayorEdad()) {
  echo " ¿Mayor de edad? - Si.";
} else {
  echo " ¿Mayor de edad? - No.";
}
?>

