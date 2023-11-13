<?php
    if(!isset($_COOKIE['usuario'])){
        setcookie("usuario", "Cristina Delgado", time()+10);
    }
    
    echo $_COOKIE['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hola</p>
</body>
</html>

