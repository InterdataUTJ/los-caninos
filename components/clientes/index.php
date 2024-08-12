<?php

function clienteTable($idCliente, $nombres, $apellidoPaterno, $apellidoMaterno, $sexo, $rol, $nombreUsuario) {
  return <<<HTML
    <tr>
      <th>$idCliente</th>
      <td>$nombres</td>
      <td>$apellidoPaterno</td>
      <td>$apellidoMaterno</td>
      <td>$sexo</td>
      <td>$rol</td>
      <td>$nombreUsuario</td>
      <td class='d-flex gap-2'>
        <a href='/clientes/ver/?id=$idCliente' class='btn btn-primary fw-bold'>Ver</a>
        <a href='/clientes/editar/?id=$idCliente' class='btn btn-success fw-bold'>Editar</a>
        <a href='/clientes/eliminar/?id=$idCliente' class='btn btn-danger fw-bold'>Eliminar</a>
      </td>
    </tr>
  HTML;
}

?>
