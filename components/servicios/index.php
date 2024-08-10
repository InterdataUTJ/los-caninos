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
    SERVICIOS_ELEMENT;

    if ($isFirstServicio) {
      $htmlElement .= <<<SERVICIOS_ELEMENT
        <td rowspan="$numServicios">
          <div class='d-flex gap-3 flex-column'>
            <a href='/servicios/ver/?id={$factura->getId()}' class='btn btn-primary fw-bold'>Ver</a>
            <a href='/servicios/editar/?id={$factura->getId()}' class='btn btn-success fw-bold'>Editar</a>
          </div>
        </td>
      SERVICIOS_ELEMENT;
    }

    $htmlElement .= "</tr>";
    $isFirstServicio = false;
  }

  return $htmlElement;
}

?>