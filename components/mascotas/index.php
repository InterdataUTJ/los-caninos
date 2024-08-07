<?php

function mascotaTable($id, $nombre, $raza, $tipoMascota, $fechaNac, $tamano, $sexo, $peso) {
  $data  = "<tr>";
  $data .= "<th>$id</th>";
  $data .= "<td>$nombre</td>";
  $data .= "<td>$raza</td>";
  $data .= "<td>$tipoMascota</td>";
  $data .= "<td>$fechaNac</td>";
  $data .= "<td>$tamano</td>";
  $data .= "<td>$sexo</td>";
  $data .= "<td>$peso</td>";
  $data .= "<td class='d-flex gap-2'>";
  $data .= "<a href='/mascotas/ver/?id=".$id."' class='btn btn-primary fw-bold'>Ver</a>";
  $data .= "<a href='/mascotas/editar/?id=".$id."' class='btn btn-success fw-bold'>Editar</a>";
  $data .= "</td>";
  $data .= "</tr>";
  return $data;
}

?>