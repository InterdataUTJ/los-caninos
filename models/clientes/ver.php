<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/../contacto.php");


//Aqui debo de poner los atributos que tiene la clase cliente
//que no estan en mi clase contacto, vaya los que hacen falta.
class Cliente extends Contacto {
    //Atributos de la clase
    protected $idCliente;
    protected $nombres;
    protected $apellido_Paterno;
    protected $apellido_Materno;
    protected $_sexo;


    //en conjunto con sus getters y setters
    public function setIdCliente($_idCliente){$this-> idCliente= $_idCliente;}
    public function setNombre($_nombres) { $this->nombres = $_nombres; }
    public function setApellidoPaterno($_apellidoPaterno) { $this->apellido_Paterno = $_apellidoPaterno; }
    public function setApellidoMaterno($_apellidoMaterno) { $this->apellido_Materno = $_apellidoMaterno; }
    public function setSexo($_sexo) { $this->_sexo = $_sexo; }


    //en conjunto con sus getters
    public function getIdCliente() { return $this->idCliente; }
    public function getNombre() { return $this->nombres; }
    public function getApellidoPaterno() { return $this->apellido_Paterno; }
    public function getApellidoMaterno() { return $this->apellido_Materno; }
    public function getSexo() { return $this->_sexo; }


    //Funcion para obtener datos de la tabla de clientes mediante la tabla de usuario por la idusuario
    public function getData() {
        $query = "SELECT c.*, rol, nombreUsuario FROM cliente c JOIN usuario u ON u.idUsuario = c.idUsuario WHERE c.idCliente = ?;";
        $resultado = DB::query($query, $this->idCliente);
        if (count($resultado) == 0) return false;
        if (!isset($resultado[0])) return false;
        if (!isset($resultado[0]["idCliente"])) return false;

        $this->setIdCliente($resultado[0]["idCliente"]);
        $this->setIdUsuario($resultado[0]["idUsuario"]);
        $this->setNombre($resultado[0]["nombres"]);
        $this->setApellidoPaterno($resultado[0]["apellidoPaterno"]);
        $this->setApellidoMaterno($resultado[0]["apellidoMaterno"]);
        $this->setSexo($resultado[0]["sexo"]);
        $this->setRol($resultado[0]["rol"]);
        $this->setNombreUsuario($resultado[0]["nombreUsuario"]);
        $this->setEmails();
        $this->setTelefonos();
        return true;
    }
}

?>