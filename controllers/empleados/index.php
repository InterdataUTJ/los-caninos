<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/empleados/index.php");

$empleados = new Empleados();
$empleadosFiltrado = array_filter($empleados->getEmpleados(), function($empleado) {
  return in_array($empleado->getEstatus(), $_GET["filterEstado"]) &&
         in_array($empleado->getRol(), $_GET["filterRol"])       &&
         in_array($empleado->getSexo(), $_GET["filterSexo"]);
});

return $empleadosFiltrado;

?>