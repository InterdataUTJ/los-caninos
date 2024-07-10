<?php
require_once(__DIR__ . "/dbConnection.php");

class Usuario {
  public $id;
  public $nombreUsuario;
  public $rol;

  function login($usr_username, $usr_password) {
    $resultado = DB::query("CALL verificar_usuario(?, ?);", $usr_username, $usr_password);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 2) return false;
    if (!isset($resultado[0]["rol"])) return false;

    $this->id = 0;
    $this->rol = $resultado[0]["rol"];
    $this->nombreUsuario = $usr_username;
    return true;
  }
}
?>