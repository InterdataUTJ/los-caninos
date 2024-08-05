<?php
session_start();
require_once(__DIR__ . "/../../middlewares/session.php");
require_once(__DIR__ . "/../../controllers/perfil/index.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver empleados</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Ver empleados</h2>

    <a href="/empleados/nuevo/" class="mb-4 fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
      <?php require(__DIR__."/../../components/icons/new.php") ?>
      Nuevo empleado
    </a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellidos Paterno</th>
              <th>Apellidos Materno</th>
              <th>Sexo</th>
              <th>Estado</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <th>1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <a class="btn btn-primary fw-bold">Ver</a>
                <a class="btn btn-success fw-bold">Editar</a>
                <a class="btn btn-danger fw-bold">Eliminar</a>
              </td>
            </tr>
        </tbody>
    </table>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>