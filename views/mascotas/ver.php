<?php
// Midlewares
require_once(__DIR__ . "/../../middlewares/session_start.php");
require_once(__DIR__ . "/../../middlewares/session.php");

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
  <title>Mascota #<?php echo $mascota->getId(); ?></title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/landing.css">
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex flex-column h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Mascota #<?php echo $mascota->getId(); ?></h2>
    <h4 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de usuario</h4>

    <form>
      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold">Id de Mascota</label>
        <input type="number" class="form-control" value="<?php echo $mascota->getId(); ?>" disabled>
      </div>

      <div class="d-flex gap-3">
        <div data-mdb-input-init class="form-outline mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="idEmpleado">Id de Empleado</label>
          <select class="form-select" id="idEmpleado" aria-label="idEmpleado" name="idEmpleado" disabled>
            <?php
              foreach ($empleados as $empleado) {
                $selected = $mascota->getIdEmpleado() == $empleado->getId() ? "selected" : "";
                echo "<option value='{$empleado->getId()}' {$selected}>#{$empleado->getId()} - {$empleado->getNombreUsuario()}</option>";
              }
            ?>
          </select>
        </div>
        <div data-mdb-input-init class="form-outline mb-3 flex-grow-1">
          <label class="form-label fw-bold" for="idCliente">Id de Cliente</label>
          <select class="form-select" id="idCliente" aria-label="idCliente" name="idCliente" disabled>
            <?php
              foreach ($clientes as $cliente) {
                $selected = $mascota->getIdCliente() == $cliente->getId() ? "selected" : "";
                echo "<option value='{$cliente->getId()}' {$selected}>#{$cliente->getId()} - {$cliente->getNombreUsuario()}</option>";
              }
            ?>
          </select>
        </div>
      </div>

      <h4 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Información de la mascota</h4>

      <div class="mb-3">
        <label class="form-label fw-bold">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $mascota->getNombre(); ?>" disabled>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold">Raza</label>
        <input type="text" class="form-control" value="<?php echo $mascota->getRaza(); ?>" disabled>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold">Tipo de mascota</label>
        <input type="text" class="form-control" value="<?php echo $mascota->getTipoMascota(); ?>" disabled>
      </div>
      
      <div class="mb-3">
        <label class="form-label fw-bold">Fecha de Nacimiento</label>
        <input type="date" class="form-control" value="<?php echo $mascota->getFechaNac(); ?>" disabled>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="tamano">Tamaño</label>
        <select class="form-select" id="tamano" aria-label="tamano" name="tamano" disabled>
          <option value="PEQUEÑO" <?php echo $mascota->getTamano() == "PEQUEÑO" ? "selected" : ""; ?>>Pequeño</option>
          <option value="MEDIANO" <?php echo $mascota->getTamano() == "MEDIANO" ? "selected" : ""; ?>>Mediano</option>
          <option value="GRANDE" <?php echo $mascota->getTamano() == "GRANDE" ? "selected" : ""; ?>>Grande</option>
        </select>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo" disabled>
          <option value="M" <?php echo $mascota->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?php echo $mascota->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?php echo $mascota->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      <div class="mb-3 flex-grow-1">
        <label class="form-label fw-bold">Peso</label>
        <input type="number" class="form-control" value="<?php echo $mascota->getPeso(); ?>" disabled>
      </div>
      
      <h3 class="fw-bold py-2 my-3" style="border-bottom: 2px solid #fcbc73;">Acciones</h3>

      <div class="d-flex gap-3">
      <a href='/mascotas/' class='btn btn-primary fw-bold'>Volver</a>
      <a href='/mascotas/editar/?id=<?php echo $mascota->getId(); ?>' class='btn btn-success fw-bold'>Editar</a>
      </div>

    </form>

  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>