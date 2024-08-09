<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class EditarEmpleado extends Empleado {
    public function editar() {
        $queryEmpleado = "UPDATE empleado SET nombres = ?, apellidoPaterno = ?, apellidoMaterno = ?, fechaNac = ?, sexo = ?, salario = ?, estado = ? WHERE idEmpleado = ?;";
        $queryUsuario = "UPDATE usuario SET rol = ? WHERE idUsuario = ?;";

        DB::query($queryEmpleado, $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->fechaNac, $this->sexo, $this->salario, $this->estatus, $this->id);
        DB::query($queryUsuario, $this->rol, $this->idUsuario);
    }
}

?>