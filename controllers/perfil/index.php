<?php

require_once(__DIR__ . "/../../models/perfil/index.php");
require_once(__DIR__ . "/../../models/perfil/index.cliente.php");

$usuario = new Empleado();;
if ($_SESSION["rol"] == "CLIENTE") $usuario = new Cliente();

$estado = $usuario->cargar($_SESSION["idRegistro"]);
if (!$estado) $usuario = null;

?>