<?php 

require_once(__DIR__."/../db.php");

class Empleado {
  protected $id;
  protected $nombreUsuario;

  public function setId($_id) { $this->id = $_id; }
  public function setNombreUsuario($_nombreUsuario) { $this->nombreUsuario = $_nombreUsuario; }
  public function getId() { return $this->id; }
  public function getNombreUsuario() { return $this->nombreUsuario; }
}

class Empleados {
  protected $empleados = [];

  function __construct() {
    $query = "SELECT idEmpleado, nombreUsuario FROM empleado e JOIN usuario u ON u.idUsuario = e.idUsuario;";
    $resultado = DB::query($query);
    if (count($resultado) == 0) return;

    foreach ($resultado as $empleado) {
      $nuevoEmpleado = new Empleado();
      $nuevoEmpleado->setId($empleado["idEmpleado"]);
      $nuevoEmpleado->setNombreUsuario($empleado["nombreUsuario"]);
      $this->empleados[] = $nuevoEmpleado;
    }
  }

  public function getEmpleados() { return $this->empleados; }
}

?>