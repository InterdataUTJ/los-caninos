<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/clientes/index.php");

$clientes = new Clientes();
$empleadosFiltrado = array_filter($clientes->getClientes(), function($cliente) {
  return in_array($cliente->getId(), $_GET["filterEstado"]) &&
         in_array($cliente->getnOMBRE(), $_GET["filterRol"])       &&
});

return $empleadosFiltrado;

?>