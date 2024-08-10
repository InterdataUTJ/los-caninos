<?php

require_once(__DIR__ . "/../db.php");

class Mascotas {
  protected $sexo = [];
  protected $tamano = [];
  protected $edad = [];
  protected $peso = [];

  public function getSexo() { return $this->sexo; }
  public function getTamano() { return $this->tamano; }
  public function getEdad() { return $this->edad; }
  public function getPeso() { return $this->peso; }

  public function setSexo() {
    $query = <<<SQL
      SELECT sexo, COUNT(*) AS cantidad
      FROM paciente
      GROUP BY sexo;
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    foreach ($resultado as $sexo) {
      $this->sexo[$sexo["sexo"]] = $sexo["cantidad"];
    }
  }

  public function setTamano() {
    $query = <<<SQL
      SELECT tamano, COUNT(*) AS cantidad
      FROM paciente
      GROUP BY tamano;
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    foreach ($resultado as $tamano) {
      $this->tamano[$tamano["tamano"]] = $tamano["cantidad"];
    }
  }

  public function setEdad() {
    $query = <<<SQL
      SELECT calcularEdad(fechaNac) AS edad, 
      COUNT(*) AS cantidad FROM paciente
      GROUP BY calcularEdad(fechaNac);
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    foreach ($resultado as $edad) {
      $this->edad[$edad["edad"]] = $edad["cantidad"];
    }
  }

  public function setPeso() {
    $query = <<<SQL
      SELECT peso, COUNT(*) AS cantidad 
      FROM paciente GROUP BY peso;
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    foreach ($resultado as $peso) {
      $this->peso[$peso["peso"]] = $peso["cantidad"];
    }
  }

  public function getData() {
    $this->setSexo();
    $this->setTamano();
    $this->setEdad();
    $this->setPeso();
  }
}

?>