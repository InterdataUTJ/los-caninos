<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/veterinario.php");

// Controladores
$clientes = require_once(__DIR__ . "/../../controllers/mascotas/nuevo.clientes.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva mascota</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
  
  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/mascotas/editar.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Nueva mascota</h2>

    <form onsubmit="enviarDatos(event);" action="/controllers/mascotas/nuevo/" method="POST">

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="idCliente">Id de Cliente</label>
        <select class="form-select" id="idCliente" aria-label="idCliente" name="idCliente">
          <?php foreach ($clientes as $cliente) : ?>
            <option value='<?= $cliente->getId() ?>'>
              #<?= $cliente->getId() ?> - <?= $cliente->getNombreUsuario() ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
        <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="raza">Raza</label>
        <input type="text" class="form-control" name="raza" id="raza" placeholder="Raza">
        <div class="form-text invalid-feedback">La raza debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="tipoMascota">Tipo de mascota</label>
        <input type="text" class="form-control" name="tipoMascota" id="tipoMascota" placeholder="Tipo de mascota">
        <div class="form-text invalid-feedback">El tipo de mascota debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaNac">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNac" id="fechaNac">
        <div class="form-text invalid-feedback">La fecha de nacimiento debe de ser una fecha valida.</div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="tamano">Tamaño</label>
        <select class="form-select" id="tamano" aria-label="tamano" name="tamano">
          <option value="PEQUEÑO">Pequeño</option>
          <option value="MEDIANO">Mediano</option>
          <option value="GRANDE">Grande</option>
        </select>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo">
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
          <option value="O">Otro</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="peso">Peso</label>
        <input type="number" step="any" class="form-control" name="peso" id="peso" placeholder="Peso">
        <div class="form-text invalid-feedback">El peso debe ser un numero mayor a 0.</div>
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