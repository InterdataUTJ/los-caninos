<?php

session_start();
require_once(__DIR__ . "/../../models/perfil/empleado.php");
require_once(__DIR__ . "/../../models/perfil/cliente.php");

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


if (isset($_POST["contrasena"]) && isset($_POST["nuevaContrasena"])) {
    if ($_POST["contrasena"] == $_SESSION["nuevaContrasena"]) {
        echo "Igual";
        exit();
    }

    require_once(__DIR__ . "/../../models/usuario.php");
    $usuario = new Usuario();
    if (!$usuario->cambiarPassword($_POST["contrasena"], $_POST["nuevaContrasena"])) {
        echo "Error";
        exit();
    }

    echo "Exito";
    exit();
}


$usuario = new Cliente();
if ($_SESSION["rol"] != "CLIENTE") $usuario = new Empleado();
$usuario->cargar($_SESSION["idRegistro"]);

if (isset($_POST["nombre"])) $usuario->setNombre($_POST["nombre"]);
if (isset($_POST["apellidoPaterno"])) $usuario->setApellidoPaterno($_POST["apellidoPaterno"]);
if (isset($_POST["apellidoMaterno"])) $usuario->setApellidoMaterno($_POST["apellidoMaterno"]);
if (isset($_POST["apellidoMaterno"]) && $_POST["apellidoMaterno"] == '') $usuario->setApellidoMaterno(null);
if (isset($_POST["sexo"])) $usuario->setSexo($_POST["sexo"]);

if (isset($_POST["fechaNac"]) && $_SESSION["rol"] != "CLIENTE") {
    $usuario->setFechaNac($_POST["fechaNac"]);
}

$telefonos = [];
$emails = [];

if (isset($_POST["telefono"])) $telefonos = $_POST["telefono"];
if (isset($_POST["email"])) $emails = $_POST["email"];

$usuario->actualizar($_SESSION["idUsuario"], $_SESSION["idRegistro"], $telefonos, $emails);
header("Location: /perfil/?error=Datos actualizados");
exit();

?>