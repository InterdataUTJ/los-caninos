<?php
function tryLogin($usr_username, $usr_password) {
    include(__DIR__ . "/../utils/dbConnection.php");
    
    $sentencia = $mysql_conn->prepare("SELECT verificarCredenciales(?, ?) AS login;");
    $sentencia->bind_param("ss", $usr_username, $usr_password);
    $sentencia->execute();

    $sentencia->store_result();
    $sentencia->bind_result($login_estado);
    $sentencia->fetch();
    return boolval($login_estado);
}
?>