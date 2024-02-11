<?php

// MODELO DE TAREAS

require_once "model.php";

class Tarea extends Model {

  // Constructor. Especifica el nombre de la tabla de la base de datos
  public function __construct()
  {
    $this->table = "tarea";
    $this->idColumn = "id";
    parent::__construct();
  }

  // Devuelve el último id asignado en la tabla de tareass
  public function getMaxId()
  {
    $result = $this->db->dataQuery("SELECT MAX(id) AS ultimoIdTarea FROM tarea");
    return $result[0]->ultimoIdTarea;
  }

// Inserta la relación entre la tarea y el usuario en la tabla usuarios_tarea
public function insertRelacionUsuario($tareaId, $usuarioId) {
  $sql = "INSERT INTO usuarios_tarea (tarea, usuario) VALUES ('$tareaId', '$usuarioId')";
  return $this->db->dataManipulation($sql);
}

// Inserta una tarea asociada a un usuario. Devuelve 1 si tiene éxito o 0 si falla.
public function insert($titulo, $descripcion) {
  $sql = "INSERT INTO tarea (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
  return $this->db->dataManipulation($sql);
}


// Borrar tarea.
    public function deleteTarea($id, $usuarioLogueado) {
      // Verificar que la tarea pertenezca al usuario en sesión antes de borrar
      $result = $this->db->dataQuery("
          SELECT 1
          FROM tarea
          INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
          WHERE tarea.id = '$id' AND usuarios_tarea.usuario = '$usuarioLogueado'
      ");
      
      if (!$result) {
          // La tarea no pertenece al usuario en sesión
          die("Error: No tienes permisos para borrar esta tarea.");
      }
  
      // Borrar las relaciones en la tabla usuarios_tarea
      $this->db->dataManipulation("DELETE FROM usuarios_tarea WHERE tarea = '$id'");
  
      // Borrar la tarea
      parent::delete($id);
  }
    

  // Actualiza una tarea. Devuelve 1 si tiene éxito y 0 en caso de fallo.
  public function update($id, $titulo, $descripcion, $usuarioLogueado){

    // Verificar que la tarea pertenece al usuario en sesión
    $result = $this->db->dataQuery("
        SELECT 1
        FROM tarea
        INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
        WHERE tarea.id = '$id' AND usuarios_tarea.usuario = '$usuarioLogueado'
    ");
    if (!$result) {
      // La tarea no pertenece al usuario en sesión, no se permite la modificación
      return 0;
  }

  // Realizar la actualización
  $ok = $this->db->dataManipulation("UPDATE tarea SET
      titulo = '$titulo',
      descripcion = '$descripcion'
      WHERE id = '$id'");

  return $ok;
}


  // Busca un texto en las tablas de tarea. Devuelve un array de objetos con todos la tarea.
  // que cumplen el criterio de búsqueda.
  public function search($textoBusqueda, $usuarioLogueado){

    $result = $this->db->dataQuery("
        SELECT tarea.id, tarea.titulo, tarea.descripcion
        FROM tarea
        INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
        WHERE usuarios_tarea.usuario = '$usuarioLogueado'
          AND (tarea.titulo LIKE '%$textoBusqueda%' OR tarea.descripcion LIKE '%$textoBusqueda%')
        ORDER BY tarea.titulo
    ");
  
    return $result;
}

  // Obtener las tareas del usuario logueado
  public function tareasDelUsuario($usuarioId){
    // Realizamos una consulta SQL que selecciona las tareas del usuario actual
    // mediante un JOIN entre las tablas tarea y usuarios_tarea
    // utilizando la relación entre id y tarea.
    $sql = "SELECT tarea.* FROM tarea
          JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
          WHERE usuarios_tarea.usuario = '$usuarioId'";

    // Ejecutamos la consulta y devolvemos el resultado
    return $this->db->dataQuery($sql);
  }
}