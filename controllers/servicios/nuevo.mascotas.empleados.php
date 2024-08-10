<?php

require_once(__DIR__ . "/../../models/servicios/mascotas.php");
require_once(__DIR__ . "/../../models/servicios/empleados.php");

$mascotas = new Mascotas();
$empleados = new Empleados();

return [$mascotas->getMascotas(), $empleados->getEmpleados()];

?>