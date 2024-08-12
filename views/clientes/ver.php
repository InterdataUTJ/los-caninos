<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/gerente.php");

// Componentes
require_once(__DIR__ . "/../../components/clientes/index.php");

// Controladores
$cliente = require_once(__DIR__ . "/../../controllers/clientes/ver.php");

if (!isset($_GET["id"]) || !$cliente) {
  header("Location: /clientes/?error=Cliente no encontrado");
  die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cliente #<?= $cliente->getIdCliente(); ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Cliente #<?= $cliente->getIdCliente(); ?></h2>
    <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de usuario</h4>

    <form>
      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Id de Cliente</label>
          <input type="text" class="form-control" value="<?= $cliente->getIdCliente(); ?>" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Id de Usuario</label>
          <input type="text" class="form-control" value="<?= $cliente->getIdUsuario(); ?>" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre de Usuario</label>
        <input type="text" class="form-control" value="<?= $cliente->getNombreUsuario(); ?>" disabled>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información personal</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre(s)</label>
        <input type="text" class="form-control" value="<?= $cliente->getNombre(); ?>" disabled>
      </div>

      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Apellido Paterno</label>
          <input type="text" class="form-control" value="<?= $cliente->getApellidoPaterno(); ?>" disabled>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold">Apellido Materno</label>
          <input type="text" class="form-control" value="<?= $cliente->getApellidoMaterno(); ?>" disabled>
        </div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo" disabled>
          <option value="M" <?= $cliente->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?= $cliente->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?= $cliente->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h4>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Teléfono(s)</label>
        <?php if (count($cliente->getTelefonos()) == 0) echo "<p>Sin teléfonos registrados.</p>"; ?>
        <?php foreach ($cliente->getTelefonos() as $telefono) : ?>
          <input type='text' class='form-control mb-2' value='<?= $telefono ?>' disabled />
        <?php endforeach; ?>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Correo(s)</label>
        <?php if (count($cliente->getEmails()) == 0) echo "<p>Sin correos registrados.</p>"; ?>
        <?php foreach ($cliente->getEmails() as $email) : ?>
          <input type='text' class='form-control mb-2' value='<?= $email ?>' disabled />
        <?php endforeach; ?>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información de cliente</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">Rol</label>
        <input type="text" class="form-control" value="<?= $cliente->getRol(); ?>" disabled>
      </div>

      
      <h3 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Acciones</h3>

      <div class="d-flex gap-3">
      <a href='/clientes/' class='btn btn-primary fw-bold'>Volver</a>
      </div>

    </form>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>