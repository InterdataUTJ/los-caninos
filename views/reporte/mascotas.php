<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

date_default_timezone_set('America/Mexico_City');

// Controlador
$mascotas = require_once(__DIR__ . "/../../controllers/reporte/mascotas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte mascotas</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">

  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/Chart.js/chart.umd.min.js"></script>
  <script src="/src/scripts/reporte/filtros.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-2" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Reporte de mascotas</h2>
    
    <p class="mb-1"><b>Reporte generado el:</b> <?= date("d/m/Y") ?></p>
    <p class="mb-1"><b>ID del Gerente:</b> <?= $_SESSION["idRegistro"] ?></p>
    <p class="mb-1"><b>Nombre de usuario:</b> <?= $_SESSION["usuario"] ?></p>

    <h4 class="fw-bold pb-2" style="border-bottom: 2px solid #fcbc73;">Información general</h4>

    <section class="d-flex gap-4 flex-wrap justify-content-evenly">
      <div class="card shadow rounded p-3 small-chart" style="max-width: 300px; width: 90%; aspect-ratio: 1/1;">
        <canvas class="w-100 h-100" id="mascotas-sexo">
      </div>

      <div class="card shadow rounded p-3 small-chart" style="max-width: 300px; width: 90%; aspect-ratio: 1/1;">
        <canvas class="w-100 h-100" id="mascotas-tamano">
      </div>

      <div class="card shadow rounded p-3 long-chart" style="max-width: 600px; width: 90%; aspect-ratio: 2/1;">
        <canvas class="w-100 h-100" id="mascotas-edad">
      </div>

      <div class="card shadow rounded p-3 long-chart" style="max-width: 600px; width: 90%; aspect-ratio: 2/1;">
        <canvas class="w-100 h-100" id="mascotas-peso">
      </div>
    </section>

    <button class="print btn btn-primary d-flex justify-content-center align-items-center gap-2 fw-bold" onclick="window.print();">
      <?php require(__DIR__."/../../components/icons/printer.php"); ?>
      Imprimir
    </button>

    <script type="module">
      import createDoughnut from "/src/Chart.js/charts/doughnut.js";
      import createLine from "/src/Chart.js/charts/line.js";

      createDoughnut("mascotas-sexo", {
        title: "Sexo",
        data: {
          "Masculino": <?= $mascotas->getSexo()["M"] ?? 0 ?>,
          "Femenino": <?= $mascotas->getSexo()["F"] ?? 0 ?>,
          "Otro": <?= $mascotas->getSexo()["O"] ?? 0 ?>
        }
      });

      createDoughnut("mascotas-tamano", {
        title: "Tamaño",
        data: {
          "PEQUEÑO": <?= $mascotas->getTamano()[""] ?? 0 ?>,
          "MEDIANO": <?= $mascotas->getTamano()["MEDIANO"] ?? 0 ?>,
          "GRANDE": <?= $mascotas->getTamano()["GRANDE"] ?? 0 ?>
        }
      });

      createLine("mascotas-edad", {
        title: "Edad",
        data: <?= json_encode($mascotas->getEdad()) ?>
      });

      createLine("mascotas-peso", {
        title: "Peso (kg.)",
        data: <?= json_encode($mascotas->getPeso()) ?>,
        colors: [
          "rgb(255, 99, 132)",
          "rgba(255, 99, 132, 0)"
        ]
      });

    </script>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>
  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
  <link rel="stylesheet" href="/src/styles/reporte/print.css">
</body>

</html>