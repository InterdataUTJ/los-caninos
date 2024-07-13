<?php

function isLoged() {
  if (session_status() == PHP_SESSION_DISABLED) return false;
  if (!isset($_SESSION)) return false;
  if (!isset($_SESSION["usuario"])) return false;
  if (!isset($_SESSION["rol"])) return false;
  return true;
}

?>