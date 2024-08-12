<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/clientes/index.php");

$clientes = new Clientes();
$empleadosFiltrado = array_filter($clientes->getClientes(), function($cliente) {
  return in_array($cliente->getSexo(), $_GET["filterSexo"]);
});

return $empleadosFiltrado;

?>


