<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
  //Crea un array asociativo con tu horario de clase y muestralo por pantalla.
  $horario = [
    "lunes" => [
      "15:15 - 16:15" => "Desarrollo Web entorno Cliente",
      "16:15 - 17:15" => "Desarrollo Web entorno Cliente",
      "17:15 - 18:15" => "Desarrollo Web entorno Cliente",
      "18:15 - 18:30" => "recreo",
      "18:30 - 19:30" => "Desarrollo Web entorno Servidor",
      "19:30 - 20:30" => "Desarrollo Web entorno Servidor",
      "20:30 - 21:30" => "Desarrollo Web entorno Servidor",
    ],
  
    "martes" => [
      "15:15 - 16:15" => "Desarrollo Web entorno Cliente",
      "16:15 - 16:15" => "Desarrollo Web entorno Cliente",
      "17:15 - 16:15" => "Desarrollo Web entorno Cliente",
      "18:15 - 18:30" => "recreo",
      "18:30 - 19:30" => "Despliegue Apps Web",
      "19:30 - 20:30" => "Despliegue Apps Web",
      "20:30 - 21:30" => "Despliegue Apps Web",
    ],
  
    "miercoles" => [
      "15:15 - 16:15" => "Desarrollo Web entorno Servidor",
      "16:15 - 17:15" => "Desarrollo Web entorno Servidor",
      "17:15 - 18:15" => "Desarrollo Web entorno Servidor",
      "18:15 - 18:30" => "recreo",
      "18:30 - 19:30" => "Diseño de Interfaces",
      "19:30 - 20:30" => "Diseño de Interfaces",
      "20:30 - 21:30" => "Empresa e Iniciativa Emprendedora",
    ],

    "jueves" => [
      "15:15 - 16:15" => "Desarrollo Web entorno Servidor",
      "16:15 - 17:15" => "Desarrollo Web entorno Servidor",
      "17:15 - 18:15" => "Desarrollo Web entorno Servidor",
      "18:15 - 18:30" => "recreo",
      "18:30 - 19:30" => "Empresa e Iniciativa Emprendedora",
      "19:30 - 20:30" => "Empresa e Iniciativa Emprendedora",
      "20:30 - 21:30" => "Empresa e Iniciativa Emprendedora",
    ],

    "viernes" => [
      "15:15 - 16:15" => "Diseño de Interfaces",
      "16:15 - 17:15" => "Diseño de Interfaces",
      "17:15 - 18:15" => "Diseño de Interfaces",
      "18:15 - 18:30" => "recreo",
      "18:30 - 19:30" => "Horas De Libre Configuración",
      "19:30 - 20:30" => "Horas De Libre Configuración",
      "20:30 - 21:30" => "Horas De Libre Configuración",
    ]
  ];

  echo "<table>";
  echo "<tr>
  <th>hora</th>
  <th>lunes</th>
  <th>martes</th>
  <th>miércoles</th>
  <th>jueves</th>
  <th>viernes</th>
  </tr>";

  $horas = ["15:15 - 16:15", "16:15 - 17:15", "17:15 - 18:15", "18:15 - 18:30", "18:30 - 19:30", "19:30 - 20:30", "20:30 - 21:30"];
  
  //Lo que yo henhecho y entregado
  /*foreach ($horas as $hora) {
    echo "<tr><td>$hora</td>";
    echo "</tr>";
  }
  echo "</table>";*/


  //Corrección
  foreach ($horas as $hora) {
    echo "<tr><td>$hora</td>";
    foreach ($horario as $dia) {
      echo "<td>";
      if (isset($dia[$hora])) {
        echo $dia[$hora];
      } else {
        echo "-";
      }
      echo "</td>";
    }
    echo "</tr>";
  }
  
  echo "</table>";
  
  ?>
</body>
</html>
