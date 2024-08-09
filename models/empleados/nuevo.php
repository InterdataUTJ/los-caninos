<?php

require_once(__DIR__."/../db.php");

class NuevoEmpleado {
  protected $idCliente;
  protected $estado;
  protected $fechaNac;
  protected $salario;
  protected $rol;

  public function setIdCliente($_idCliente) { $this->idCliente = $_idCliente; }
  public function setEstado($_estado) { $this->estado = $_estado; }
  public function setFechaNac($_fechaNac) { $this->fechaNac = $_fechaNac; }
  public function setSalario($_salario) { $this->salario = $_salario; }
  public function setRol($_rol) { $this->rol = $_rol; }

  public function getIdCliente() { return $this->idCliente; }
  public function getEstado() { return $this->estado; }
  public function getFechaNac() { return $this->fechaNac; }
  public function getSalario() { return $this->salario; }
  public function getRol() { return $this->rol; }

  public function guardar() {
    $query = "CALL cambiar_a_empleado(?, ?, ?, ?, ?);";
    DB::query($query, $this->idCliente, $this->estado, $this->fechaNac, $this->salario, $this->rol);
  }
}

?>