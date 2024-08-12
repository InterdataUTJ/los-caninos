<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/clientes/ver.php");

if (!isset($_GET["id"])) return null;

$cliente = new Cliente();
$cliente->setIdCliente($_GET["id"]);
if (!$cliente->getData()) return null;

return $cliente;

?>