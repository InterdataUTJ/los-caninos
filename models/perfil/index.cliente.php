<?php

require_once(__DIR__ . "/../db.php");

class Cliente {
  public $nombre = "";
  public $apellidoPaterno = "";
  public $apellidoMaterno = "";
  public $sexo = "";
  public $telefonos = [];
  public $correos = [];

  public function cargar($idCliente) {
    $resultado = DB::query("SELECT * FROM cliente WHERE idCliente = ?;", $idCliente);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 6) return false;
    if (!isset($resultado[0]["idCliente"])) return false;

    $this->nombre = $resultado[0]["nombres"];
    $this->apellidoPaterno = $resultado[0]["apellidoPaterno"];
    $this->apellidoMaterno = $resultado[0]["apellidoMaterno"];
    $this->sexo = $resultado[0]["sexo"];
    
    if (!$this->cargarTelefonos($idCliente)) return false;
    if (!$this->cargarCorreos($idCliente)) return false;
    return true;
  }

  private function cargarTelefonos($idCliente) {
    $resultado = DB::query("SELECT telefono FROM telefonoCliente WHERE idCliente = ?;", $idCliente);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $telefono) {
      if (!isset($telefono["telefono"])) return false;
      $this->telefonos[] = $telefono["telefono"];
    }
    return true;
  }

  private function cargarCorreos($idCliente) {
    $resultado = DB::query("SELECT email FROM emailCliente WHERE idCliente = ?;", $idCliente);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $email) {
      if (!isset($email["email"])) return false;
      $this->correos[] = $email["email"];
    }
    return true;
  }

  public function actualizar($idCliente, $telefonos = null, $correos = null) {
    DB::query(
      "UPDATE cliente SET nombres = ?, apellidoPaterno = ?, apellidoMaterno = ?, sexo = ? WHERE idCliente = ?;", 
      $this->nombre, 
      $this->apellidoPaterno, 
      $this->apellidoMaterno, 
      $this->sexo, 
      $idCliente
    );

    if (!is_null($telefonos)) $this->actualizarTelefono($idCliente, $telefonos);
    if (!is_null($correos)) $this->actualizarEmail($idCliente, $correos);
  }

  private function actualizarTelefono($idCliente, $telefonos) {
    $toDelete = array_diff($this->telefonos, $telefonos);
    $toAdd = array_diff($telefonos, $this->telefonos);

    foreach ($toDelete as $telefono) {
      DB::query(
        "DELETE FROM telefonoCliente WHERE idCliente = ? AND telefono = ?;",
        $idCliente,
        $telefono
      );
    }

    foreach ($toAdd as $telefono) {
      DB::query(
        "INSERT INTO telefonoCliente (idCliente, telefono) VALUES (?, ?);",
        $idCliente,
        $telefono
      );
    }
  }

  private function actualizarEmail($idCliente, $correos) {
    $toDelete = array_diff($this->correos, $correos);
    $toAdd = array_diff($correos, $this->correos);

    foreach ($toDelete as $correo) {
      DB::query(
        "DELETE FROM emailCliente WHERE idCliente = ? AND email = ?;",
        $idCliente,
        $correo
      );
    }

    foreach ($toAdd as $correo) {
      DB::query(
        "INSERT INTO emailCliente (idCliente, email) VALUES (?, ?);",
        $idCliente,
        $correo
      );
    }
  }
}

?>