<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");

// Este lo tengo que quitar :) 
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Componentes
//Es necesario agregar un componente empleados
//require_once(__DIR__ . "/../../components/empleados/index.php");

// Controladores
//Es necesario agregar un controlador clientes
$clientes = require_once(__DIR__ . "/../../controllers/clientes/index.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Clientes</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Ver Clientes</h2>

    <a href="/clientes/nuevo/" class="mb-4 fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
      <?php require(__DIR__."/../../components/icons/new.php") ?>
      Nuevo cliente
    </a>

    <?php // require_once(__DIR__."/../../components/empleados/filtros/filtros.html.php"); ?>

    <div class="overflow-x-auto">
      <table class="table table-striped table-bordered">
          <thead class="text-center">
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos Paterno</th>
                <th>Apellidos Materno</th>
                <th>Sexo</th>
                <th>Nombre de usuario</th>
              </tr>
          </thead>  
          <tbody>
              <?php 
                foreach ($clientes as $cliente) {
                  echo clienteTable(
                    $$cliente->getId(),
                    $cliente->getNombre(),
                    $cliente->getApellidoPaterno(),
                    $cliente->getApellidoMaterno(),
                    $cliente->getSexo(),
                    $cliente->getEstatus(),
                    $cliente->getRol(),
                    $cliente->getNombreUsuario()
                  );
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




