<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/../contacto.php");

class Empleado extends Contacto {
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

    public function getData() {
        $query = "SELECT e.*, rol, nombreUsuario FROM empleado e JOIN usuario u ON u.idUsuario = e.idUsuario WHERE e.idEmpleado = ?;";
        $resultado = DB::query($query, $this->id);
        if (count($resultado) == 0) return false;
        if (!isset($resultado[0])) return false;
        if (!isset($resultado[0]["idEmpleado"])) return false;

        $this->setId($resultado[0]["idEmpleado"]);
        $this->setIdUsuario($resultado[0]["idUsuario"]);
        $this->setNombre($resultado[0]["nombres"]);
        $this->setApellidoPaterno($resultado[0]["apellidoPaterno"]);
        $this->setApellidoMaterno($resultado[0]["apellidoMaterno"]);
        $this->setEstatus($resultado[0]["estado"]);
        $this->setFechaNac($resultado[0]["fechaNac"]);
        $this->setSalario($resultado[0]["salario"]);
        $this->setSexo($resultado[0]["sexo"]);
        $this->setRol($resultado[0]["rol"]);
        $this->setNombreUsuario($resultado[0]["nombreUsuario"]);
        $this->setEmails();
        $this->setTelefonos();

        return true;
    }
}

?>