<?php
require_once(__DIR__ . "/dbConnection.php");

class Usuario {
  public $id = NULL;
  public $nombreUsuario = NULL;
  public $rol = NULL;

  function __login($nombreUsuario, $password) {
    $sentencia = $mysql_conn->prepare("CALL verificar_usuario(?, ?);");
    $sentencia->bind_param("ss", $usr_username, $usr_password);
    $sentencia->execute();
  
    $sentencia->store_result();
    $sentencia->bind_result($login_estado, $login_id, $login_rol);
    $sentencia->fetch();
    
    if (boolval($login_estado)) {
      $this->id = $login_id;
      $this->nombreUsuario = $nombreUsuario;
      $this->rol = $login_rol;
    }

    return boolval($login_estado);
  }
}
?>