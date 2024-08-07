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
</head>

<body class="container-fluid m-0 p-0">
  <?php require(__DIR__ . "/../components/header.php"); ?>

  <main class="container p-3">
    
    <h2 class="fw-bold pb-2 mb-3" style="border-bottom: 2px solid #fcbc73;">Panel de Control</h2>

    <div class="d-flex flex-row gap-4">
      <section style="width: 18rem;" class="card shadow d-flex flex-row p-3 gap-4 align-items-center">
        <img 
          alt="avatar"
          class="mb-3 ms-3 h-50 rounded-circle" 
          style="user-select: none; max-height: 100px" 
          src="/src/images/avatar/<?php echo $usuario->getSexo(); ?>.svg"
        >
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

      <section style="width: 18rem;" class="card shadow">
            <div class="card-body d-flex justify-content-center flex-column align-items-center">
              <p class="text-center fw-bold">Perfil</p>
              <article class="d-flex gap-3">
                <a href="/perfil/" class="btn btn-primary fw-bold">Ver</a>
                <a href="/perfil/editar/" class="btn btn-success fw-bold">Editar</a>
              </article>
            </div>
      </section>
    </div>
    

    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Servicios</h2>
    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Mascotas</h2>
    <a href="/mascotas/">Ver</a>
    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Empleados</h2>
    <a href="/empleados/">Ver</a>
    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Clientes</h2>
    <h2 class="fw-bold pb-2 my-4" style="border-bottom: 2px solid #fcbc73;">Reportes</h2>

  </main>

  <?php require(__DIR__ . "/../components/footer.php") ?>

  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  
</body>

</html>