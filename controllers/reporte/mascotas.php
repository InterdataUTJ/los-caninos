<?php
// Middleware
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Modelo
require_once(__DIR__ . "/../../models/reporte/mascotas.php");

$mascotas = new Mascotas();
$mascotas->getData();

return $mascotas;

?>