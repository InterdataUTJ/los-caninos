<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/mascotas/ver.php");
require_once(__DIR__ . "/../../models/mascotas/empleados.php");
require_once(__DIR__ . "/../../models/mascotas/clientes.php");

if (!isset($_GET["id"])) return null;

$mascota = new Mascota();
$mascota->setId($_GET["id"]);
if (!$mascota->getData()) return null;

$empleados = new Empleados();
$clientes = new Clientes();

return array($mascota, $empleados->getEmpleados(), $clientes->getClientes());

?>