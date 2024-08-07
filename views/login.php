<?php

require_once(__DIR__ . "/../middlewares/session_start.php");

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$_SESSION["resultadoOperacionValidacion"] = $num1 * $num2;

?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link rel="stylesheet" href="/src/styles/index.css">
  <link rel="stylesheet" href="/src/styles/button.css">
  <link rel="stylesheet" href="/src/styles/login.css">

  <script src="/src/scripts/password.js" defer></script>
</head>

<body class="container-fluid h-100 p-0 d-flex">

  <main style="flex: 1;" class="p-5 container-md d-flex justify-content-center overflow-y-auto">
    <form class="d-flex flex-column w-100 gap-4 m-4" style="max-width: 1000px;" method="POST" action="/controllers/login/">

      <h2 class="text-center pb-3 fw-bold">Iniciar Sesión</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre de usuario</label>
        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="password">Contraseña</label>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña" />
          <button type="button" class="btn btn-orange-primary password-toggle"><?php include(__DIR__."/../components/icons/eye.php"); ?></button>
        </div>
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="operacion">Validación</label>
        <div class="input-group">
          <span class="input-group-text"><?php echo "$num1 × $num2" ?></span>
          <input type="number" name="operacion" class="form-control" placeholder="Validación" />
        </div>
      </div>

      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-orange-primary btn-block">Iniciar sesión</button>

      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="text-center">
            <p>No tienes una cuenta? <a class="custom-a-link" href="/singup/">Registrate</a></p>
          </div>
        </div>
      </div>

    </form>
  </main>

  <section style="flex: 1;" class="d-flex form-header">
    <svg preserveAspectRatio="none" style="height: 100%; width: 100px;" id="svg" viewBox="0 0 390 1440" class="transition duration-300 ease-in-out delay-150" xmlns="http://www.w3.org/2000/svg">
      <defs />
      <path d="M -512.167 902.167 L -512.167 577.167 C -450.829 574.241 -389.49 571.316 -298.167 577.167 C -206.844 583.018 -85.536 597.646 0.833 590.167 C 87.202 582.688 138.633 553.1 200.833 557.167 C 263.033 561.234 336.002 598.954 428.833 596.167 C 521.664 593.38 634.356 550.085 720.833 540.167 C 807.31 530.249 867.571 553.708 927.833 577.167 L 927.833 902.167 L -512.167 902.167 Z" stroke="none" stroke-width="0" fill="#fcbc73" fill-opacity="0.4" class="transition-all duration-300 ease-in-out delay-150 path-0" style="transform-box: fill-box; transform-origin: 50% 50%;" transform="matrix(0, -1, 1, 0, 0.000036, -0.00005)" />
      <path d="M -459.013 849.013 L -459.013 624.013 C -396.559 607.128 -334.105 590.243 -256.013 591.013 C -177.92 591.782 -84.189 610.205 5.987 621.013 C 96.164 631.82 182.787 635.013 271.987 631.013 C 361.187 627.013 452.964 615.82 520.987 620.013 C 589.011 624.205 633.28 643.782 705.987 647.013 C 778.695 650.243 879.841 637.128 980.987 624.013 L 980.987 849.013 L -459.013 849.013 Z" stroke="none" stroke-width="0" fill="#fcbc73" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-1" style="transform-box: fill-box; transform-origin: 50% 50%;" transform="matrix(0, -1, 1, 0, -0.000024, 0.000023)" />
      <path d="M -412.405 802.405 L -412.405 677.405 C -331.341 673.779 -250.276 670.153 -170.405 676.405 C -90.533 682.656 -11.853 698.784 63.595 691.405 C 139.044 684.025 211.262 653.138 285.595 642.405 C 359.929 631.671 436.377 641.092 514.595 649.405 C 592.813 657.717 672.801 664.923 758.595 669.405 C 844.39 673.887 935.993 675.646 1027.595 677.405 L 1027.595 802.405 L -412.405 802.405 Z" stroke="none" stroke-width="0" fill="#fcbc73" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-2" style="transform-box: fill-box; transform-origin: 50% 50%;" transform="matrix(0, -1, 1, 0, -0.000007, 0.000011)" />
    </svg>
    <a href="/" style="color: black; background-color: #fcbc73; flex: 1;" class="text-decoration-none d-flex gap-3 flex-column justify-content-center align-items-center form-background-header">
      <h1 class="fw-bold text-center form-header-title">Veterinaria: Los caninos</h1>
      <img src="/src/images/logo.svg" style="width: 60%; max-width: 200px;" alt="logo">
    </a>
  </section>


  <script src="/src/bootstrap/bootstrap.bundle.min.js"></script>
  <?php require_once(__DIR__ . "/../components/error.php") ?>
</body>

</html>