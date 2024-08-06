<?php

function noSession() {
  header("Location: /login/", true, 301);
  exit();
}

function notAllowed() {
  http_response_code(403);
  exit();
}

if (session_status() != PHP_SESSION_ACTIVE) noSession();
if (!isset($_SESSION)) noSession();
if (!isset($_SESSION["usuario"])) noSession();
if (!isset($_SESSION["rol"])) noSession();
if ($_SESSION["rol"] != "GERENTE") notAllowed();

?>