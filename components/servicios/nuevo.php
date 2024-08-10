<?php

if (!isset($mascotas)) $mascotas = [];
if (!isset($empleados)) $empleados = [];

$mascotasHTMLData = "";
foreach ($mascotas as $paciente) {
  $mascotasHTMLData .= "<option value='{$paciente->getId()}'>#{$paciente->getId()} - {$paciente->getNombre()}</option>";
}

$empleadosHTMLData = "";
foreach ($empleados as $empleado) {
  $empleadosHTMLData .= "<option value='{$empleado->getId()}'>#{$empleado->getId()} - {$empleado->getNombreUsuario()}</option>";
}

ob_start();
require(__DIR__ . "/../icons/trash.php");
$trashHTMLDataIcon = ob_get_clean();

ob_start();
require(__DIR__ . "/../icons/new.php");
$newHTMLDataIcon = ob_get_clean();


?>

<script>
  const empleadosHTMLData = `<?= $empleadosHTMLData ?>`;
  const mascotasHTMLData = `<?= $mascotasHTMLData ?>`;
  const trashHTMLDataIcon = `<?= $trashHTMLDataIcon ?>`;
  const newHTMLDataIcon = `<?= $newHTMLDataIcon ?>`;
</script>