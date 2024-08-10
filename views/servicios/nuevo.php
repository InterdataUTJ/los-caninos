<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/veterinario.php");

// Controladores
[$mascotas, $empleados] = require_once(__DIR__ . "/../../controllers/servicios/nuevo.mascotas.empleados.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Servicio</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">

  <?php require_once(__DIR__ . "/../../components/servicios/nuevo.php"); ?>
  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/servicios/validar.js" defer></script>
  <script src="/src/scripts/servicios/nuevo.enviar.js" defer></script>
  <script src="/src/scripts/servicios/nuevo.servicio.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Nuevo servicio</h2>

    <form onsubmit="enviarDatos(event);" action="/controllers/mascotas/nuevo/" method="POST">
      <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de facturación</h4>

      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="descuento">Descuento</label>
          <input type="text" class="form-control disabled" name="descuento" value="0%" id="descuento" placeholder="Descuento" readonly>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="subtotal">Subtotal</label>
          <input type="text" class="form-control disabled" name="subtotal" value="$100 MXN" id="subtotal" placeholder="Subtotal" readonly>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="total">Total</label>
          <input type="text" class="form-control" id="total" value="$100 MXN" disabled>
        </div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="metodoPago">Metodo de pago</label>
        <select class="form-select" id="metodoPago" aria-label="metodoPago" name="metodoPago">
          <option value="EFECTIVO">Efectivo</option>
          <option value="TARJETA">Tarjeta</option>
          <option value="TRANSFERENCIA">Transferencia</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaPago">Fecha de pago</label>
        <input type="date" class="form-control" name="fechaPago" id="fechaPago" value>
        <div class="form-text invalid-feedback">La fecha de pago debe de ser una fecha valida.</div>
        <script>document.getElementById('fechaPago').valueAsDate = new Date();</script>
      </div>

      
      <h4 class="fw-bold pb-2 mb-3 mt-4" style="border-bottom: 2px solid #fcbc73;">Servicios</h4>

      <?php $servicioRandId = time()."-".rand(0, 99); ?>
      <details id='<?= $servicioRandId ?>-servicio-id' class="mb-4 mx-3 p-3 rounded border nuevo-servicio" style="background-color: #fcfcfc;">
        <summary>
          <span class="fw-bold pb-2 mb-3 d-inline-block w-75" style="border-bottom: 3px solid #fcbc73;">Nuevo servicio</span>
        </summary>

        <div data-mdb-input-init class="form-outline mb-3">
          <label class="form-label fw-bold" for="idPaciente">Paciente</label>
          <select class="form-select" id="idPaciente" aria-label="idPaciente" name="idPaciente">
            <?php foreach ($mascotas as $paciente) : ?>
              <option value='<?= $paciente->getId() ?>'>
                #<?= $paciente->getId() ?> - <?= $paciente->getNombre() ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <?php $empleadoRandId = $servicioRandId."-".rand(0, 99); ?>
        <div data-mdb-input-init class="form-outline mb-3" id="<?= $empleadoRandId ?>-container-id">
          <label class="form-label fw-bold" for="idEmpleado">Empleados</label>

          
          <div class="input-group mb-3" id="<?= $empleadoRandId ?>-empleado-id">
            <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado">
              <?php foreach ($empleados as $empleado) : ?>
                <option value='<?= $empleado->getId() ?>'>
                  #<?= $empleado->getId() ?> - <?= $empleado->getNombreUsuario() ?>
                </option>
              <?php endforeach; ?>
            </select>
            <button class="btn btn-outline-danger" type="button" onclick="document.getElementById('<?= $empleadoRandId ?>-empleado-id').remove();">
              <?php require(__DIR__ . "/../../components/icons/trash.php"); ?>
            </button>
          </div>

          <a id="<?= $empleadoRandId ?>-nuevo-empleado" onclick="nuevoEmpleado('<?= $empleadoRandId ?>');" class="fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
            <?php require(__DIR__ . "/../../components/icons/new.php") ?>
            Añadir empleado
          </a>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold" for="diagnostico">Diagnostico</label>
          <input type="text" class="form-control" name="diagnostico" id="diagnostico" placeholder="Diagnostico">
          <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 5 y 400 caracteres.</div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold" for="tratamiento">Tratamiento</label>
          <input type="text" class="form-control" name="tratamiento" id="tratamiento" placeholder="Tratamiento">
          <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 5 y 300 caracteres.</div>
        </div>

        <div data-mdb-input-init class="form-outline mb-3">
          <label class="form-label fw-bold" for="tipoServicio">Tipo de servicio</label>
          <select class="form-select" id="tipoServicio" aria-label="tipoServicio" name="tipoServicio" onchange="actualizarDatos()">
            <option value="CONSULTA" selected>Consulta</option>
            <option value="VACUNA">Vacuna</option>
            <option value="DESPARASITACION">Desparasitacion</option>
            <option value="CIRUGIA">Cirugia</option>
            <option value="ESTETICA">Estetica</option>
            <option value="ESTADIA">Estadia</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold" for="fechaIngreso">Fecha de ingreso</label>
          <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso">
          <div class="form-text invalid-feedback">La fecha de ingreso debe de ser una fecha valida.</div>
          <script>document.getElementById('fechaIngreso').valueAsDate = new Date();</script>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold" for="fechaSalida">Fecha de salida</label>
          <input type="date" class="form-control" name="fechaSalida" id="fechaSalida">
          <div class="form-text invalid-feedback">La fecha de salida debe de ser una fecha valida.</div>
          <script>document.getElementById('fechaSalida').valueAsDate = new Date();</script>
        </div>

        <a onclick="eliminarServicio('<?= $servicioRandId ?>')" class="btn btn-danger fw-bold d-flex w-100 mb-3 justify-content-center align-items-center gap-3">
          <?php require(__DIR__."/../../components/icons/trash.php"); ?>
          Eliminar servicio
        </a>
      </details>

      <a onclick="nuevoServicio();" id="agregar-servicio-btn" class="btn btn-primary fw-bold d-flex w-100 mb-3 justify-content-center align-items-center gap-3">
        <?php require(__DIR__."/../../components/icons/new.php"); ?>
        Agregar servicio
      </a>

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