<?php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: index.php");
exit();
?>
