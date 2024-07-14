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
    if (count($resultado) == 0) return false;

    foreach ($resultado as $telefono) {
      if (!isset($telefono["telefono"])) return false;
      $this->telefonos[] = $telefono["telefono"];
    }
    return true;
  }

  private function cargarCorreos($idCliente) {
    $resultado = DB::query("SELECT email FROM emailCliente WHERE idCliente = ?;", $idCliente);
    if (count($resultado) == 0) return false;

    foreach ($resultado as $email) {
      if (!isset($email["email"])) return false;
      $this->correos[] = $email["email"];
    }
    return true;
  }
}

?>