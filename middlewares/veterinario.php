<?php

function noSession() {
  header("Location: /login/?error=Debes de iniciar sesión.", true, 301);
  exit();
}

function notAllowed() {
  http_response_code(403);
  require_once(__DIR__."/../views/error/403.php");
  exit();
}

if (session_status() != PHP_SESSION_ACTIVE) require_once(__DIR__ . "/session_start.php");
if (!isset($_SESSION)) noSession();
if (!isset($_SESSION["usuario"])) noSession();
if (!isset($_SESSION["rol"])) noSession();
if (!isset($_SESSION["estado"])) noSession();
if ($_SESSION["rol"] == "CLIENTE") notAllowed();
if ($_SESSION["estado"] != "ACTIVO") notAllowed();

?>