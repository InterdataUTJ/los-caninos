<?php
session_start();
require_once(__DIR__ . "/../models/usuario.php");

function error($msg) {
    header("Location: /singup/?error=$msg", true, 301);
    die();
  }
  
if ($_SERVER["REQUEST_METHOD"] != "POST") error("Error, intenta de nuevo!");

$usr_nombre = htmlspecialchars($_POST['nombre']);
$usr_apellidoPaterno = htmlspecialchars($_POST['apellidoPaterno']);
$usr_apellidoMaterno = htmlspecialchars($_POST['apellidoMaterno']);
$usr_sexo = htmlspecialchars($_POST['sexo']);
$usr_username = htmlspecialchars($_POST['username']);
$usr_password = htmlspecialchars($_POST['password']);
$usr_rpassword = htmlspecialchars($_POST['rpassword']);
$usr_operacion = htmlspecialchars($_POST['operacion']);
$usr_resultado = htmlspecialchars($_POST['resultado']);

if (!isset($usr_nombre)) error("Credenciales incorrectas!");
if (!isset($usr_apellidoPaterno)) error("Credenciales incorrectas!");
if (!isset($usr_apellidoMaterno)) error("Credenciales incorrectas!");
if (!isset($usr_sexo)) error("Credenciales incorrectas!");
if (!isset($usr_username)) error("Credenciales incorrectas!");
if (!isset($usr_password)) error("Credenciales incorrectas!");
if (!isset($usr_rpassword)) error("Credenciales incorrectas!");
if (!isset($usr_operacion)) error("Validacion Incorrecta!");
if (!isset($usr_resultado)) error("Validacion Incorrecta!");
if ($usr_operacion != $usr_resultado) error("Validacion Incorrecta!");
if ($usr_password != $usr_rpassword) error("Las contraseñas deben de coincidir!");
if ($usr_apellidoMaterno == '') $usr_apellidoMaterno = null;

$usuario = new Usuario();
$login_state = $usuario->singup($usr_nombre, $usr_apellidoPaterno, $usr_apellidoMaterno, $usr_sexo, $usr_username, $usr_password);
if (!$login_state) error("Error, el nombre de usuario ya existe!");

$_SESSION["usuario"] = $usuario->nombreUsuario;
$_SESSION["rol"] = $usuario->rol;
$_SESSION["idUsuario"] = $usuario->idUsuario;
$_SESSION["idRegistro"] = $usuario->idRegistro;
header("Location: /", true, 301);