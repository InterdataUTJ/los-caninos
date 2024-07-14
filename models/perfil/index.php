<?php

require_once(__DIR__ . "/../db.php");

class Empleado {
  public $nombre = "";
  public $apellidoPaterno = "";
  public $apellidoMaterno = "";
  public $sexo = "";
  public $estado = "";
  public $fechaNac = "";
  public $salario = "";
  public $telefonos = [];
  public $correos = [];

  public function cargar($idEmpleado) {
    $resultado = DB::query("SELECT * FROM empleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 9) return false;
    if (!isset($resultado[0]["idEmpleado"])) return false;

    $this->nombre = $resultado[0]["nombres"];
    $this->apellidoPaterno = $resultado[0]["apellidoPaterno"];
    $this->apellidoMaterno = $resultado[0]["apellidoMaterno"];
    $this->estado = $resultado[0]["estado"];
    $this->fechaNac = $resultado[0]["fechaNac"];
    $this->salario = $resultado[0]["salario"];
    $this->sexo = $resultado[0]["sexo"];

    if (!$this->cargarTelefonos($idEmpleado)) return false;
    if (!$this->cargarCorreos($idEmpleado)) return false;
    return true;
  }

  private function cargarTelefonos($idEmpleado) {
    $resultado = DB::query("SELECT telefono FROM telefonoempleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) == 0) return false;

    foreach ($resultado as $telefono) {
      if (!isset($telefono["telefono"])) return false;
      $this->telefonos[] = $telefono["telefono"];
    }
    return true;
  }

  private function cargarCorreos($idEmpleado) {
    $resultado = DB::query("SELECT email FROM emailempleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) == 0) return false;

    foreach ($resultado as $email) {
      if (!isset($email["email"])) return false;
      $this->correos[] = $email["email"];
    }
    return true;
  }
}

?>