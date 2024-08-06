<?php
session_start();
require_once(__DIR__ . "/../../middlewares/session.php");
require_once(__DIR__ . "/../../controllers/perfil/index.php");

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
  <link rel="stylesheet" href="/src/styles/perfil/query.css">
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">

    <section class="w-25 d-flex flex-column rounded p-3 shadow card-resume-container">
      <img 
        alt="avatar"
        class="mb-3 w-75 mx-auto rounded-circle" 
        style="user-select: none; max-width: 500px" 
        src="/src/images/avatar/<?php echo $usuario->getSexo(); ?>.svg"
      >
      <section>
        <p class="m-0 text-center fw-bold">
          <?php echo "{$usuario->getNombre()} {$usuario->getApellidoPaterno()} {$usuario->getApellidoMaterno()}"; ?>
        </p>
        <?php
          if ($_SESSION["rol"] != "CLIENTE") {
            echo '<p class="m-0 text-center">';
            $fechaNac = new DateTime($usuario->getFechaNac());
            $hoy = new DateTime('now', new DateTimeZone('America/Mexico_city'));;            
            $edad = $hoy->diff($fechaNac);
            echo $edad->y;
            echo ' años </p>';
          }
        ?>
        <p class="m-0 text-center fst-italic">
          <?php echo ucfirst(strtolower($_SESSION["rol"])); ?>
        </p>
      </section>
    </section>

    <form class="flex-grow-1 d-flex flex-column gap-3 p-3" onsubmit="noEnviar(event);">
      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información Personal</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre</label>
        <input type="text" name="username" class="form-control" value="<?php echo $usuario->getNombre(); ?>" disabled />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoPaterno">Apellido Paterno</label>
        <input type="text" name="apellidoPaterno" class="form-control" value="<?php echo $usuario->getApellidoPaterno(); ?>" disabled />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoMaterno">Apellido Materno</label>
        <input type="text" name="apellidoMaterno" class="form-control" value="<?php echo $usuario->getApellidoMaterno(); ?>" disabled />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo" disabled>
          <option value="M" <?php echo $usuario->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?php echo $usuario->getSexo() == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?php echo $usuario->getSexo() == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información de ingreso</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre de usuario</label>
        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION["usuario"]; ?>" disabled />
      </div>

      <div data-mdb-input-init class="form-outline">
        <button class="btn btn-warning fw-bold w-100 d-flex gap-2 justify-content-center align-items-center disabled" type="button">
          <?php include(__DIR__."/../../components/icons/repeat.php") ?>
          Cambiar contraseña
        </button>
      </div>

      
      <h2 class="fw-bold mt-4 pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Telefono(s)</label>
        <?php
          if (count($usuario->getTelefonos()) == 0) echo "<p>Sin telefonos registrados.</p>";
          foreach ($usuario->getTelefonos() as $telefono) {
            echo "<input type='text' name='telefono' class='form-control mb-2' value='{$telefono}' disabled />";
          }
        ?>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Correo(s)</label>
        <?php
          if (count($usuario->getEmails()) == 0) echo "<p>Sin correos registrados.</p>";
          foreach ($usuario->getEmails() as $email) {
            echo "<input type='text' name='correo' class='form-control mb-2' value='{$email}' disabled />";
          }
        ?>
      </div>

      <?php
        if ($_SESSION["rol"] != "CLIENTE") {
          echo "<h2 class='fw-bold mt-4 pb-2 mb-3' style='border-bottom: 2px solid #fcbc73;'>Información del empleado</h2>";

          echo "<div data-mdb-input-init class='form-outline'>";
          echo "<label class='form-label fw-bold' for='fechaNac'>Fecha de Nacimiento</label>";
          echo "<input type='date' name='fechaNac' class='form-control' value='{$usuario->getFechaNac()}' disabled />";
          echo "</div>";

          echo "<div data-mdb-input-init class='form-outline'>";
          echo "<label class='form-label fw-bold' for='salario'>Salario</label>";
          echo '<div class="input-group mb-3">';
          echo '<span class="input-group-text" id="basic-addon1">$</span>';
          echo "<input type='number' name='salario' class='form-control' value='{$usuario->getSalario()}' disabled/>";
          echo '<span class="input-group-text" id="basic-addon1">MXN</span>';
          echo "</div></div>";

          echo '<div data-mdb-input-init class="form-outline">
            <label class="form-label fw-bold" for="estado">Estado</label>
            <select class="form-select" id="estado" aria-label="estado" name="estado" disabled>
              <option value="ACTIVO" '.($usuario->getEstado() == "ACTIVO" ? "selected" : "").'>Activo</option>
              <option value="INACTIVO" '.($usuario->getEstado() == "INACTIVO" ? "selected" : "").'>Inactivo</option>
            </select>
          </div>';
        }
      ?>

      <a class="fw-bold btn btn-outline-success mt-4" type="submit" href="/perfil/editar/">
        Editar
      </a>

    </form>
  </main>

  <?php require(__DIR__ . "/../../components/footer.php") ?>

  <script>
    function noEnviar (event) {
      event.preventDefault();
    }
  </script>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../../components/error.php") ?>
</body>

</html>