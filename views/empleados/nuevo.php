<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Controladores
$clientes = require_once(__DIR__ . "/../../controllers/empleados/nuevo.clientes.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo empleado</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
  
  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/empleados/nuevo.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Nuevo empleado</h2>

    <form action="/controllers/empleados/nuevo/" method="POST" onsubmit="enviarDatos(event);">

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="idCliente">Id Cliente</label>
        <select class="form-select" id="idCliente" aria-label="idCliente" name="idCliente">
          <?php
            foreach ($clientes as $cliente) {
              echo "<option value='{$cliente->getId()}'>#{$cliente->getId()} - {$cliente->getNombreUsuario()}</option>";
            }
          ?>
        </select>
      </div>
      
      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="estado">Estado</label>
        <select class="form-select" id="estado" aria-label="estado" name="estado">
          <option value="ACTIVO">Activo</option>
          <option value="INACTIVO" selected>Inactivo</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaNac">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNac" id="fechaNac">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="salario">Salario</label>
        <input type="number" class="form-control" name="salario" id="salario" value="0">
        <div class="form-text invalid-feedback">El salario no puede ser menor a $0 MXN.</div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="rol">Rol</label>
        <select class="form-select" id="rol" aria-label="rol" name="rol">
          <option value="GERENTE">Gerente</option>
          <option value="VETERINARIO" selected>Veterinario</option>
        </select>
      </div>

      <div class="d-flex gap-3 mt-5">
        <button type="submit" class='flex-grow-1 btn btn-success fw-bold'>Guardar</button>
        <a onclick="history.back();" class='flex-grow-1 btn btn-outline-danger fw-bold'>Cancelar</a>
      </div>

    </form>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>