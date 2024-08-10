<?php

require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../models/servicios/ver.php");
require_once(__DIR__ . "/../../models/servicios/empleados.php");
require_once(__DIR__ . "/../../models/servicios/mascotas.php");

if (!isset($_GET["id"])) return null;

$factura = new Factura();
$factura->setId($_GET["id"]);
if (!$factura->getData()) return null;

$empleados = new Empleados();
$mascotas = new Mascotas();

return array($factura, $empleados->getEmpleados(), $mascotas->getMascotas());

?>