<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/servicios/index.php");

$facturas = new Facturas();

$facturasFiltrado = array_filter($facturas->getFacturas(), function($factura) {

  $serviciosFIltrados = array_filter($factura->getServicios(), function($servicio) {

    $permitido = true;

    if ($_SESSION["rol"] == "CLIENTE" && $servicio->getIdCliente() != $_SESSION["idRegistro"]) {
      $permitido = false;
    }

    if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "INACTIVO") {
      if (!in_array($_SESSION["idRegistro"], $servicio->getIdEmpleados())) {
        $permitido = false;
      }
    }

    return in_array($servicio->getTipoServicio(), $_GET["filterTipo"])
        && in_array($servicio->getEstatus(), $_GET["filterEstatus"])
        && $permitido;
  });

  $factura->changeServicios($serviciosFIltrados);

  return in_array($factura->getDescuento(), $_GET["filterDescuento"]);
});

return $facturasFiltrado;

?>