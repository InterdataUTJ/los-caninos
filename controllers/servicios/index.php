<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/servicios/index.php");

$facturas = new Facturas();

$facturasFiltrado = array_filter($facturas->getFacturas(), function($factura) {

  $serviciosFIltrados = array_filter($factura->getServicios(), function($servicio) {
    return in_array($servicio->getTipoServicio(), $_GET["filterTipo"])
        && in_array($servicio->getEstatus(), $_GET["filterEstatus"]);
  });

  $factura->changeServicios($serviciosFIltrados);

  return in_array($factura->getDescuento(), $_GET["filterDescuento"]);
});

return $facturasFiltrado;

?>