<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/empleados/ver.php");

if (!isset($_GET["id"])) return null;

$empleado = new Empleado();
$empleado->setId($_GET["id"]);
if (!$empleado->getData()) return null;

return $empleado;

?>