<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/empleados/index.php");

$empleados = new Empleados();
return $empleados->getEmpleados();;

?>