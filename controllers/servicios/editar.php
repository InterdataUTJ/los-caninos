<?php

session_start();
require_once(__DIR__ . "/../../middlewares/veterinario.php");
require_once(__DIR__ . "/../../models/servicios/editar.php");

function error($msg, $code = 301) {
  header("Content-Type: application/json");
  http_response_code($code);
  echo json_encode([ "error" => $msg ]);
  die();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") error("Método no permitido.");
if ($_SERVER["CONTENT_TYPE"] !== "application/json") error("Tipo de contenido no permitido.");
$_POST = json_decode(file_get_contents('php://input'), true);

if (!isset($_POST["idFactura"])) error("Falta el id de la factura.");
if (!isset($_POST["fechaPago"])) error("Falta la fecha de pago.");
if (!isset($_POST["metodoPago"])) error("Falta el método de pago.");
if (!isset($_POST["descuento"])) error("Falta el descuento.");
if (!isset($_POST["subtotal"])) error("Falta el subtotal.");
if (!isset($_POST["servicios"])) error("Falta la lista de servicios.");
if (!is_array($_POST["servicios"])) error("La lista de servicios no es válida.");
if (count($_POST["servicios"]) < 1) error("La lista de servicios no puede estar vacía.");

foreach ($_POST["servicios"] as $servicio) {
  if (!isset($servicio["idServicio"])) error("Falta el id del servicio.");
  if (!isset($servicio["idPaciente"])) error("Falta el id del paciente.");
  if (!isset($servicio["diagnostico"])) error("Falta el diagnóstico.");
  if (!isset($servicio["tratamiento"])) error("Falta el tratamiento.");
  if (!isset($servicio["tipoServicio"])) error("Falta el tipo de servicio.");
  if (!isset($servicio["fechaIngreso"])) error("Falta la fecha de ingreso.");
  if (!isset($servicio["fechaSalida"])) error("Falta la fecha de salida.");
  if (!isset($servicio["estatus"])) error("Falta el estatus.");

  if (!isset($servicio["idEmpleado"])) error("Falta la lista de empleados.");
  if (!is_array($servicio["idEmpleado"])) error("La lista de empleados no es válida.");
  if (count($servicio["idEmpleado"]) < 1) error("La lista de empleados no puede estar vacía.");
}

$factura = new EditarFactura();
$factura->setId($_POST["idFactura"]);
$factura->setFechaPago($_POST["fechaPago"]);
$factura->setMetodoPago($_POST["metodoPago"]);
$factura->setDescuento($_POST["descuento"]);
$factura->setSubtotal($_POST["subtotal"]);
$idFactura = $factura->editar();

foreach($_POST["servicios"] as $servicio) {
  $nuevoServicio = new EditarServicio();
  $nuevoServicio->setId($servicio["idServicio"]);
  $nuevoServicio->setIdFactura($idFactura);
  $nuevoServicio->setIdPaciente($servicio["idPaciente"]);
  $nuevoServicio->setDiagnostico($servicio["diagnostico"]);
  $nuevoServicio->setTratamiento($servicio["tratamiento"]);
  $nuevoServicio->setTipoServicio($servicio["tipoServicio"]);
  $nuevoServicio->setFechaIngreso($servicio["fechaIngreso"]);
  $nuevoServicio->setFechaSalida($servicio["fechaSalida"]);
  $nuevoServicio->setEstatus($servicio["estatus"]);
  $nuevoServicio->setEmpleados();
  $nuevoServicio->editarEmpleados($servicio["idEmpleado"]);
  $nuevoServicio->editar();
}

header("Content-Type: application/json");
http_response_code(201);
echo json_encode([ "message" => "Servicio editado correctamente." ]);

?>