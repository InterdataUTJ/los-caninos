<?php
// Middlewares
require_once(__DIR__ . "/../middlewares/session_start.php");
require_once(__DIR__ . "/../middlewares/session.php");

// Controlador
require_once(__DIR__ . "/../controllers/perfil/index.php");

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
  <link rel="stylesheet" href="/src/styles/panel/icons.css">
</head>

<body class="container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../components/header.php"); ?>

  <main class="container p-3">

    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Panel de Control</h2>

    <div class="d-flex gap-4 flex-wrap justify-content-evenly">
      <section style="width: 15rem;" class="card shadow d-flex flex-row p-3 gap-4 align-items-center">
        <img
          alt="avatar"
          class="mb-3 ms-3 h-50 rounded-circle"
          style="user-select: none; max-height: 100px"
          src="/src/images/avatar/<?php echo $usuario->getSexo(); ?>.svg">
        <article class="d-flex flex-column align-items-start">
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
        </article>
      </section>

      <section style="width: 15rem;" class="card shadow">
        <div class="card-body d-flex justify-content-center flex-column align-items-center">
          <p class="text-center fw-bold">Perfil</p>
          <article class="d-flex gap-3">
            <a href="/perfil/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Ver
            </a>
            <a href="/perfil/editar/" class="btn btn-success fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/new.php") ?>
              Editar
            </a>
          </article>
        </div>
      </section>
    </div>


    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Modulos</h2>

    <div class="d-flex flex-wrap gap-4 justify-content-evenly">

      <section style="width: 15rem;" class="card shadow text-center panel-module">
        <div class="card-body d-flex flex-column gap-2 align-items-center">
          <h5 class="card-title fw-bold">Mascotas</h5>
          <?php require(__DIR__ . "/../components/icons/dog.php"); ?>
          <a href="/mascotas/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
            <?php require(__DIR__ . "/../components/icons/eye.php") ?>
            Ver
          </a>
          <?php if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO"): ?>
            <a href="/mascotas/nuevo/" class="btn btn-success fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Nueva
            </a>
          <?php endif; ?>
        </div>
      </section>

      <section style="width: 15rem;" class="card shadow text-center panel-module">
        <div class="card-body d-flex flex-column gap-2 align-items-center">
          <h5 class="card-title fw-bold">Servicios</h5>
          <?php require(__DIR__ . "/../components/icons/heartbeat.php"); ?>
          <a href="/servicios/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
            <?php require(__DIR__ . "/../components/icons/eye.php") ?>
            Ver
          </a>
          <?php if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO"): ?>
            <a href="/servicios/nuevo/" class="btn btn-success fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Nuevo
            </a>
          <?php endif; ?>
        </div>
      </section>


      <?php if ($_SESSION["rol"] == "GERENTE" && $_SESSION["estado"] == "ACTIVO"): ?>
        <section style="width: 15rem;" class="card shadow text-center panel-module">
          <div class="card-body d-flex flex-column gap-2 align-items-center">
            <h5 class="card-title fw-bold">Empleados</h5>
            <?php require(__DIR__ . "/../components/icons/tie.php"); ?>
            <a href="/empleados/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Ver
            </a>
            <a href="/empleados/nuevo/" class="btn btn-success fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/new.php") ?>
              Nuevo
            </a>
          </div>
        </section>
      <?php endif; ?>


      <?php if ($_SESSION["rol"] != "CLIENTE" && $_SESSION["estado"] == "ACTIVO"): ?>
        <section style="width: 15rem;" class="card shadow text-center panel-module">
          <div class="card-body d-flex flex-column gap-2 align-items-center">
            <h5 class="card-title fw-bold">Clientes</h5>
            <?php require(__DIR__ . "/../components/icons/user.php"); ?>
            <a href="/clientes/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Ver
            </a>
            <a href="/clientes/nuevo/" class="btn btn-success fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/new.php") ?>
              Nuevo
            </a>
          </div>
        </section>
      <?php endif; ?>


      <?php if ($_SESSION["rol"] == "GERENTE" && $_SESSION["estado"] == "ACTIVO"): ?>
        <section style="width: 15rem;" class="card shadow text-center panel-module">
          <div class="card-body d-flex flex-column gap-2 align-items-center">
            <h5 class="card-title fw-bold">Reportes</h5>
            <?php require(__DIR__ . "/../components/icons/clipboard-data.php"); ?>
            <a href="/reportes/" class="btn btn-primary fw-bold mt-3 d-flex justify-content-center align-items-center gap-2">
              <?php require(__DIR__ . "/../components/icons/eye.php") ?>
              Ver
            </a>
          </div>
        </section>
      <?php endif; ?>
    </div>

  </main>

  <?php require(__DIR__ . "/../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>