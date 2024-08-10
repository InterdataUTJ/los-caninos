<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class NuevaFactura extends Factura {
  public function guardar() {
    $query = "INSERT INTO factura (fechaPago, metodoPago, descuento, subtotal) VALUES (?, ?, ?, ?);";
    $resultado = DB::queryGetId(
      $query, 
      $this->getFechaPago(),
      $this->getMetodoPago(),
      $this->getDescuento(),
      $this->getSubtotal()
    );

    if (count($resultado) == 0) return false;
    if (!isset($resultado[0])) return false;
    if (!isset($resultado[0]["id"])) return false;
    $this->setId($resultado[0]["id"]);

    return $resultado[0]["id"];
  }
}

class NuevoServicio extends Servicio {
  public function guardar() {
    $query = "INSERT INTO servicio (idPaciente, idFactura, diagnostico, tratamiento, tipoServicio, fechaIngreso, fechaSalida, estatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $resultado = DB::queryGetId(
      $query,
      $this->getIdPaciente(),
      $this->getIdFactura(),
      $this->getDiagnostico(),
      $this->getTratamiento(),
      $this->getTipoServicio(),
      $this->getFechaIngreso(),
      $this->getFechaSalida(),
      $this->getEstatus()
    );

    if (count($resultado) == 0) return false;
    if (!isset($resultado[0])) return false;
    if (!isset($resultado[0]["id"])) return false;
    $this->setId($resultado[0]["id"]);

    $query = "INSERT INTO empleadoServicio (idEmpleado, idServicio) VALUES (?, ?);";
    foreach ($this->getEmpleados() as $empleado) {
      DB::query($query, $empleado, $this->getId());
    }

    return true;
  }
}

?>