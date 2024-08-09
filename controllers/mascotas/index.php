<?php

if (session_status() != PHP_SESSION_ACTIVE) session_start();
require_once(__DIR__ . "/../../models/mascotas/index.php");

$mascotas = new Mascotas();

$mascotasFiltrado = array_filter($mascotas->getMascotas(), function($mascota) {
  return in_array($mascota->getTamano(), $_GET["filterTamano"]) &&
         in_array($mascota->getSexo(), $_GET["filterSexo"]);
});

return $mascotasFiltrado;

?>