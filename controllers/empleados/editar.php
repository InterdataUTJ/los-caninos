<?php

session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");

function errorNoId($msg, $code = 301) {
  header("Location: /empleados/?error=$msg", true, $code);
  die();
}

function error($msg, $code = 301) {
  $id = $_POST["id"];
  header("Location: /empleados/editar/?id=$id&error=$msg", true, $code);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") errorNoId("Método no permitido.", 405);
if (!isset($_POST["id"])) errorNoId("Id no proporcionado.");
if (!isset($_POST["idUsuario"])) error("Id de usuario no proporcionado.");
if (!isset($_POST["nombre"])) error("Nombre no proporcionado.");
if (!isset($_POST["apellidoPaterno"])) error("Apellido paterno no proporcionado.");
if (!isset($_POST["apellidoMaterno"])) error("Apellido materno no proporcionado.");
if (!isset($_POST["fechaNac"])) error("Fecha de nacimiento no proporcionada.");
if (!isset($_POST["sexo"])) error("Sexo no proporcionado.");
if (!isset($_POST["salario"])) error("Salario no proporcionado.");
if (!isset($_POST["estado"])) error("Estado no proporcionado.");
if (!isset($_POST["rol"])) error("Rol no proporcionado.");

require_once(__DIR__ . "/../../models/empleados/editar.php");

$empleado = new EditarEmpleado();
$empleado->setId($_POST["id"]);
$empleado->setIdUsuario($_POST["idUsuario"]);
$empleado->setNombre($_POST["nombre"]);
$empleado->setApellidoPaterno($_POST["apellidoPaterno"]);
$empleado->setApellidoMaterno($_POST["apellidoMaterno"]);
$empleado->setFechaNac($_POST["fechaNac"]);
$empleado->setSexo($_POST["sexo"]);
$empleado->setSalario($_POST["salario"]);
$empleado->setEstatus($_POST["estado"]);
$empleado->setRol($_POST["rol"]);
$empleado->editar();

header("Location: /empleados/ver/?id=" . $_POST["id"]."&error=Datos actualizados con éxito.", true, 301);

?>