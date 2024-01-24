<?php

// MODELO DE TAREAS

include_once "model.php";

class Tarea extends Model
{

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

  // Inserta una tarea. Devuelve 1 si tiene éxito o 0 si falla.
  public function insert($titulo, $descripcion)
  {
    return $this->db->dataManipulation("INSERT INTO tarea (titulo,descripcion) VALUES ('$titulo','$descripcion')");
  }

  // Inserta los autores de un libro. Recibe el id del libro y la lista de ids de los autores en forma de array.
  // Devuelve el número de autores insertados con éxito (0 en caso de fallo).
  /*public function insertAutores($idLibro, $autores)
  {
    $correctos = 0;
    foreach ($autores as $idAutor) {
      $sql = "INSERT INTO escriben(idLibro, idPersona) VALUES('$idLibro', '$idAutor')";
      $correctos += $this->db->dataManipulation($sql);
    }
    return $correctos;
  }*/

  // Elimina los autores de un libro. Recibe el id del libro y la lista de ids de los autores en forma de array.
  // Devuelve el número de autores insertados con éxito (0 en caso de fallo).
  public function deleteTarea($id)
  {
    $correctos = 0;
    //Borramos los registros correspondientes en la tabla usuarios_tarea
    $sql = "DELETE FROM usuarios_tarea WHERE tarea = $id";
    $correctos = $this->db->dataManipulation($sql);
    //Borramos la tarea
    parent::delete($id);
    return $correctos;
  }

  // Actualiza una tarea. Devuelve 1 si tiene éxito y 0 en caso de fallo.
  public function update($id, $titulo, $descripcion)
  {
    $ok = $this->db->dataManipulation("UPDATE tarea SET
                        titulo = '$titulo',
                        descripcion = '$descripcion'
                        WHERE id = '$id'");
    return $ok;
  }

  // Busca un texto en las tablas de tarea. Devuelve un array de objetos con todos la tarea.
  // que cumplen el criterio de búsqueda.
  public function search($textoBusqueda)
  {
    // Buscamos la tarea que coincidan con el texto de búsqueda
    $result = $this->db->dataQuery("SELECT * FROM tarea
					            WHERE tarea.titulo LIKE '%$textoBusqueda%'
					            OR tarea.descripcion LIKE '%$textoBusqueda%'
					            ORDER BY tarea.titulo");
    return $result;
  }
}