<?php

require_once(__DIR__."/../db.php");

class Mascota {
    protected $id;
    protected $idEmpleado;
    protected $idCliente;
    protected $nombre;
    protected $raza;
    protected $tipoMascota;
    protected $fechaNac;
    protected $tamano;
    protected $sexo;
    protected $peso;

    public function setId($_id) { $this->id = $_id; }
    public function setIdEmpleado($_idEmpleado) { $this->idEmpleado = $_idEmpleado; }
    public function setIdCliente($_idCliente) { $this->idCliente = $_idCliente; }
    public function setNombre($_nombre) { $this->nombre = $_nombre; }
    public function setRaza($_raza) { $this->raza = $_raza; }
    public function setTipoMascota($_tipoMascota) { $this->tipoMascota = $_tipoMascota; }
    public function setFechaNac($_fechaNac) { $this->fechaNac = $_fechaNac; }
    public function setTamano($_tamano) { $this->tamano = $_tamano; }
    public function setSexo($_sexo) { $this->sexo = $_sexo; }
    public function setPeso($_peso) { $this->peso = $_peso; }

    public function getId() { return $this->id; }
    public function getIdEmpleado() { return $this->idEmpleado; }
    public function getIdCliente() { return $this->idCliente; }
    public function getNombre() { return $this->nombre; }
    public function getRaza() { return $this->raza; }
    public function getTipoMascota() { return $this->tipoMascota; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTamano() { return $this->tamano; }
    public function getSexo() { return $this->sexo; }
    public function getPeso() { return $this->peso; }

    public function getData() {
        $query = "SELECT * FROM paciente WHERE idPaciente = ?;";
        $resultado = DB::query($query, $this->id);
        if (count($resultado) == 0) return false;
        if (!isset($resultado[0])) return false;
        if (!isset($resultado[0]["idPaciente"])) return false;

        $this->setId($resultado[0]["idPaciente"]);
        $this->setIdEmpleado($resultado[0]["idEmpleado"]);
        $this->setIdCliente($resultado[0]["idCliente"]);
        $this->setNombre($resultado[0]["nombre"]);
        $this->setRaza($resultado[0]["raza"]);
        $this->setTipoMascota($resultado[0]["tipo_mascota"]);
        $this->setFechaNac($resultado[0]["fechaNac"]);
        $this->setTamano($resultado[0]["tamano"]);
        $this->setSexo($resultado[0]["sexo"]);
        $this->setPeso($resultado[0]["peso"]);
        return true;
    }
}

?>