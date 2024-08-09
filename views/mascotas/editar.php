<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/veterinario.php");

// Componentes
require_once(__DIR__ . "/../../components/mascotas/index.php");

// Controladores
[$mascota, $empleados, $clientes] = require_once(__DIR__ . "/../../controllers/mascotas/ver.php");

if (!isset($_GET["id"]) || !$mascota) {
  header("Location: /mascotas/?error=Mascota no encontrado");
  die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mascota #<?= $mascota->getId(); ?></title>
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
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Mascota #<?= $mascota->getId(); ?></h2>
    <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de usuario</h4>

    <form onsubmit="enviarDatos(event);" action="/controllers/mascotas/editar/" method="POST">
      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold">Id de Mascota</label>
        <input type="number" class="form-control disabled" id="id" name="id" value="<?= $mascota->getId(); ?>" readonly onclick='return false;'>
      </div>

      <div class="d-flex gap-3">
        <div data-mdb-input-init class="form-outline mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="idEmpleado">Id de Empleado</label>
          <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado">
            <?php foreach ($empleados as $empleado) : 
              $selected = $mascota->getIdEmpleado() == $empleado->getId() ? "selected" : "";
            ?>  
              <option value='<?= $empleado->getId() ?>' <?= $selected ?>>
                #<?= $empleado->getId()?> - <?= $empleado->getNombreUsuario()?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div data-mdb-input-init class="form-outline mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="idCliente">Id de Cliente</label>
          <select class="form-select" id="idCliente" aria-label="idCliente" name="idCliente">
            <?php foreach ($clientes as $cliente) :
              $selected = $mascota->getIdCliente() == $cliente->getId() ? "selected" : "";
            ?>
              <option value='<?= $cliente->getId() ?>' <?= $selected ?>>
                #<?= $cliente->getId() ?> - <?= $cliente->getNombreUsuario() ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información de la mascota</h4>

      <div class="mb-3">
        <label class="form-label fw-bold" for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $mascota->getNombre(); ?>">
        <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold" for="raza">Raza</label>
        <input type="text" class="form-control" id="raza" name="raza" value="<?= $mascota->getRaza(); ?>">
        <div class="form-text invalid-feedback">La raza debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold" for="tipoMascota">Tipo de mascota</label>
        <input type="text" class="form-control" id="tipoMascota" name="tipoMascota" value="<?= $mascota->getTipoMascota(); ?>">
        <div class="form-text invalid-feedback">El tipo de mascota debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>
      
      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaNac">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="<?= $mascota->getFechaNac(); ?>">
        <div class="form-text invalid-feedback">La fecha de nacimiento debe de ser una fecha valida.</div>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="tamano">Tamaño</label>
        <select class="form-select" id="tamano" aria-label="tamano" name="tamano">
          <option value="PEQUEÑO" <?= $mascota->getTamano() == "PEQUEÑO" ? "selected" : ""; ?>>Pequeño</option>
          <option value="MEDIANO" <?= $mascota->getTamano() == "MEDIANO" ? "selected" : ""; ?>>Mediano</option>
          <option value="GRANDE" <?= $mascota->getTamano() == "GRANDE" ? "selected" : ""; ?>>Grande</option>
        </select>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo">
          <option value="M" <?= $mascota->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?= $mascota->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?= $mascota->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold" for="peso">Peso</label>
        <input type="number" class="form-control" id="peso" name="peso" value="<?= $mascota->getPeso(); ?>">
        <div class="form-text invalid-feedback">El peso debe de ser un numero mayor a 0.</div>
      </div>
      
      <h3 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Acciones</h3>

      <div class="d-flex gap-3">
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