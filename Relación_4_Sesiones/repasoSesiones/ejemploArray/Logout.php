<?php
// logout.php - Página de cierre de sesión

// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio
header("Location: index.php");
exit();
?>
