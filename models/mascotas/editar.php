<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class EditarMascota extends Mascota {
    public function editar() {
        $query = "UPDATE paciente SET idEmpleado = ?, idCliente = ?, nombre = ?, raza = ?, tipo_mascota = ?, fechaNac = ?, tamano = ?, sexo = ?, peso = ? WHERE idPaciente = ?;";
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
            $this->getPeso(),
            $this->getId()
        );
    }
}

?>