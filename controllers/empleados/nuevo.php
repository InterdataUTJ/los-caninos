<?php

session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/empleados/nuevo.php");

function error($msg, $code = 301) {
  header("Location: /empleados/nuevo/?error=$msg", true, $code);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") error("Método no permitido", 405);

if (!isset($_POST["idCliente"])) error("idCliente no proporcionado");
if (!isset($_POST["estado"])) error("Estado no proporcionado");
if (!isset($_POST["fechaNac"])) error("Fecha de nacimiento no proporcionado");
if (!isset($_POST["salario"])) error("Salario no proporcionado");
if (!isset($_POST["rol"])) error("Rol no proporcionado");

$nuevoEmpleado = new NuevoEmpleado();
$nuevoEmpleado->setIdCliente($_POST["idCliente"]);
$nuevoEmpleado->setEstado($_POST["estado"]);
$nuevoEmpleado->setFechaNac($_POST["fechaNac"]);
$nuevoEmpleado->setSalario($_POST["salario"]);
$nuevoEmpleado->setRol($_POST["rol"]);
$nuevoEmpleado->guardar();

header("Location: /empleados/?error=Empleado creado con exito.", true, 301);

?>