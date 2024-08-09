<?php

function noSession() {
  header("Location: /login/?error=Debes de iniciar sesión.", true, 301);
  exit();
}

if (session_status() != PHP_SESSION_ACTIVE) require_once(__DIR__ . "/session_start.php");
if (!isset($_SESSION)) noSession();
if (!isset($_SESSION["usuario"])) noSession();
if (!isset($_SESSION["rol"])) noSession();
if (!isset($_SESSION["estado"])) noSession();

?>