<?php 

require_once(__DIR__."/../db.php");

class Cliente {
//Propiedades de mi clase
  protected $id;
  protected $nombreUsuario;

  //Los getters and setters de mi clase cliente
  public function setId($_id) { $this->id = $_id; }
  public function setNombreUsuario($_nombreUsuario) { $this->nombreUsuario = $_nombreUsuario; }
  public function getId() { return $this->id; }
  public function getNombreUsuario() { return $this->nombreUsuario; }
}

class Clientes {
    //Esto declara una propiedad $clientes dentro de la clase cliente, que dicha sea de paso
    //solo sera accesible en la clase que se declaro y en las hijas de esta clase.
  protected $clientes = [];
  function __construct() {
    $query = "SELECT idCliente, nombreUsuario FROM cliente c JOIN usuario u ON u.idUsuario = c.idUsuario;";
    $resultado = DB::query($query);
    if (count($resultado) == 0) return;

    foreach ($resultado as $cliente) {
      $nuevoCliente = new Cliente();
      $nuevoCliente->setId($cliente["idCliente"]);
      $nuevoCliente->setNombreUsuario($cliente["nombreUsuario"]);
      $this->clientes[] = $nuevoCliente;
    }
  }

  public function getClientes() { return $this->clientes; }
}

?>