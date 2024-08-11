<?php

session_start();
require_once(__DIR__ . "/../../middlewares/gerente.php");
require_once(__DIR__ . "/../../models/mascotas/nuevo.php");

function error($msg, $code = 301) {
  header("Location: /mascotas/nuevo/?error=$msg", true, $code);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") error("Método no permitido.", 405);
if (!isset($_POST["idCliente"])) error("Id de cliente no proporcionado.");
if (!isset($_POST["nombre"])) error("Nombre no proporcionado.");
if (!isset($_POST["raza"])) error("Raza no proporcionada.");
if (!isset($_POST["tipoMascota"])) error("Tipo de mascota no proporcionada.");
if (!isset($_POST["fechaNac"])) error("Fecha de nacimiento no proporcionada.");
if (!isset($_POST["tamano"])) error("Tamaño no proporcionado.");
if (!isset($_POST["sexo"])) error("Sexo no proporcionado.");
if (!isset($_POST["peso"])) error("Seso no proporcionado.");

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

header("Location: /mascotas/?error=Mascota creada con éxito.", true, 301);

?>