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

if ($_SERVER["REQUEST_METHOD"] !== "GET") errorNoId("Método no permitido.", 405);
if (!isset($_GET["id"])) errorNoId("Id no proporcionado.");

require_once(__DIR__ . "/../../models/empleados/eliminar.php");
$empleado = new EliminarEmpleado();
$empleado->setId($_GET["id"]);
$empleado->eliminar();

header("Location: /empleados/?error=Empleado eliminado con éxito.", true, 301);

?>