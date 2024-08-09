<?php

session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");

function errorNoId($msg, $code = 301) {
  header("Location: /mascotas/?error=$msg", true, $code);
  die();
}

function error($msg, $code = 301) {
  $id = $_POST["id"];
  header("Location: /mascotas/editar/?id=$id&error=$msg", true, $code);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") errorNoId("Método no permitido", 405);
if (!isset($_POST["id"])) errorNoId("Id no proporcionado");
if (!isset($_POST["idEmpleado"])) errorNoId("Id de Empleado no proporcionado");
if (!isset($_POST["idCliente"])) errorNoId("Id de Cliente no proporcionado");
if (!isset($_POST["nombre"])) error("Nombre no proporcionado");
if (!isset($_POST["raza"])) error("Raza no proporcionada");
if (!isset($_POST["tipoMascota"])) error("Tipo de mascota no proporcionada");
if (!isset($_POST["fechaNac"])) error("Fecha de nacimiento no proporcionada");
if (!isset($_POST["tamano"])) error("Tamaño no proporcionado");
if (!isset($_POST["sexo"])) error("Sexo no proporcionado");
if (!isset($_POST["peso"])) error("Peso no proporcionado");


require_once(__DIR__ . "/../../models/mascotas/editar.php");

$mascota = new EditarMascota();
$mascota->setId($_POST["id"]);
$mascota->setIdEmpleado($_POST["idEmpleado"]);
$mascota->setIdCliente($_POST["idCliente"]);
$mascota->setNombre($_POST["nombre"]);
$mascota->setRaza($_POST["raza"]);
$mascota->setTipoMascota($_POST["tipoMascota"]);
$mascota->setFechaNac($_POST["fechaNac"]);
$mascota->setTamano($_POST["tamano"]);
$mascota->setSexo($_POST["sexo"]);
$mascota->setPeso($_POST["peso"]);
$mascota->editar();

header("Location: /mascotas/ver/?id=" . $_POST["id"]."&error=Datos actualizados con exito.", true, 301);

?>