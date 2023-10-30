<?session_start();
/**
 * En esta página se encuentra el código necesario para 
 * Si no hay usuario en la sesión se mostrará el login.
 * consultar si hay un usuario en la sesión y en ese caso 
 * se mostrará el contenido para usuarios conectados. 
 * 
 * Autor: Nombre Apellidos
 * 
 */

  

  if(isset($_SESSION['usuario'])){
    echo "Hola," . $_SESSION['usuario'];
  }else{
    echo "Inicia sesión.";
  }
  
?>

