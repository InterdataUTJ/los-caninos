<?php

function noSession() {
  header("Location: /login/", true, 301);
  exit();
}

if (session_status() != PHP_SESSION_ACTIVE) noSession();
if (!isset($_SESSION)) noSession();
if (!isset($_SESSION["usuario"])) noSession();
if (!isset($_SESSION["rol"])) noSession();

?>