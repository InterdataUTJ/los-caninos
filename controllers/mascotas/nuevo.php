<?php

session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/mascotas/nuevo.php");

function error($msg, $code = 301) {
  header("Location: /mascotas/nuevo/?error=$msg", true, $code);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") error("Método no permitido", 405);
if (!isset($_POST["idCliente"])) error("idCliente no proporcionado");
if (!isset($_POST["nombre"])) error("nombre no proporcionado");
if (!isset($_POST["raza"])) error("raza no proporcionado");
if (!isset($_POST["tipoMascota"])) error("tipoMascota no proporcionado");
if (!isset($_POST["fechaNac"])) error("fechaNac no proporcionado");
if (!isset($_POST["tamano"])) error("tamano no proporcionado");
if (!isset($_POST["sexo"])) error("sexo no proporcionado");
if (!isset($_POST["peso"])) error("peso no proporcionado");

$nuevaMascota = new NuevaMascota();
$nuevaMascota->setIdEmpleado($_SESSION["idRegistro"]);
$nuevaMascota->setIdCliente($_POST["idCliente"]);
$nuevaMascota->setNombre($_POST["nombre"]);
$nuevaMascota->setRaza($_POST["raza"]);
$nuevaMascota->setTipoMascota($_POST["tipoMascota"]);
$nuevaMascota->setFechaNac($_POST["fechaNac"]);
$nuevaMascota->setTamano($_POST["tamano"]);
$nuevaMascota->setSexo($_POST["sexo"]);
$nuevaMascota->setPeso($_POST["peso"]);
$nuevaMascota->guardar();

header("Location: /mascotas/?error=Mascota creada con exito.", true, 301);

?>