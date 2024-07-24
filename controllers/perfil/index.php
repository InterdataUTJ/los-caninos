<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/perfil/empleado.php");
require_once(__DIR__ . "/../../models/perfil/cliente.php");

$usuario = new Empleado();;
if ($_SESSION["rol"] == "CLIENTE") $usuario = new Cliente();

$estado = $usuario->cargar($_SESSION["idRegistro"]);
if (!$estado) $usuario = null;

?>