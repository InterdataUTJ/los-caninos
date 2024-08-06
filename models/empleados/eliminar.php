<?php

require_once(__DIR__."/../db.php");

class EliminarEmpleado {
  protected $id;

  public function setId($_id) { $this->id = $_id; }
  public function getId() { return $this->id; }

  public function eliminar() {
    # Get idUsuario
    $query = "SELECT idUsuario FROM empleado WHERE idEmpleado = ?;";
    $resultado = DB::query($query, $this->id);
    if (count($resultado) == 0) return false;
    if (!isset($resultado[0])) return false;
    if (!isset($resultado[0]["idUsuario"])) return false;

    # Eliminar empleado, usuario e información de contacto
    $query = "DELETE FROM usuario WHERE idUsuario = ?;";
    DB::query($query, $resultado[0]["idUsuario"]);
    return true;
  }
}

?>