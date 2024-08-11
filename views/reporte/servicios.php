<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

date_default_timezone_set('America/Mexico_City');

// Controlador
$servicios = require_once(__DIR__ . "/../../controllers/reporte/servicios.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte servicios</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">

  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/Chart.js/chart.umd.min.js"></script>
  <script src="/src/scripts/reporte/filtros.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-2" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Reporte de servicios</h2>
    
    <p class="mb-1"><b>Reporte generado el:</b> <?= date("d/m/Y") ?></p>
    <p class="mb-1"><b>ID del Gerente:</b> <?= $_SESSION["idRegistro"] ?></p>
    <p class="mb-1"><b>Nombre de usuario:</b> <?= $_SESSION["usuario"] ?></p>

    <h4 class="fw-bold pb-2" style="border-bottom: 2px solid #fcbc73;">Servicios por fecha específica</h4>

    <section class="d-flex flex-column gap-2 filter p-3 my-4 border rounded shadow"> 
      <h5 class="fw-bold">Filtros</h5>
      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label for="fechaInicio" class="form-label fw-bold">Fecha inicio</label>
          <input type="date" class="form-control" id="fechaInicio" <?php if (isset($_GET["fechaInicio"])) echo "value='{$_GET['fechaInicio']}'"; ?>>
        </div>
        <div class="mb-3 flex-grow-1">
          <label for="fechaFIn" class="form-label fw-bold">Fecha fin</label>
          <input type="date" class="form-control" id="fechaFin" <?php if (isset($_GET["fechaFin"])) echo "value='{$_GET['fechaFin']}'"; ?>>
        </div>
      </div>
      <button onclick="filtroServicios();" class="btn btn-success d-flex justify-content-center align-items-center gap-2 fw-bold">
        <?php require(__DIR__."/../../components/icons/repeat.php"); ?>
        Aplicar
      </button>
    </section>

    <section class="d-flex flex-wrap gap-4 justify-content-evenly">
      <div class="card shadow" style="width: 16rem;">
        <div class="card-body text-center">
          <h5 class="card-title fw-bolder">Pacientes atendidos</h5>
          <p class="card-text fw-bold fs-4" style="color: blue;"><?= $servicios->getNumPacientes(); ?></p>
        </div>
      </div>

      <div class="card shadow" style="width: 16rem;">
        <div class="card-body text-center">
          <h5 class="card-title fw-bolder">Servicios realizados</h5>
          <p class="card-text fw-bold fs-4" style="color: red;"><?= $servicios->getNumServicios(); ?></p>
        </div>
      </div>

      <div class="card shadow" style="width: 16rem;">
        <div class="card-body text-center">
          <h5 class="card-title fw-bolder">Ingresos generados</h5>
          <p class="card-text fw-bold fs-4" style="color: green;">$<?= $servicios->getIngresos(); ?> MXN</p>
        </div>
      </div>
    </section>

    <div class="overflow-hidden rounded border my-4 shadow">
      <table class="table table-striped m-0">
        <thead>
          <tr>
            <th>Paciente</th>
            <th>Dueño</th>
            <th>Servicio</th>
            <th>Ingresos</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($servicios->getPacientes() AS $paciente) : ?>
            <tr>
              <td><?= $paciente->getPaciente(); ?></td>
              <td><?= $paciente->getCliente(); ?></td>
              <td><?= $paciente->getServicio(); ?></td>
              <td>$<?= $paciente->getIngresos(); ?> MXN</td>
            </tr>
          <?php endforeach; ?>
          <tr class="fw-bold">
            <td colspan="3" class="text-end">Total</td>
            <td>$<?= $servicios->getIngresos(); ?> MXN</td>
          </tr>
        </tbody>
      </table>
    </div>

    <print-page-break></print-page-break>

    <h4 class="fw-bold pb-2" style="border-bottom: 2px solid #fcbc73;">Servicios generales</h4>

    <section class="d-flex gap-4 flex-wrap justify-content-evenly">
      <div class="card shadow rounded p-3 long-chart" style="max-width: 600px; width: 90%; aspect-ratio: 2/1;">
        <canvas class="w-100 h-100" id="servicios-por-dia">
      </div>

      <div class="card shadow rounded p-3 long-chart" style="max-width: 600px; width: 90%; aspect-ratio: 2/1;">
        <canvas class="w-100 h-100" id="tipo-servicios">
      </div>
    </section>

    <button class="print btn btn-primary d-flex justify-content-center align-items-center gap-2 fw-bold" onclick="window.print();">
      <?php require(__DIR__."/../../components/icons/printer.php"); ?>
      Imprimir
    </button>

    <script type="module">
      import createBar from '/src/Chart.js/charts/bar.js';
      import createLine from '/src/Chart.js/charts/line.js';

      createBar("servicios-por-dia", {
        title: "Servicios por día",
        data: {
          "Lunes": <?= $servicios->getDays()["lunes"]; ?>,
          "Martes": <?= $servicios->getDays()["martes"]; ?>,
          "Miercoles": <?= $servicios->getDays()["miercoles"]; ?>,
          "Jueves": <?= $servicios->getDays()["jueves"]; ?>,
          "Viernes": <?= $servicios->getDays()["viernes"]; ?>,
          "Sabado": <?= $servicios->getDays()["sabado"]; ?>,
          "Domingo": <?= $servicios->getDays()["domingo"]; ?>,
        }
      });

      createLine("tipo-servicios", {
        title: "Tipo de servicios",
        data: {
          "Consulta": <?= $servicios->getTipoServicio()["CONSULTA"]; ?>,
          "Vacuna": <?= $servicios->getTipoServicio()["VACUNA"]; ?>,
          "Desparacitación": <?= $servicios->getTipoServicio()["DESPARASITACION"]; ?>,
          "Cirugia": <?= $servicios->getTipoServicio()["CIRUGIA"]; ?>,
          "Estetica": <?= $servicios->getTipoServicio()["ESTETICA"]; ?>,
          "Estadia": <?= $servicios->getTipoServicio()["ESTADIA"]; ?>,
        }
      });

    </script>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>
  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
  <link rel="stylesheet" href="/src/styles/reporte/print.css">
</body>

</html>