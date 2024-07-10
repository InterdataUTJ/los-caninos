<?php
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
?>

<!DOCTYPE html>
<html lang="es" class="h-100" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Los caninos</title>
  <link rel="shortcut icon" href="/images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container-fluid h-100">

  <main class="container-md h-100 d-flex justify-content-center align-items-center">
    <div class="card">
      <form class="row m-4" style="max-width: 1000px;" method="POST" action="/controllers/login.php">
        
        <h2 class="text-center pb-3">Iniciar Sesión</h2>
        <input type="hidden" name="resultado" value="<?php echo $num1 * $num2 ?>">
      
        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label fw-bold" for="username">Nombre de usuario</label>
          <input type="text" name="username" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label fw-bold" for="password">Contraseña</label>
          <input type="password" name="password" class="form-control" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label fw-bold" for="password">Validación</label>
          <p> <?php echo "$num1 × $num2" ?> </p>
          <input type="number" name="operacion" class="form-control" />
        </div>

        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Iniciar sesión</button>

        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <div class="text-center">
              <p>No tienes una cuenta? <a href="/singup/">Registrate</a></p>
            </div>
          </div>

          <div class="col text-center d-flex justify-content-center">
            <a href="#!">Olvidate la contraseña?</a>
          </div>
        </div>

      </form>
    </div>
  </main>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Los Caninos</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
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