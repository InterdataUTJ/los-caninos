<?php
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="shortcut icon" href="/src/images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/src/styles/button.css">
</head>

<body class="container-fluid h-100 p-0 d-flex flex-column">
  
  <?php require(__DIR__ . "/../components/header.php"); ?>

  <main class="container-md flex-grow-1 d-flex justify-content-center">
    <form class="d-flex flex-column w-100 gap-4 m-4" style="max-width: 1000px;" method="POST" action="/controllers/login.php">

      <h2 class="text-center pb-3 fw-bold">Iniciar Sesión</h2>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="username">Nombre de usuario</label>
        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" />
      </div>

      <div data-mdb-input-init class="form-outline">
        <label class="form-label fw-bold" for="operacion">Validación</label>
        <div class="input-group">
          <span class="input-group-text"><?php echo "$num1 × $num2" ?></span>
          <input type="number" name="operacion" class="form-control" placeholder="Validación" />
          <input type="hidden" name="resultado" value="<?php echo $num1 * $num2 ?>">
        </div>
      </div>

      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-orange-primary btn-block">Iniciar sesión</button>

      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="text-center">
            <p>No tienes una cuenta? <a href="/singup/">Registrate</a></p>
          </div>
        </div>

        <div class="col text-center d-flex justify-content-center">
          <a href="#">Olvidate la contraseña?</a>
        </div>
      </div>

    </form>
  </main>

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" style="background-color: #fcbc73 !important;">
        <strong class="me-auto">Los Caninos</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body fw-medium">
        <?php if (isset($_GET["error"])) echo htmlspecialchars($_GET["error"]) ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <?php
  if (isset($_GET["error"])) echo "<script>bootstrap.Toast.getOrCreateInstance(document.getElementById('liveToast')).show()</script>";
  ?>
</body>

</html>