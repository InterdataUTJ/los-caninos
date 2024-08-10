<?php

function mascotaTable($id, $nombre, $raza, $tipoMascota, $fechaNac, $tamano, $sexo, $peso) {
  $editar = "";
  if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO") {
    $editar = <<<EOD
      <a href='/mascotas/editar/?id=$id' class='btn btn-success fw-bold'>Editar</a>
    EOD;
  }
  
  return <<<EOD
    <tr>
      <th>$id</th>
      <td>$nombre</td>
      <td>$raza</td>
      <td>$tipoMascota</td>
      <td>$fechaNac</td>
      <td>$tamano</td>
      <td>$sexo</td>
      <td>$peso</td>
      <td class='d-flex gap-2'>
        <a href='/mascotas/ver/?id=$id' class='btn btn-primary fw-bold'>Ver</a>
        $editar
      </td>
    </tr>
  EOD;
}

?>