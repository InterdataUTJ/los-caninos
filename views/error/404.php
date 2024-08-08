<?php

require_once(__DIR__ . "/../../middlewares/session_start.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 404</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/button.css">
</head>

<body class="container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../../components/header.php"); ?>

  <main class="d-flex flex-column gap-3 justify-content-center align-items-center">
    <img src="/src/images/error/Error404.svg" width="50%" style="max-width: 300px;" alt="Error404">
    <h2 class="fw-bold">Página no encontrada</h2>
    <p>La página que estás buscando no existe.</p>
    <a class="btn btn-orange-primary" href="/">Volver al inicio</a>
  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>