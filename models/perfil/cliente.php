<?php

require_once(__DIR__ . "/../db.php");
require_once(__DIR__ . "/persona.php");

class Cliente extends Persona {

  public function cargar($idCliente) {
    $resultado = DB::query("SELECT * FROM cliente WHERE idCliente = ?;", $idCliente);
    if (count($resultado) != 1) return false;
    if (count($resultado[0]) != 6) return false;
    if (!isset($resultado[0]["idCliente"])) return false;

    $this->setNombre($resultado[0]["nombres"]);
    $this->setApellidoPaterno($resultado[0]["apellidoPaterno"]);
    $this->setApellidoMaterno($resultado[0]["apellidoMaterno"]);
    $this->setSexo($resultado[0]["sexo"]);
    
    if (!$this->setTelefonos($resultado[0]["idUsuario"])) return false;
    if (!$this->setEmails($resultado[0]["idUsuario"])) return false;
    return true;
  }

  public function actualizar($idUsuario, $idCliente, $telefonos = null, $emails = null) {
    DB::query(
      "UPDATE cliente SET nombres = ?, apellidoPaterno = ?, apellidoMaterno = ?, sexo = ? WHERE idCliente = ?;", 
      $this->nombre, 
      $this->apellidoPaterno, 
      $this->apellidoMaterno, 
      $this->sexo, 
      $idCliente
    );

    if (!is_null($telefonos)) $this->actualizarTelefonos($idUsuario, $telefonos);
    if (!is_null($emails)) $this->actualizarEmails($idUsuario, $emails);
  }

}

?>