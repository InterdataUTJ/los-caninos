<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/session.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Charts</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">

  <script src="/src/Chart.js/chart.umd.min.js"></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Graficos</h2>

    <section class="d-flex gap-3 flex-wrap justify-content-evenly">
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="sexoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
      <div class="card shadow p-3" style="height: 200px; width: 200px;"><canvas id="tamanoChart"></canvas></div>
    </section>
    

    <script>
      const sexoChart = document.getElementById('sexoChart');
      const tamanoChart = document.getElementById('tamanoChart');

      const namePluginLabel = {
        id: "doughnutLabel",
        beforeDatasetsDraw(chart, args, options) {
          const { ctx, data } = chart;
          ctx.save();
          const xCoor = chart.getDatasetMeta(0).data[0].x;
          const yCoor = chart.getDatasetMeta(0).data[0].y;
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          ctx.font = `bold ${options.size} sans-serif`;
          ctx.fillStyle = options.color;
          ctx.fillText(options.text, xCoor, yCoor);
        },
        
        defaults: {
          text: "Titulo",
          color: "black",
          size: "20px"
        }
      };

      new Chart(sexoChart, {
        type: 'doughnut',
        data: {
          labels: ['Masculino', 'Femenino', 'Otro'],
          datasets: [{
            label: 'Num. de Empleados',
            data: [300, 50, 100],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            cutout: "60%",
            circumference: 200,
            rotation: 260
          }],
        },
        options: {
          plugins: {
            doughnutLabel: { text: "Sexo" }
          }
        },
        plugins: [namePluginLabel]
      });

      new Chart(tamanoChart, {
        type: 'doughnut',
        data: {
          labels: ['Masculino', 'Femenino', 'Otro'],
          datasets: [{
            label: 'Num. de Empleados',
            data: [300, 50, 100],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            cutout: "60%",
            circumference: 200,
            rotation: 260
          }],
        },
        options: {
          plugins: {
            doughnutLabel: { text: "Tamaño" }
          }
        },
        plugins: [namePluginLabel]
      });
    </script>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>