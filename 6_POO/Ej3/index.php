
<?php
/* Crea las clases Animal, Mamífero, Ave, Gato, Perro, Canario, Pingüino y Lagarto. Crea, al
menos, tres métodos específicos de cada clase y redefine el/los método/s cuando sea
necesario. Prueba las clases en un programa en el que se instancien objetos y se les
apliquen métodos.
*/
require 'Animal.php';

//Instancia de la clase sesion
$sesion = new Animal("nombre", "raza", "edad");

// Llamada a los métodos
echo "Nombre del animal: " . $sesion->nombreAnimal() . "<br>";

// Verificar si la persona es mayor de edad
if ($persona->mayorEdad()) {
  echo " ¿Mayor de edad? - Si.";
} else {
  echo " ¿Mayor de edad? - No.";
}
?>

