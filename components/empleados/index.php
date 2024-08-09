<?php

function empleadoTable($id, $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $estado, $rol, $nombreUsuario) {
  return <<<EOD
    <tr>
      <th>$id</th>
      <td>$nombre</td>
      <td>$apellidoPaterno</td>
      <td>$apellidoMaterno</td>
      <td>$sexo</td>
      <td>$estado</td>
      <td>$rol</td>
      <td>$nombreUsuario</td>
      <td class='d-flex gap-2'>
        <a href='/empleados/ver/?id=$id' class='btn btn-primary fw-bold'>Ver</a>
        <a href='/empleados/editar/?id=$id' class='btn btn-success fw-bold'>Editar</a>
        <a href='/empleados/eliminar/?id=$id' class='btn btn-danger fw-bold'>Eliminar</a>
      </td>
    </tr>
  EOD;
}

?>