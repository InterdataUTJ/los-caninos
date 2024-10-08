<?php
require_once(__DIR__ . "/db.php");

class Usuario {
  public $idUsuario;
  public $idRegistro;
  public $nombreUsuario;
  public $rol;
  public $estado;

  public function login($usr_username, $usr_password) {
    $resultado = DB::query("CALL verificar_usuario(?, ?);", $usr_username, $usr_password);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 3) return false;
    if (!isset($resultado[0]["rol"])) return false;

    $this->idUsuario = $resultado[0]["idUsuario"];
    $this->idRegistro = $resultado[0]["idRegistro"];
    $this->rol = $resultado[0]["rol"];
    $this->nombreUsuario = $usr_username;

    if ($this->rol == "CLIENTE") $this->estado = "ACTIVO";
    else {
      $resultado = DB::query("SELECT estado FROM empleado WHERE idEmpleado = ?", $this->idRegistro);
      if (count($resultado) != 1) return false;
      if (!isset($resultado[0])) return false;
      if (!isset($resultado[0]["estado"])) return false;
      $this->estado = $resultado[0]["estado"];
    }

    return true;
  }

  public function singup($nombre, $apellidoP, $apellidoM, $sexo, $usuario, $contrasena) {
    $resultado = DB::query("CALL usuario_disponible(?);", $usuario);
    echo var_dump($resultado);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 1) return false;
    if (!isset($resultado[0]["disponible"])) return false;
    if (!boolval($resultado)) return false;

    DB::query(
      "CALL nuevo_usuario(?, ?, ?, ?, ?, ?);", 
      $nombre, $apellidoP, $apellidoM, 
      $sexo, $usuario, $contrasena
    );

    return $this->login($usuario, $contrasena);
  }

  public function cambiarUsername($nuevoNombreUsuario) {
    if (!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])) {
      return false;
    }

    DB::query(
      "UPDATE usuario SET nombreUsuario = ? WHERE idUsuario = ? AND nombreUsuario = ?;",
      $nuevoNombreUsuario, $_SESSION["idUsuario"], $_SESSION["usuario"]
    );

    return true;
  }


  public function cambiarPassword($contrasena, $nuevaContrasena) {
    if (!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])) {
      return false;
    }

    $resultado = DB::query("CALL cambiar_contrasena(?, ?, ?);", $_SESSION["idUsuario"], $contrasena, $nuevaContrasena);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 1) return false;
    if (!isset($resultado[0]["resultado"])) return false;
    return boolval($resultado[0]["resultado"]);
  }
}
?>