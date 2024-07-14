<?php

session_start();
require_once(__DIR__ . "/../../models/perfil/index.php");
require_once(__DIR__ . "/../../models/perfil/index.cliente.php");

if (!isset($_SESSION["usuario"])) {
    header("Location: /");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /perfil/editar/?error=Ocurrio un error al enviar los datos");
    exit();
}

if (isset($_POST["username"])) {
    if ($_POST["username"] == $_SESSION["usuario"]) {
        echo "Igual";
        exit();
    }

    require_once(__DIR__ . "/../../models/usuario.php");
    $usuario = new Usuario();
    if (!$usuario->cambiarUsername($_POST["username"])) {
        echo "Error";
        exit();
    }

    $_SESSION["usuario"] = $_POST["username"];
    echo "Exito";
    exit();
}

$usuario = new Cliente();
if ($_SESSION["rol"] != "CLIENTE") $usuario = new Empleado();
$usuario->cargar($_SESSION["idRegistro"]);

if (isset($_POST["nombre"])) $usuario->nombre = $_POST["nombre"];
if (isset($_POST["apellidoPaterno"])) $usuario->apellidoPaterno = $_POST["apellidoPaterno"];
if (isset($_POST["apellidoMaterno"])) $usuario->apellidoMaterno = $_POST["apellidoMaterno"];
if (isset($_POST["apellidoMaterno"]) && $_POST["apellidoMaterno"] == '') $usuario->apellidoMaterno = null;
if (isset($_POST["sexo"])) $usuario->sexo = $_POST["sexo"];

if (isset($_POST["fechaNac"]) && $_SESSION["rol"] != "CLIENTE") {
    $usuario->fechaNac = $_POST["fechaNac"];
}

$telefonos = [];
$correos = [];

if (isset($_POST["telefono"])) $telefonos = $_POST["telefono"];
if (isset($_POST["email"])) $correos = $_POST["email"];

$usuario->actualizar($_SESSION["idRegistro"], $telefonos, $correos);
header("Location: /perfil/?error=Datos actualizados");
exit();

?>