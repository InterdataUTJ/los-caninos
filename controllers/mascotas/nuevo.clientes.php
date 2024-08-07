<?php

require_once(__DIR__ . "/../../models/mascotas/clientes.php");

$clientes = new Clientes();
return $clientes->getClientes();

?>