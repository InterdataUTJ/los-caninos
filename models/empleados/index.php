<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/../contacto.php");

class Empleado extends Contancto {
    protected $id;
    protected $nombre;
    protected $apellidoPaterno;
    protected $apellidoMaterno;
    protected $estatus;
    protected $fechaNac;
    protected $salario;
    protected $sexo;

    public function setId($_id) { $this->id = $_id; }
    public function setNombre($_nombre) { $this->nombre = $_nombre; }
    public function setApellidoPaterno($_apellidoPaterno) { $this->apellidoPaterno = $_apellidoPaterno; }
    public function setApellidoMaterno($_apellidoMaterno) { $this->apellidoMaterno = $_apellidoMaterno; }
    public function setEstatus($_estatus) { $this->estatus = $_estatus; }
    public function setFechaNac($_fechaNac) { $this->fechaNac = $_fechaNac; }
    public function setSalario($_salario) { $this->salario = $_salario; }
    public function setSexo($_sexo) { $this->sexo = $_sexo; }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellidoPaterno() { return $this->apellidoPaterno; }
    public function getApellidoMaterno() { return $this->apellidoMaterno; }
    public function getEstatus() { return $this->estatus; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getSalario() { return $this->salario; }
    public function getSexo() { return $this->sexo; }
}

class Empleados {
    protected $empleados = [];

    function __construct() {
        $resultado = DB::query("SELECT * FROM empleado;");
        if (count($resultado) == 0) return;

        foreach ($resultado as $empleado) {
            $nuevoEmpleado = new Empleado();
            $nuevoEmpleado->setId($empleado["idEmpleado"]);
            $nuevoEmpleado->setIdUsuario($empleado["idUsuario"]);
            $nuevoEmpleado->setNombre($empleado["nombre"]);
            
            $this->empleados[] = $nuevoEmpleado;
        }
    }
}

?>