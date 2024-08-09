<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class NuevaMascota extends Mascota {
  public function guardar() {
    $query = "INSERT INTO paciente (idEmpleado, idCliente, nombre, raza, tipo_mascota, fechaNac, tamano, sexo, peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    DB::query(
      $query, 
      $this->getIdEmpleado(), 
      $this->getIdCliente(), 
      $this->getNombre(), 
      $this->getRaza(), 
      $this->getTipoMascota(), 
      $this->getFechaNac(), 
      $this->getTamano(), 
      $this->getSexo(), 
      $this->getPeso()
    );
  }
}

?>