<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class Empleados {
    protected $empleados = [];

    function __construct() {
        $query = "SELECT e.*, rol, nombreUsuario FROM empleado e JOIN usuario u ON u.idUsuario = e.idUsuario;";
        $resultado = DB::query($query);
        if (count($resultado) == 0) return;

        foreach ($resultado as $empleado) {
            $nuevoEmpleado = new Empleado();
            $nuevoEmpleado->setId($empleado["idEmpleado"]);
            $nuevoEmpleado->setIdUsuario($empleado["idUsuario"]);
            $nuevoEmpleado->setNombre($empleado["nombres"]);
            $nuevoEmpleado->setApellidoPaterno($empleado["apellidoPaterno"]);
            $nuevoEmpleado->setApellidoMaterno($empleado["apellidoMaterno"]);
            $nuevoEmpleado->setEstatus($empleado["estado"]);
            $nuevoEmpleado->setFechaNac($empleado["fechaNac"]);
            $nuevoEmpleado->setSalario($empleado["salario"]);
            $nuevoEmpleado->setSexo($empleado["sexo"]);
            $nuevoEmpleado->setRol($empleado["rol"]);
            $nuevoEmpleado->setNombreUsuario($empleado["nombreUsuario"]);
            $nuevoEmpleado->setEmails();
            $nuevoEmpleado->setTelefonos();
            $this->empleados[] = $nuevoEmpleado;
        }
    }

    public function getEmpleados() { return $this->empleados; }
}

?>