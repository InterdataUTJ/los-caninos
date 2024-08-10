<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class EditarFactura extends Factura {
  public function editar() {
    $query = "UPDATE factura SET fechaPago = ?, metodoPago = ?, descuento = ?, subtotal = ? WHERE idFactura = ?;";
    DB::query(
      $query,
      $this->getFechaPago(),
      $this->getMetodoPago(),
      $this->getDescuento(),
      $this->getSubtotal(),
      $this->getId()
    );
  }
}

class EditarServicio extends Servicio {
  public function editar() {
    $query = "UPDATE servicio SET idPaciente = ?, diagnostico = ?, tratamiento = ?, tipoServicio = ?, fechaIngreso = ?, fechaSalida = ?, estatus = ? WHERE idServicio = ?;";
    DB::query(
      $query,
      $this->getIdPaciente(),
      $this->getDiagnostico(),
      $this->getTratamiento(),
      $this->getTipoServicio(),
      $this->getFechaIngreso(),
      $this->getFechaSalida(),
      $this->getEstatus(),
      $this->getId()
    );

    return true;
  }

  public function editarEmpleados($empleados) {
    $toDelete = array_diff($this->getIdEmpleados(), $empleados);
    $toAdd = array_diff($empleados, $this->getIdEmpleados());

    foreach ($toDelete as $idEmpleado) {
      DB::query(
        "DELETE FROM empleadoServicio WHERE idEmpleado = ? AND idServicio = ?;",
        $idEmpleado,
        $this->getId()
      );
    }

    foreach ($toAdd as $idEmpleado) {
      DB::query(
        "INSERT INTO empleadoServicio (idEmpleado, idServicio) VALUES (?, ?);",
        $idEmpleado,
        $this->getId()
      );
    }
  }
}

?>