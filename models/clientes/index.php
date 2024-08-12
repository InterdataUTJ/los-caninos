<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class Clientes {
    protected $clientes = [];

    function __construct() {
        $query = "SELECT c.*, rol, nombreUsuario FROM cliente e JOIN usuario u ON u.idUsuario = e.idUsuario;";
        $resultado = DB::query($query);
        if (count($resultado) == 0) return;

        foreach ($resultado as $cliente) {
            //Instanciamos un nuevo cliente
            $nuevoCliente = new Cliente();
            $nuevoCliente->setIdCliente($cliente["idCliente"]);
            $nuevoCliente->setIdUsuario($cliente["idUsuario"]);
            $nuevoCliente->setNombre($cliente["nombres"]);
            $nuevoCliente->setApellidoPaterno($cliente["apellidoPaterno"]);
            $nuevoCliente->setApellidoMaterno($cliente["apellidoMaterno"]);
            $nuevoCliente->setSexo($cliente["sexo"]);
            $nuevoCliente->setRol($cliente["rol"]);
            $nuevoCliente->setNombreUsuario($cliente["nombreUsuario"]);
            $nuevoCliente->setEmails();
            $nuevoCliente->setTelefonos();
            $this->clientes[] = $nuevoCliente;
            //clientes es un array de nuevoCliente
        }
    }

    public function getClientes() { return $this-> clientes; }
}

?>