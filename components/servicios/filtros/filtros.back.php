<?php

// Verificar los valores de los filtros
if (!isset($_GET["filterDescuento"])) $_GET["filterDescuento"] = "0,15,25";
if (!isset($_GET["filterTipo"])) $_GET["filterTipo"] = "CONSULTA,VACUNA,DESPARASITACION,CIRUGIA,ESTETICA,ESTADIA";
if (!isset($_GET["filterEstatus"])) $_GET["filterEstatus"] = "COMPLETADO,EN PROCESO";

// Convertir los valores de los filtros en arreglos
$_GET["filterDescuento"] = explode(",", $_GET["filterDescuento"]);
$_GET["filterTipo"] = explode(",", $_GET["filterTipo"]);
$_GET["filterEstatus"] = explode(",", $_GET["filterEstatus"]);

?>