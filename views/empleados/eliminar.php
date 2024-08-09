<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");


if (!isset($_GET["id"])) {
  header("Location: /empleados/?error=Empleado no encontrado");
  die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar empleado #<?= $_GET["id"]; ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">

  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/empleados/editar.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Eliminar empleado #<?= $_GET["id"]; ?></h2>

    <p>¿Estas seguro de que deseas eliminar el empleado #<?= $_GET["id"];?>? Esta acción no se puede deshacer.</p>

    <a onclick="history.back();" class="btn btn-success fw-bold">Cancelar y volver</a>
    <a href="/controllers/empleados/eliminar/?id=<?= $_GET["id"];?>" class="btn btn-outline-danger fw-bold">Eliminar</a>
    
  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>
  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>