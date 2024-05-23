<!-- BIBLIOTECA CON POO
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    
    include_once("Biblioteca.php");

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaLibros";  // Acción por defecto
    }

    $biblioteca = new Biblioteca();
    $biblioteca->$action();

    ?>

</body>

</html>