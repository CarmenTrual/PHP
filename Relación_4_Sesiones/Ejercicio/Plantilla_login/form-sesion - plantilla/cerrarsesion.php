<?
/**
 * En esta página se encuentra el código necesario 
 * para cerrar la sesión y eliminar la información 
 * que haya almacenada en la sesión.
 * 
 * Autor: Nombre Apellidos
 * 
 */

  session_start();
  session_destroy();
  $_SESSION = array
?>