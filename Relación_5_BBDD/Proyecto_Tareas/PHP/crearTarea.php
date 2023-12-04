<?php
  session_start();

  if (!isset ($_SESSION['usuario'])) {
    header('location:login.php');
    exit;
  }

  function crearTarea() {
    
  }

  ?>
  
</body>
</html>