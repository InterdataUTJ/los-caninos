<?php
session_start();
require_once(__DIR__ . "/../models/usuario.php");

function error($msg) {
    header("Location: /login/?error=$msg", true, 301);
    die();
  }
  
if ($_SERVER["REQUEST_METHOD"] != "POST") error("¡Error, intenta de nuevo!");

$usr_username = htmlspecialchars($_POST['username']);
$usr_password = htmlspecialchars($_POST['password']);
$usr_operacion = htmlspecialchars($_POST['operacion']);
$usr_resultado = $_SESSION["resultadoOperacionValidacion"];

if (!isset($usr_username)) error("¡Credenciales incorrectas!");
if (!isset($usr_password)) error("¡Credenciales incorrectas!");
if (!isset($usr_operacion)) error("Validación incorrecta!");
if (!isset($usr_resultado)) error("Validación incorrecta!");
if ($usr_operacion != $usr_resultado) error("Validación incorrecta!");

$usuario = new Usuario();
$login_state = $usuario->login($usr_username, $usr_password);
if (!$login_state) error("¡Credenciales incorrectas!");

$_SESSION["usuario"] = $usuario->nombreUsuario;
$_SESSION["rol"] = $usuario->rol;
$_SESSION["idUsuario"] = $usuario->idUsuario;
$_SESSION["idRegistro"] = $usuario->idRegistro;
$_SESSION["estado"] = $usuario->estado;
header("Location: /", true, 301);