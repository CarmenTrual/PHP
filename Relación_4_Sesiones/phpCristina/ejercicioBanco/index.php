<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
  
</head>

<body>

  <div style="background-color: lightblue;">
    <div >
      <h1 >GESTCLIENT</h1>
      <h2>Gestión de clientes de CertiBank</h2>
      <?php
      // Conexión a la base de datos
      try{
          $host = "db";
          $dbUsername = "root";
          $dbPassword = "test";
          $dbName = "banco";
          $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
      } catch(PDOException $e) {
        echo "". $e->getMessage();
      }

      //obtener la acción del botón que se ha pulsado en el formulario
      
      // Dar de baja un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
      //hacer llamada a BD con la consulta oportuna
      }

      // Dar de alta un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
      //hacer llamada a BD con la consulta oportuna
      $statement = $conn->prepare('INSERT INTO cliente(dni, nombre, direccion, telefono) values (:dni, :nombre, :direccion, :telefono)');
                $statement->execute(array(
                    ':dni' => $_GET['dni'],
                    ':nombre' => $_GET['nombre'],
                    ':direccion'=> $_GET['direccion'],
                    ':telefono'=> $_GET['telefono']
                ));

      }

      // Modificar un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
       //hacer llamada a BD con la consulta oportuna
      }

      // Listado
      //Este listado se muestra siempre
      //hacer llamada a BD con la consulta del listado de clientes
      $statement = $conn->prepare('SELECT * FROM cliente');
      $statement->execute();
      $consulta = $statement -> fetchAll(PDO::FETCH_ASSOC);
      ?>

      <table >
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th></th>
        </tr>

        <form action="index.php" method="GET">
          <tr>
            <td><input type="text" name="dni"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono"></td>
            <input type="hidden" name="accion" value="crear">
            <td><input type="submit" value="Añadir"></td>
          </tr>
        </form>

        <?php
        //mostrar los clientes de la bd en la tabla
        foreach ($consulta as $registro) {
          echo "<tr>
            <td>".$registro['dni']." </td>
            <td>". $registro['nombre']." </td>
            <td>". $registro['direccion']." </td>
            <td>". $registro['telefono']." </td>
            <td>
              <a href=\"modificar.php?&dni=". $registro['dni'] ."&nombre=". $registro['nombre'] ."&direccion=". $registro['direccion'] . "&telefono=". $registro['telefono']." \">
                <button >Modificar</button>
              </a>
            </td>
            <td>
              <a href=\"index.php?accion=borrar&dni=". $registro['dni']."\">
                <button>
                  <img width='20px' src='papelera.png' >
                </button>
              </a>
            </td>
          </tr>";
        }
        
        //while ($registro == $consulta) {//hay que modificar el array() y cambiarlo por el código adecuado
        
        
        //}
        ?>
      </table>
    </div>
  </div>



</body>

</html>