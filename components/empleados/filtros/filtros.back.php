<?php

// Verificar los valores de los filtros
if (!isset($_GET["filterEstado"])) $_GET["filterEstado"] = "ACTIVO,INACTIVO";
if (!isset($_GET["filterRol"])) $_GET["filterRol"] = "GERENTE,VETERINARIO";
if (!isset($_GET["filterSexo"])) $_GET["filterSexo"] = "M,F,O";

// Convertir los valores de los filtros en arreglos
$_GET["filterEstado"] = explode(",", $_GET["filterEstado"]);
$_GET["filterRol"] = explode(",", $_GET["filterRol"]);
$_GET["filterSexo"] = explode(",", $_GET["filterSexo"]);

?>