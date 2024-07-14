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
    $resultado = DB::query("SELECT telefono FROM telefonoEmpleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $telefono) {
      if (!isset($telefono["telefono"])) return false;
      $this->telefonos[] = $telefono["telefono"];
    }
    return true;
  }

  private function cargarCorreos($idEmpleado) {
    $resultado = DB::query("SELECT email FROM emailEmpleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $email) {
      if (!isset($email["email"])) return false;
      $this->correos[] = $email["email"];
    }
    return true;
  }

  public function actualizar($idEmpleado, $telefonos = null, $correos = null) {
    DB::query(
      "UPDATE empleado SET nombres = ?, apellidoPaterno = ?, apellidoMaterno = ?, sexo = ?, fechaNac = ? WHERE idEmpleado = ?;", 
      $this->nombre, 
      $this->apellidoPaterno, 
      $this->apellidoMaterno, 
      $this->sexo,
      $this->fechaNac,
      $idEmpleado
    );

    if (!is_null($telefonos)) $this->actualizarTelefono($idEmpleado, $telefonos);
    if (!is_null($correos)) $this->actualizarEmail($idEmpleado, $correos);
  }

  private function actualizarTelefono($idEmpleado, $telefonos) {
    $toDelete = array_diff($this->telefonos, $telefonos);
    $toAdd = array_diff($telefonos, $this->telefonos);

    foreach ($toDelete as $telefono) {
      DB::query(
        "DELETE FROM telefonoEmpleado WHERE idEmpleado = ? AND telefono = ?;",
        $idEmpleado,
        $telefono
      );
    }

    foreach ($toAdd as $telefono) {
      DB::query(
        "INSERT INTO telefonoEmpleado (idEmpleado, telefono) VALUES (?, ?);",
        $idEmpleado,
        $telefono
      );
    }
  }

  private function actualizarEmail($idEmpleado, $correos) {
    $toDelete = array_diff($this->correos, $correos);
    $toAdd = array_diff($correos, $this->correos);

    foreach ($toDelete as $correo) {
      DB::query(
        "DELETE FROM emailEmpleado WHERE idEmpleado = ? AND email = ?;",
        $idEmpleado,
        $correo
      );
    }

    foreach ($toAdd as $correo) {
      DB::query(
        "INSERT INTO emailEmpleado (idEmpleado, email) VALUES (?, ?);",
        $idEmpleado,
        $correo
      );
    }
  }
}

?>