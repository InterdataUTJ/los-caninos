<?php

// Verificar los valores de los filtros
if (!isset($_GET["filterSexo"])) $_GET["filterSexo"] = "M,F,O";

// Convertir los valores de los filtros en arreglos
$_GET["filterSexo"] = explode(",", $_GET["filterSexo"]);

?>