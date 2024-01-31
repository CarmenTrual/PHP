<?php
session_start();
session_unset();
session_destroy();
header("Location: /PHP/Relación_7_MVC/TareasMVC/views/login/login.php");
exit();
?>