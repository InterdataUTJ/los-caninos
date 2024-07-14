<?php
if (session_status() != PHP_SESSION_ACTIVE) session_start();

function isActive(...$paths) {
  $current = strtok($_SERVER['REQUEST_URI'], "?");
  foreach ($paths as $path) {
    if ($current == $path) return "active";
  }
  return "";
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style="background-color: #fcbc73 !important;">
  <div class="container-fluid">
    <a class="navbar-brand d-flex gap-2 fw-bold" href="/">
      <img src="/src/images/logo.svg" alt="logo" width="30px">
      Los caninos
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" >
          <a class="nav-link <?php echo isActive("/") ?>" aria-current="page" href="/">Inicio</a>
        </li>

        <?php
            if (isset($_SESSION["usuario"])) {
              echo '<li class="nav-item"><a class="nav-link '.isActive("/panel/").'" aria-current="page" href="/panel/">Panel</a></li>';
            }
          ?>

        <li class="nav-item dropdown">
          <a class='nav-link dropdown-toggle <?php echo isActive("/perfil/", "/perfil/editar/") ?>' href="#" role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Mi cuenta
          </a>
          <ul class="dropdown-menu">
            <?php
              if (isset($_SESSION["usuario"])) {
                echo '<li><a class="dropdown-item" href="/perfil/">Ver perfil</a></li>';
                echo '<li><a class="dropdown-item" href="/logout/">Cerrar sesión</a></li>';
              } else {
                echo '<li><a class="dropdown-item" href="/login/">Iniciar Sesión</a></li>';
                echo '<li><a class="dropdown-item" href="/singup/">Crear cuenta</a></li>';
              }
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>