<?php

// CAPA DE ABSTRACCIÓN DE DATOS

class Db
{

  private $db; // Aquí guardaremos la conexión con la base de datos

  /**
   * Abre la conexión con la base de datos
   * @return 0 si la conexión se realiza con normalidad y -1 en caso de error
   */
  function __construct()
  {
    // Las constantes DBSERVER, DBUSER, DBPASS y DBNAME deben estar definidas en config.php
    require_once("config.php");
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    if ($this->db->connect_errno) return -1;
    else return 0;
  }

  /**
   * Cierra la conexión con la base de datos
   */
  function close()
  {
    if ($this->db) $this->db->close();
  }

  /**
   * Lanza una consulta (SELECT) contra la base de datos.
   * ¡Ojo! Este método solo funcionará con sentencias SELECT.
   * @param $sql El código de la consulta que se quiere lanzar
   * @return Un array bidimensional con los resultados de la consulta (estará vacío si la consulta no devolvió nada)
   */
  function dataQuery($sql)
  {
    $res = $this->db->query($sql);
    // Ahora vamos a convertir el resultado en un array convencional de PHP antes de devolverlo
    $resArray = array();
    while ($fila = $res->fetch_object()) {
      $resArray[] = $fila;
    }
    return $resArray;
  }

  /**
   * Lanza una sentencia de manipulación de datos contra la base de datos.
   * ¡Ojo! Este método solo funcionará con sentencias INSERT, UPDATE, DELETE y similares.
   * @param $sql El código de la consulta que se quiere lanzar
   * @return El número de filas insertadas, modificadas o borradas por la sentencia SQL (0 si no produjo ningún efecto).
   */
  function dataManipulation($sql)
  {
    $this->db->query($sql);
    return $this->db->affected_rows;
  }
}