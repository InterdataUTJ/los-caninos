<?php

require_once(__DIR__ . "/../../models/empleados/clientes.php");

$clientes = new Clientes();

return $clientes->getClientes();

?>