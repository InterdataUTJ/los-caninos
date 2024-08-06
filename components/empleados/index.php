<?php

function empleadoTable($id, $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $estado, $rol, $nombreUsuario) {
  $data  = "<tr>";
  $data .= "<th>$id</th>";
  $data .= "<td>$nombre</td>";
  $data .= "<td>$apellidoPaterno</td>";
  $data .= "<td>$apellidoMaterno</td>";
  $data .= "<td>$sexo</td>";
  $data .= "<td>$estado</td>";
  $data .= "<td>$rol</td>";
  $data .= "<td>$nombreUsuario</td>";
  $data .= "<td class='d-flex gap-2'>";
  $data .= "<a href='/empleados/ver/?id=".$id."' class='btn btn-primary fw-bold'>Ver</a>";
  $data .= "<a href='/empleados/editar/?id=".$id."' class='btn btn-success fw-bold'>Editar</a>";
  $data .= "<a href='/empleados/eliminar/?id=".$id."' class='btn btn-danger fw-bold'>Eliminar</a>";
  $data .= "</td>";
  $data .= "</tr>";
  return $data;
}

?>