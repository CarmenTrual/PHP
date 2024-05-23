
<?php
/* Crea una clase llamada session para manejar sesiones.
Las funciones que se crearan son:
– setAttribute: Dado un atributo y un valor, lo seteara en la sesión.
– getAttribute: Dado un atributo, devolvemos el valor de la sesión.
– deleteAttribute: Dado un atributo, lo borraremos de la sesión.
– destroySession: destruye la sessión.
*/
require 'Sesion.php';

//Instancia de la clase sesion
$sesion = new Sesion("usuario", "Carmen");

// Llamada a los métodos
echo "Nombre completo: " . $sesion->nombreCompleto() . "<br>";

// Verificar si la persona es mayor de edad
if ($persona->mayorEdad()) {
  echo " ¿Mayor de edad? - Si.";
} else {
  echo " ¿Mayor de edad? - No.";
}
?>

