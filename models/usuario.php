<?php
require_once(__DIR__ . "/dbConnection.php");
global $mysql_conn;

class Usuario {
  public $id = NULL;
  public $nombreUsuario = NULL;
  public $rol = NULL;

  function __login($usr_username, $usr_password) {
    global $mysql_conn;
    $login_estado = NULL;
    $login_id = NULL;
    $login_rol = NULL;
    
    // Ignore
    $sentencia = $mysql_conn->prepare("CALL verificar_usuario(?, ?);");
    $sentencia->bind_param("ss", $usr_username, $usr_password);
    $sentencia->execute();
  
    $sentencia->store_result();
    $sentencia->bind_result($login_estado, $login_id, $login_rol);
    $sentencia->fetch();
    
    if (boolval($login_estado)) {
      $this->id = $login_id;
      $this->nombreUsuario = $usr_username;
      $this->rol = $login_rol;
    }

    return boolval($login_estado);
  }
}
?>