<?php
// Middlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/session.php");

// Controladores
require_once(__DIR__ . "/../../controllers/perfil/index.php");

// Edad
$fechaNac = new DateTime($usuario->getFechaNac());
$hoy = new DateTime('now', new DateTimeZone('America/Mexico_city'));;            
$edad = $hoy->diff($fechaNac)->y;

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Los caninos</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/button.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">

  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/perfil/enviar.js" defer></script>
  <script src="/src/scripts/perfil/campos.telefono.js" defer></script>
  <script src="/src/scripts/perfil/campos.email.js" defer></script>
  <script src="/src/scripts/perfil/password.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">

    <section class="w-25 d-flex flex-column rounded p-3 shadow card-resume-container">
      <img
        alt="avatar"
        class="mb-3 w-75 mx-auto rounded-circle"
        style="user-select: none; max-width: 500px"
        src="/src/images/avatar/<?= $usuario->getSexo(); ?>.svg">
      <section>
        <p class="m-0 text-center fw-bold">
          <?= "{$usuario->getNombre()} {$usuario->getApellidoPaterno()} {$usuario->getApellidoMaterno()}"; ?>
        </p>

        <?php if ($_SESSION["rol"] != "CLIENTE") : ?>
          <p class="m-0 text-center"> <?= $edad; ?> años </p>
        <?php endif; ?>

        <p class="m-0 text-center fst-italic">
          <?= ucfirst(strtolower($_SESSION["rol"])); ?>
        </p>
      </section>
    </section>

    <form action="/controllers/perfil/editar/" method="POST" class="flex-grow-1 d-flex flex-column gap-3 p-3" onsubmit="enviarDatos(event);">
      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información Personal</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="nombre">Nombre *</label>
        <input placeholder="Nombre" type="text" name="nombre" id="nombre" class="form-control" value="<?= $usuario->getNombre(); ?>" />
        <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoPaterno">Apellido Paterno *</label>
        <input placeholder="Apellido Paterno" type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" value="<?= $usuario->getApellidoPaterno(); ?>" />
        <div class="form-text invalid-feedback">El apellido paterno debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoMaterno">Apellido Materno</label>
        <input placeholder="Apellido Materno" type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" value="<?= $usuario->getApellidoMaterno(); ?>" />
        <div class="form-text invalid-feedback">El apellido materno puede tener una longitud maxima de 50 caracteres.</div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo *</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo">
          <option value="M" <?= $usuario->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?= $usuario->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?= $usuario->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de ingreso</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre de usuario *</label>
        <div class="input-group mb-3">
          <input value="<?= $_SESSION["usuario"]; ?>" type="text" class="form-control" id="username" placeholder="Nombre de usuario">
          <button id="username-btn" class="btn btn-outline-warning fw-bold" type="button">Cambiar</button>
          <div class="invalid-feedback">El nombre de usuario debe de tener una longitud de entre 8 y 25 caracteres.</div>
        </div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <button
          class="btn btn-warning fw-bold w-100 d-flex gap-2 justify-content-center align-items-center"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#changePasswordModal">
          <?php include(__DIR__ . "/../../components/icons/repeat.php") ?>
          Cambiar contraseña
        </button>
      </div>


      <h2 class="fw-bold mt-4 pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h2>

      <div data-mdb-input-init class="form-outline" id="container-phone">
        <label class="form-label fw-bold" for="telefono">Telefono(s)</label>

        <?php foreach ($usuario->getTelefonos() as $telefono) : ?>
          <div class="input-group mb-3" id="<?= $telefono; ?>-phone-id">
            <input value="<?= $telefono; ?>" type="text" class="form-control" name="telefono[]" placeholder="Telefono">
            <button class="btn btn-outline-danger" type="button" onclick="removeTelefono('<?= $telefono; ?>-phone-id');">
              <?php require(__DIR__ . "/../../components/icons/trash.php"); ?>
            </button>
            <div class="invalid-feedback">Telefno debe de tener entre 7 y 15 digitos.</div>
          </div>
        <?php endforeach; ?>

        <button id="new-phone" onclick="nuevoTelefono();" type="button" class="mb-4 fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
          <?php require(__DIR__ . "/../../components/icons/new.php") ?>
          Nuevo
        </button>
      </div>

      <div data-mdb-input-init class="form-outline mb-3" id="container-email">
        <label class="form-label fw-bold" for="email">Correo(s)</label>

        <?php foreach ($usuario->getEmails() as $email) : ?>
          <div class="input-group mb-3" id="<?= $email ?>-email-id">
            <input value="<?= $email ?>" type="text" name="email[]" class="form-control" placeholder="Correo">
            <button class="btn btn-outline-danger" type="button" onclick="removeEmail('<?= $email ?>-email-id');">
              <?php require(__DIR__ . "/../../components/icons/trash.php"); ?>
            </button>
            <div class="invalid-feedback">Email debe de ser un correo valido.</div>
          </div>
        <?php endforeach; ?>

        <button id="new-email" onclick="nuevoEmail();" type="button" class="fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
          <?php require(__DIR__ . "/../../components/icons/new.php") ?>
          Nuevo
        </button>
      </div>

      <?php if ($_SESSION["rol"] != "CLIENTE") : ?>
        <h2 class='fw-bold mt-4 pb-2 mb-3' style='border-bottom: 2px solid #fcbc73;'>Información del empleado</h2>

        <div data-mdb-input-init class='form-outline'>
          <label class='form-label fw-bold' for='fechaNac'>Fecha de Nacimiento *</label>
          <input type='date' name='fechaNac' id='fechaNac' class='form-control' value='<?= $usuario->getFechaNac() ?>' />
        </div>

        <div data-mdb-input-init class='form-outline'>
          <label class='form-label fw-bold'>Salario *</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">$</span>
            <input type='number' class='form-control' value='<?= $usuario->getSalario() ?>' disabled />
            <span class="input-group-text" id="basic-addon1">MXN</span>
          </div>
        </div>

        <div data-mdb-input-init class="form-outline">
          <label class="form-label fw-bold">Estado *</label>
          <select class="form-select" aria-label="estado" disabled>
            <option value="ACTIVO" <?= $usuario->getEstado() == "ACTIVO" ? "selected" : "" ?>>Activo</option>
            <option value="INACTIVO" <?= $usuario->getEstado() == "INACTIVO" ? "selected" : "" ?>>Inactivo</option>
          </select>
        </div>
      <?php endif; ?>

      <div class="d-flex gap-3">
        <button class="flex-grow-1 fw-bold btn btn-success mt-4" type="submit">
          Guardar
        </button>
        <a class="flex-grow-1 fw-bold btn btn-outline-danger mt-4" type="submit" href="/perfil/">
          Cancelar
        </a>
      </div>

    </form>
  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
  <?php require_once(__DIR__ . "/../../components/changePassword.php") ?>
</body>

</html>