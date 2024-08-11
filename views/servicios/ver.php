<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/session.php");

if (!isset($_GET["id"])) {
  header("Location: /servicios/?error=Factura no encontrado");
  die();
}

// Controladores
[$factura, $empleados, $mascotas] = require_once(__DIR__ . "/../../controllers/servicios/ver.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver servicio #<?= $_GET["id"] ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
  
  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/servicios/validar.js" defer></script>
  <script src="/src/scripts/servicios/editar.enviar.js" defer></script>
  <script src="/src/scripts/servicios/nuevo.servicio.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Servicio #<?= $_GET["id"] ?></h2>

    <form onsubmit="enviarDatos(event);" action="/controllers/mascotas/nuevo/" method="POST">
      <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de facturación</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">ID de Factura</label>
        <input type="number" class="form-control disabled" name="idFactura" id="idFactura" value="<?= $_GET["id"]; ?>" disabled>
      </div>

      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="descuento">Descuento</label>
          <input type="text" class="form-control disabled" name="descuento" value="0%" id="descuento" placeholder="Descuento" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="subtotal">Subtotal</label>
          <input type="text" class="form-control disabled" name="subtotal" value="$100 MXN" id="subtotal" placeholder="Subtotal" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="total">Total</label>
          <input type="text" class="form-control" id="total" value="$100 MXN" disabled>
        </div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="metodoPago">Método de pago</label>
        <select class="form-select" id="metodoPago" aria-label="metodoPago" name="metodoPago" disabled>
          <option value="EFECTIVO" <?= $factura->getMetodoPago() === "EFECTIVO" ? "selected" : "";  ?>>Efectivo</option>
          <option value="TARJETA" <?= $factura->getMetodoPago() === "TARJETA" ? "selected" : "";  ?>>Tarjeta</option>
          <option value="TRANSFERENCIA" <?= $factura->getMetodoPago() === "TRANSFERENCIA" ? "selected" : "";  ?>>Transferencia</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaPago">Fecha de pago</label>
        <input type="date" class="form-control" name="fechaPago" id="fechaPago" value="<?= $factura->getFechaPago(); ?>" disabled>
        <div class="form-text invalid-feedback">La fecha de pago debe de ser una fecha valida.</div>
      </div>

      
      <h4 class="fw-bold pb-2 mb-3 mt-4" style="border-bottom: 2px solid #fcbc73;">Servicios</h4>

      <?php foreach($factura->getServicios() as $servicio) : ?>
        <details id='<?= $servicio->getId(); ?>-servicio-id' class="mb-4 mx-3 p-3 rounded border nuevo-servicio" style="background-color: #fcfcfc;">
          <summary>
            <span class="fw-bold pb-2 mb-3 d-inline-block w-75" style="border-bottom: 3px solid #fcbc73;">Servicio #<?= $servicio->getId(); ?></span>
          </summary>

          <div class="mb-3">
            <label class="form-label fw-bold">ID de Servicio</label>
            <input type="number" class="form-control disabled" name="idServicio" value="<?= $servicio->getId(); ?>" disabled>
          </div>

          <div data-mdb-input-init class="form-outline mb-3">
            <label class="form-label fw-bold" for="idPaciente">Paciente</label>
            <select class="form-select" id="idPaciente" aria-label="idPaciente" name="idPaciente" disabled>
              <?php foreach ($mascotas as $paciente) : ?>
                <option value='<?= $paciente->getId() ?>' <?= $servicio->getIdPaciente() == $paciente->getId() ? "selected" : ""; ?>>
                  #<?= $paciente->getId() ?> - <?= $paciente->getNombre() ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <?php $empleadoRandId = $servicio->getId()."-".rand(0, 99); ?>
          <div data-mdb-input-init class="form-outline mb-3" id="<?= $empleadoRandId ?>-container-id">
            <label class="form-label fw-bold" for="idEmpleado">Empleados</label>

            <?php foreach ($servicio->getIdEmpleados() as $idEmpleado) : ?>
              <div class="input-group mb-3" id="<?= $empleadoRandId."-".$idEmpleado ?>-empleado-id">
                <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado" disabled>
                  <?php foreach ($empleados as $empleadoNested) : ?>
                    <?php
                      $selected = "";
                      $empleadoIdString = "#{$idEmpleado} - {$servicio->getNombreUsuarioEmpleados()[$idEmpleado]}";
                      if (in_array($empleadoIdString, $servicio->getEmpleados())){
                        $selected = "selected";
                      }
                    ?>
                    <option value='<?= $idEmpleado ?>' <?= $selected ?>>
                      <?= $empleadoIdString ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold" for="diagnostico">Diagnóstico</label>
            <input type="text" class="form-control" name="diagnostico" id="diagnostico" placeholder="Diagnóstico" disabled value="<?= $servicio->getDiagnostico(); ?>">
            <div class="form-text invalid-feedback">El diagnóstico debe tener una longitud entre 5 y 400 caracteres.</div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold" for="tratamiento">Tratamiento</label>
            <input type="text" class="form-control" name="tratamiento" id="tratamiento" placeholder="Tratamiento" disabled value="<?= $servicio->getTratamiento(); ?>">
            <div class="form-text invalid-feedback">El tratamiento debe tener una longitud entre 5 y 300 caracteres.</div>
          </div>

          <div data-mdb-input-init class="form-outline mb-3">
            <label class="form-label fw-bold" for="tipoServicio">Tipo de servicio</label>
            <select class="form-select" id="tipoServicio" disabled aria-label="tipoServicio" name="tipoServicio" onchange="actualizarDatos()">
              <option <?= $servicio->getTipoServicio() === "CONSULTA" ? "selected" : "";  ?> value="CONSULTA">Consulta</option>
              <option <?= $servicio->getTipoServicio() === "VACUNA" ? "selected" : "";  ?> value="VACUNA">Vacuna</option>
              <option <?= $servicio->getTipoServicio() === "DESPARASITACION" ? "selected" : "";  ?> value="DESPARASITACION">Desparasitación</option>
              <option <?= $servicio->getTipoServicio() === "CIRUGIA" ? "selected" : "";  ?> value="CIRUGIA">Cirugía</option>
              <option <?= $servicio->getTipoServicio() === "ESTETICA" ? "selected" : "";  ?> value="ESTETICA">Estética</option>
              <option <?= $servicio->getTipoServicio() === "ESTADIA" ? "selected" : "";  ?> value="ESTADIA">Estadía</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold" for="fechaIngreso">Fecha de ingreso</label>
            <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso" disabled value="<?= $servicio->getFechaIngreso(); ?>">
            <div class="form-text invalid-feedback">La fecha de ingreso debe de ser una fecha valida.</div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold" for="fechaSalida">Fecha de salida</label>
            <input type="date" class="form-control" name="fechaSalida" id="fechaSalida" disabled value="<?= $servicio->getFechaSalida(); ?>">
            <div class="form-text invalid-feedback">La fecha de salida debe de ser una fecha valida.</div>
          </div>
        </details>
      <?php endforeach; ?>

      <div class="d-flex gap-3">
        <a href='/servicios/' class='btn btn-primary fw-bold'>Volver</a>
        <?php if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO") : ?>
          <a href='/servicios/editar/?id=<?= $factura->getId(); ?>' class='btn btn-success fw-bold'>Editar</a>
        <?php endif; ?>
      </div>

    </form>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>