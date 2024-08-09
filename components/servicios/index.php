<?php

function serviciosTable($factura) {
  $servicios = $factura->getServicios();
  $numServicios = count($servicios);
  $htmlElement = "";
  $isFirstServicio = true;

  foreach ($servicios as $servicio) {
    $htmlElement .= "<tr>";
    $descuento = floatval($factura->getDescuento()) + 0;
    $subtotal = floatval($factura->getSubtotal()) + 0;

    if ($isFirstServicio) {
      $isFirstServicio = false;
      $htmlElement .= <<<SERVICIOS_ELEMENT
        <th rowspan="$numServicios">{$factura->getId()}</th>
        <td rowspan="$numServicios">{$descuento}%</td>
        <td rowspan="$numServicios">\${$subtotal}</td>
      SERVICIOS_ELEMENT;
    }

    $htmlElement .= <<<SERVICIOS_ELEMENT
        <td>{$servicio->getIdPaciente()}</td>
        <td>{$servicio->getTipoServicio()}</td>
        <td>{$servicio->getDiagnostico()}</td>
        <td>{$servicio->getFechaIngreso()}</td>
        <td>{$servicio->getEstatus()}</td>
        <td class='d-flex gap-2'>
          <a href='/servicios/ver/?id={$servicio->getId()}' class='btn btn-primary fw-bold'>Ver</a>
          <a href='/servicios/editar/?id={$servicio->getId()}' class='btn btn-success fw-bold'>Editar</a>
        </td>
      </tr>
    SERVICIOS_ELEMENT;
  }

  return $htmlElement;
}

?>