<?php

require_once(__DIR__."/db.php");

class Contacto {
    protected $idUsuario;
    protected $nombreUsuario;
    protected $rol;
    protected $emails = [];
    protected $telefonos = [];

    public function setIdUsuario($_idUsuario) { $this->idUsuario = $_idUsuario; }
    public function setNombreUsuario($nombreUsuario) { $this->nombreUsuario = $nombreUsuario; }
    public function setRol($rol) { $this->rol = $rol; }
    public function setTelefonos() {
        $resultado = DB::query("SELECT telefono FROM telefono WHERE idUsuario = ?;", $this->idUsuario);
        if (count($resultado) == 0) return true;
    
        foreach ($resultado as $telefono) {
          if (!isset($telefono["telefono"])) return false;
          $this->telefonos[] = $telefono["telefono"];
        }
        return true;
    }
  
    public function setEmails() {
        $resultado = DB::query("SELECT email FROM email WHERE idUsuario = ?;", $this->idUsuario);
        if (count($resultado) == 0) return true;
    
        foreach ($resultado as $email) {
          if (!isset($email["email"])) return false;
          $this->emails[] = $email["email"];
        }
        return true;
    }

    public function getIdUsuario() { return $this->idUsuario; }
    public function getRol() { return $this->rol; }
    public function getNombreUsuario() { return $this->nombreUsuario; }
    public function getEmails() { return $this->emails; }
    public function getTelefonos() { return $this->telefonos; }
}

?>