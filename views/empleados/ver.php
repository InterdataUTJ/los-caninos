<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Componentes
require_once(__DIR__ . "/../../components/empleados/index.php");

// Controladores
$empleado = require_once(__DIR__ . "/../../controllers/empleados/ver.php");

if (!isset($_GET["id"]) || !$empleado) {
  header("Location: /empleados/?error=Empleado no encontrado");
  die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empleado #<?= $empleado->getId(); ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Empleado #<?= $empleado->getId(); ?></h2>
    <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de usuario</h4>

    <form>
      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Id de Empleado</label>
          <input type="text" class="form-control" value="<?= $empleado->getId(); ?>" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Id de Usuario</label>
          <input type="text" class="form-control" value="<?= $empleado->getIdUsuario(); ?>" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre de Usuario</label>
        <input type="text" class="form-control" value="<?= $empleado->getNombreUsuario(); ?>" disabled>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información personal</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre(s)</label>
        <input type="text" class="form-control" value="<?= $empleado->getNombre(); ?>" disabled>
      </div>

      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Apellido Paterno</label>
          <input type="text" class="form-control" value="<?= $empleado->getApellidoPaterno(); ?>" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Apellido Materno</label>
          <input type="text" class="form-control" value="<?= $empleado->getApellidoMaterno(); ?>" disabled>
        </div>
      </div>
      
      <div class="mb-3">
        <label class="form-label fw-bold">Fecha de Nacimiento</label>
        <input type="date" class="form-control" value="<?= $empleado->getFechaNac(); ?>" disabled>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo" disabled>
          <option value="M" <?= $empleado->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?= $empleado->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?= $empleado->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h4>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Teléfono(s)</label>
        <?php if (count($empleado->getTelefonos()) == 0) echo "<p>Sin teléfonos registrados.</p>"; ?>
        <?php foreach ($empleado->getTelefonos() as $telefono) : ?>
          <input type='text' class='form-control mb-2' value='<?= $telefono ?>' disabled />
        <?php endforeach; ?>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Correo(s)</label>
        <?php if (count($empleado->getEmails()) == 0) echo "<p>Sin correos registrados.</p>"; ?>
        <?php foreach ($empleado->getEmails() as $email) : ?>
          <input type='text' class='form-control mb-2' value='<?= $email ?>' disabled />
        <?php endforeach; ?>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información de empleado</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">Salario</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">$</span>
          <input type="number" class="form-control" value="<?= $empleado->getSalario(); ?>" disabled>
          <span class="input-group-text" id="basic-addon1">MXN</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Estado</label>
        <input type="text" class="form-control" value="<?= $empleado->getEstatus(); ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Rol</label>
        <input type="text" class="form-control" value="<?= $empleado->getRol(); ?>" disabled>
      </div>

      
      <h3 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Acciones</h3>

      <div class="d-flex gap-3">
      <a href='/empleados/' class='btn btn-primary fw-bold'>Volver</a>
      <a href='/empleados/editar/?id=<?= $empleado->getId(); ?>' class='btn btn-success fw-bold'>Editar</a>
      <a href='/empleados/eliminar/?id=<?= $empleado->getId(); ?>' class='btn btn-danger fw-bold'>Eliminar</a>
      </div>

    </form>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>