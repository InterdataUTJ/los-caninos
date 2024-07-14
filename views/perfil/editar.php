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
  
  <script src="/src/scripts/validaciones.js"></script>
  <script src="/src/scripts/perfil/enviar.js" defer></script>
  <script src="/src/scripts/perfil/campos.js" defer></script>
</head>

<body class="d-flex flex-column container-fluid m-0 p-0">

  <?php require(__DIR__ . "/../../components/header.php") ?>

  <main class="container flex-grow-1 d-flex h-100 mx-auto p-3 gap-3" style="max-width: 1000px;">

    <section class="w-25 d-flex flex-column rounded p-3 shadow card-resume-container">
      <img class="mb-3 w-75 mx-auto rounded-circle" style="user-select: none; max-width: 500px" src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png" alt="">
      <section>
        <p class="m-0 text-center fw-bold">
          <?php echo "{$usuario->nombre} {$usuario->apellidoPaterno} {$usuario->apellidoMaterno}"; ?>
        </p>
        <?php
          if ($_SESSION["rol"] != "CLIENTE") {
            echo '<p class="m-0 text-center">';
            $fechaNac = new DateTime($usuario->fechaNac);
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

    <form class="flex-grow-1 d-flex flex-column gap-3 p-3" onsubmit="enviarDatos(event);">
      <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Información Personal</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre</label>
        <input type="text" name="username" class="form-control" value="<?php echo $usuario->nombre; ?>"/>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoPaterno">Apellido Paterno</label>
        <input type="text" name="apellidoPaterno" class="form-control" value="<?php echo $usuario->apellidoPaterno; ?>"/>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="apellidoMaterno">Apellido Materno</label>
        <input type="text" name="apellidoMaterno" class="form-control" value="<?php echo $usuario->apellidoMaterno; ?>"/>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="sexo">Sexo</label>
        <select class="form-select" id="sexo" aria-label="sexo" name="sexo">
          <option value="M" <?php echo $usuario->sexo == "M" ? "selected" : ""; ?>>Masculino</option>
          <option value="F" <?php echo $usuario->sexo == "F" ? "selected" : ""; ?>>Femenino</option>
          <option value="O" <?php echo $usuario->sexo == "O" ? "selected" : ""; ?>>Otro</option>
        </select>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre de usuario</label>
        <div class="input-group mb-3">
          <input value="<?php echo $_SESSION["usuario"]; ?>" type="text" class="form-control" placeholder="Nombre de usuario">
          <button class="btn btn-outline-warning fw-bold" type="button">Cambiar</button>
        </div>
      </div>

      
      <h2 class="fw-bold mt-4 pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Contacto</h2>

      <div data-mdb-input-init class="form-outline" id="container-phone">
        <label class="form-label fw-bold" for="username">Telefono(s)</label>
        <?php
          foreach ($usuario->telefonos as $telefono) {
            echo '<div class="input-group mb-3" id="'.$telefono.'-phone-id">';
            echo '<input value="'.$telefono.'" type="text" class="form-control" placeholder="Telefono">';
            echo '<button class="btn btn-outline-danger" type="button" onclick="removeTelefono(\''.$telefono.'-phone-id\');">';
            require(__DIR__ . "/../../components/icons/trash.php");
            echo '</button></div>';
          }
        ?>
        <button id="new-phone" onclick="nuevoTelefono();" type="button" class="mb-4 fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
          <?php require(__DIR__."/../../components/icons/new.php") ?>
          Nuevo
        </button>
      </div>

      <div data-mdb-input-init class="form-outline mb-3">
        <label class="form-label fw-bold" for="username">Correo(s)</label>
        <?php
          foreach ($usuario->correos as $correo) {
            
            echo '<div class="input-group mb-3">';
            echo '<input value="'.$correo.'" type="text" class="form-control" placeholder="Correo">';
            echo '<button class="btn btn-outline-danger" type="button">';
            require(__DIR__ . "/../../components/icons/trash.php");
            echo '</button></div>';
          }
        ?>
        <button type="button" class="fw-bold btn btn-primary w-100 d-flex gap-2 justify-content-center align-items-center">
          <?php require(__DIR__."/../../components/icons/new.php") ?>
          Nuevo
        </button>
      </div>

      <?php
        if ($_SESSION["rol"] != "CLIENTE") {
          echo "<h2 class='fw-bold mt-4 pb-2 mb-3' style='border-bottom: 2px solid #fcbc73;'>Información del empleado</h2>";

          echo "<div data-mdb-input-init class='form-outline'>";
          echo "<label class='form-label fw-bold' for='fechaNac'>Fecha de Nacimiento</label>";
          echo "<input type='date' name='fechaNac' class='form-control' value='{$usuario->fechaNac}'/>";
          echo "</div>";

          echo "<div data-mdb-input-init class='form-outline'>";
          echo "<label class='form-label fw-bold' for='salario'>Salario</label>";
          echo '<div class="input-group mb-3">';
          echo '<span class="input-group-text" id="basic-addon1">$</span>';
          echo "<input type='number' name='salario' class='form-control' value='{$usuario->salario}' disabled/> ";
          echo '<span class="input-group-text" id="basic-addon1">MXN</span>';
          echo "</div></div>";

          echo '<div data-mdb-input-init class="form-outline">
            <label class="form-label fw-bold" for="estado">Estado</label>
            <select class="form-select" id="estado" aria-label="estado" name="estado" disabled>
              <option value="ACTIVO" '.($usuario->estado == "ACTIVO" ? "selected" : "").'>Activo</option>
              <option value="INACTIVO" '.($usuario->estado == "INACTIVO" ? "selected" : "").'>Inactivo</option>
            </select>
          </div>';
        }
      ?>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>