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
  <title>Editar empleado #<?php echo $empleado->getId(); ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">

  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/empleados/editar.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Editar empleado #<?php echo $empleado->getId(); ?></h2>
    <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de usuario</h4>

    <form onsubmit="enviarDatos(event);" action="/controllers/empleados/editar/" method="POST">
      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="id">Id de Empleado</label>
          <input type="number" class="form-control disabled" name="id" id="id" value="<?php echo $empleado->getId(); ?>" readonly onclick='return false;'>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="idUsuario">Id de Usuario</label>
          <input type="number" class="form-control disabled" name="idUsuario" id="idUsuario" value="<?php echo $empleado->getIdUsuario(); ?>" readonly onclick='return false;'>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre de Usuario</label>
        <input type="text" class="form-control" value="<?php echo $empleado->getNombreUsuario(); ?>" disabled>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información personal</h4>

      <div class="mb-3">
        <label class="form-label fw-bold" for="nombre">Nombre(s)</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $empleado->getNombre(); ?>">
        <div class="form-text invalid-feedback">El nombre debe tener una longitud entre 3 y 50 caracteres.</div>
      </div>

      <div class="d-flex gap-3">
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="apellidoPaterno">Apellido Paterno</label>
          <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $empleado->getApellidoPaterno(); ?>">
          <div class="form-text invalid-feedback">El apellido paterno debe tener una longitud entre 3 y 50 caracteres.</div>
        </div>
        <div class="mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="apellidoMaterno">Apellido Materno</label>
          <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $empleado->getApellidoMaterno(); ?>">
          <div class="form-text invalid-feedback">El apellido materno puede tener una longitud maxima de 50 caracteres.</div>
        </div>
      </div>
      
      <div class="mb-3">
        <label class="form-label fw-bold" for="fechaNac">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="<?php echo $empleado->getFechaNac(); ?>">
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo">
          <option value="M" <?php echo $empleado->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?php echo $empleado->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?php echo $empleado->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h4>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Telefono(s)</label>
        <?php
          if (count($empleado->getTelefonos()) == 0) echo "<p>Sin telefonos registrados.</p>";
          foreach ($empleado->getTelefonos() as $telefono) {
            echo "<input type='text' class='form-control mb-2' value='{$telefono}' disabled />";
          }
        ?>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Correo(s)</label>
        <?php
          if (count($empleado->getEmails()) == 0) echo "<p>Sin correos registrados.</p>";
          foreach ($empleado->getEmails() as $email) {
            echo "<input type='text' class='form-control mb-2' value='{$email}' disabled />";
          }
        ?>
      </div>

      
      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información de empleado</h4>

      <div class="mb-3">
        <label class="form-label fw-bold" for="salario">Salario</label>
        <div class="input-group mb-3">
          <span class="input-group-text">$</span>
          <input type="number" class="form-control" id="salario" name="salario" value="<?php echo $empleado->getSalario(); ?>">
          <span class="input-group-text">MXN</span>
          <div class="form-text invalid-feedback">El salario no puede ser menor a $0 MXN.</div>
        </div>
      </div>

      <div data-mdb-input-init class="mb-3 form-outline">
        <label class="form-label fw-bold" for="estado">Estado</label>
        <select class="form-select" id="estado" aria-label="estado" name="estado">
          <option value="ACTIVO" <?php echo $empleado->getEstatus() == "ACTIVO" ? "selected" : ""; ?>>ACTIVO</option>
          <option value="INACTIVO" <?php echo $empleado->getEstatus() == "INACTIVO" ? "selected" : ""; ?>>INACTIVO</option>
        </select>
      </div>

      <div data-mdb-input-init class="mb-3 form-outline">
        <label class="form-label fw-bold" for="rol">Rol</label>
        <select class="form-select" id="rol" aria-label="rol" name="rol">
          <option value="GERENTE" <?php echo $empleado->getRol() == "GERENTE" ? "selected" : ""; ?>>GERENTE</option>
          <option value="VETERINARIO" <?php echo $empleado->getRol() == "VETERINARIO" ? "selected" : ""; ?>>VETERINARIO</option>
        </select>
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