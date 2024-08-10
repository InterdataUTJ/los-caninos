<?php
// Middleware
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Modelo
require_once(__DIR__ . "/../../models/reporte/servicios.php");

$servicios = new Servicios();
$servicios->getData($_GET["fechaInicio"] ?? "1900-01-01", $_GET["fechaFin"] ?? date("Y-m-d"));

return $servicios;

?>