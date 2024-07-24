<?php

require_once(__DIR__ . "/../db.php");
require_once(__DIR__ . "/persona.php");

class Empleado extends Persona {
  protected $estado = "";
  protected $fechaNac = "";
  protected $salario = "";

  public function getEstado() { return $this->estado; }
  public function getFechaNac() { return $this->fechaNac; }
  public function getSalario() { return $this->salario; }

  public function setEstado($estado) { $this->estado = $estado; }
  public function setFechaNac($fechaNac) { $this->fechaNac = $fechaNac; }
  public function setSalario($salario) { $this->salario = $salario; }

  public function cargar($idEmpleado) {
    $resultado = DB::query("SELECT * FROM empleado WHERE idEmpleado = ?;", $idEmpleado);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 9) return false;
    if (!isset($resultado[0]["idEmpleado"])) return false;

    $this->setNombre($resultado[0]["nombres"]);
    $this->setApellidoPaterno($resultado[0]["apellidoPaterno"]);
    $this->setApellidoMaterno($resultado[0]["apellidoMaterno"]);
    $this->setSexo($resultado[0]["sexo"]);
    $this->setFechaNac($resultado[0]["fechaNac"]);
    $this->setSalario($resultado[0]["salario"]);
    $this->setEstado($resultado[0]["estado"]);

    if (!$this->setTelefonos($resultado[0]["idUsuario"])) return false;
    if (!$this->setEmails($resultado[0]["idUsuario"])) return false;
    return true;
  }

  public function actualizar($idUsuario, $idEmpleado, $telefonos = null, $emails = null) {
    DB::query(
      "UPDATE empleado SET nombres = ?, apellidoPaterno = ?, apellidoMaterno = ?, sexo = ?, fechaNac = ? WHERE idEmpleado = ?;", 
      $this->nombre, 
      $this->apellidoPaterno, 
      $this->apellidoMaterno, 
      $this->sexo,
      $this->fechaNac,
      $idEmpleado
    );

    if (!is_null($telefonos)) $this->actualizarTelefonos($idUsuario, $telefonos);
    if (!is_null($emails)) $this->actualizarEmails($idUsuario, $emails);
  }
}

?>