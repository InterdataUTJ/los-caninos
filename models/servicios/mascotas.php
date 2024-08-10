<?php 

require_once(__DIR__."/../db.php");

class Mascota {
  protected $id;
  protected $nombre;

  public function setId($_id) { $this->id = $_id; }
  public function setNombre($_nombre) { $this->nombre = $_nombre; }
  public function getId() { return $this->id; }
  public function getNombre() { return $this->nombre; }
}

class Mascotas {
  protected $mascotas = [];

  function __construct() {
    $query = "SELECT idPaciente, nombre FROM paciente;";
    $resultado = DB::query($query);
    if (count($resultado) == 0) return;

    foreach ($resultado as $mascota) {
      $nuevaMascota = new Mascota();
      $nuevaMascota->setId($mascota["idPaciente"]);
      $nuevaMascota->setNombre($mascota["nombre"]);
      $this->mascotas[] = $nuevaMascota;
    }
  }

  public function getMascotas() { return $this->mascotas; }
}

?>