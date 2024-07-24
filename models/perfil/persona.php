<?php

require_once(__DIR__ . "/../db.php");

class Persona {
  protected $nombre = "";
  protected $apellidoPaterno = "";
  protected $apellidoMaterno = "";
  protected $sexo = "";
  protected $telefonos = [];
  protected $emails = [];

  public function getNombre() { return $this->nombre; }
  public function getApellidoPaterno() { return $this->apellidoPaterno; }
  public function getApellidoMaterno() { return $this->apellidoMaterno; }
  public function getSexo() { return $this->sexo; }
  public function getTelefonos() { return $this->telefonos; }
  public function getEmails() { return $this->emails; }

  public function setNombre($nombre) { $this->nombre = $nombre; }
  public function setApellidoPaterno($apellidoPaterno) { $this->apellidoPaterno = $apellidoPaterno; }
  public function setApellidoMaterno($apellidoMaterno) { $this->apellidoMaterno = $apellidoMaterno; }
  public function setSexo($sexo) { $this->sexo = $sexo; }

  protected function setTelefonos($idUsuario) {
    $resultado = DB::query("SELECT telefono FROM telefono WHERE idUsuario = ?;", $idUsuario);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $telefono) {
      if (!isset($telefono["telefono"])) return false;
      $this->telefonos[] = $telefono["telefono"];
    }
    return true;
  }

  protected function setEmails($idUsuario) {
    $resultado = DB::query("SELECT email FROM email WHERE idUsuario = ?;", $idUsuario);
    if (count($resultado) == 0) return true;

    foreach ($resultado as $email) {
      if (!isset($email["email"])) return false;
      $this->emails[] = $email["email"];
    }
    return true;
  }


  protected function actualizarTelefonos($idUsuario, $telefonos) {
    $toDelete = array_diff($this->telefonos, $telefonos);
    $toAdd = array_diff($telefonos, $this->telefonos);

    foreach ($toDelete as $telefono) {
      DB::query(
        "DELETE FROM telefono WHERE idUsuario = ? AND telefono = ?;",
        $idUsuario,
        $telefono
      );
    }

    foreach ($toAdd as $telefono) {
      DB::query(
        "INSERT INTO telefono (idUsuario, telefono) VALUES (?, ?);",
        $idUsuario,
        $telefono
      );
    }
  }

  protected function actualizarEmails($idUsuario, $emails) {
    $toDelete = array_diff($this->emails, $emails);
    $toAdd = array_diff($emails, $this->emails);

    foreach ($toDelete as $email) {
      DB::query(
        "DELETE FROM email WHERE idUsuario = ? AND email = ?;",
        $idUsuario,
        $emails
      );
    }

    foreach ($toAdd as $email) {
      DB::query(
        "INSERT INTO email (idUsuario, email) VALUES (?, ?);",
        $idUsuario,
        $emails
      );
    }
  }
}

?>