<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/session.php");

// Componentes
require_once(__DIR__."/../../components/servicios/filtros/filtros.back.php");
require_once(__DIR__ . "/../../components/servicios/index.php");

// Controladores
$facturas = require_once(__DIR__ . "/../../controllers/servicios/index.php");



?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver servicios</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/module-table.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Ver servicios</h2>

    <?php if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO") : ?>
      <a href="/servicios/nuevo/" class="mb-4 fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
        <?php require(__DIR__."/../../components/icons/new.php") ?>
        Nuevo servicio
      </a>
    <?php endif; ?>

    <?php require_once(__DIR__."/../../components/servicios/filtros/filtros.html.php"); ?>

    <div class="overflow-x-auto">
      <table class="table table-striped table-bordered">
          <thead class="text-center">
              <tr>
                <th>Factura</th>
                <th>Descuento</th>
                <th>Subtotal</th>
                <th>ID Paciente</th>
                <th>Tipo de Servicio</th>
                <th>Diagnostico</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Acciones</th>
              </tr>
          </thead>  
          <tbody class="text-center">
              <?php 
                foreach ($facturas as $factura) {
                  echo serviciosTable($factura);
                }
              ?>
          </tbody>
      </table>
    </div>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>