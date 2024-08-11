<?php

require_once(__DIR__ . "/../db.php");

class Servicio {
  protected $paciente;
  protected $cliente;
  protected $servicio;
  protected $ingresos;

  public function setPaciente($paciente) { $this->paciente = $paciente; }
  public function setCliente($cliente) { $this->cliente = $cliente; }
  public function setServicio($servicio) { $this->servicio = $servicio; }
  public function setIngresos($ingresos) { $this->ingresos = $ingresos; }

  public function getPaciente() { return $this->paciente; }
  public function getCliente() { return $this->cliente; }
  public function getServicio() { return $this->servicio; }
  public function getIngresos() { return $this->ingresos; }
}

class Servicios {
  protected $pacientes = [];
  protected $numPacientes = 0;
  protected $numServicios = 0;
  protected $ingresos = 0;
  protected $days = [];
  protected $tipoServicio = [];

  public function getPacientes() { return $this->pacientes; }
  public function getNumPacientes() { return $this->numPacientes; }
  public function getNumServicios() { return $this->numServicios; }
  public function getIngresos() { return $this->ingresos; }
  public function getDays() { return $this->days; }
  public function getTipoServicio() { return $this->tipoServicio; }

  public function getData($fechaInicio = "1900-01-01", $fechaFin = "9999-12-31") {
    if (!$this->setDays()) return false;
    if (!$this->setTipoServicio()) return false;
    
    $query = <<<SQL
      SELECT s.tipoServicio, p.nombre, u.nombreUsuario,
      TRUNCATE(subtotal - (subtotal * (descuento / 100)), 2) AS ingresos
      FROM servicio s
      JOIN factura f ON f.idFactura = s.idFactura
      JOIN paciente p ON s.idPaciente = p.idPaciente
      JOIN cliente c ON p.idCliente = c.idCliente
      JOIN usuario u ON c.idUsuario = u.idUsuario
      WHERE f.fechaPago BETWEEN ? AND ?;
    SQL;
    
    $resultado = DB::query($query, $fechaInicio, $fechaFin);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    foreach ($resultado as $servicio) {
      $serv = new Servicio();
      $serv->setPaciente($servicio["nombre"]);
      $serv->setCliente($servicio["nombreUsuario"]);
      $serv->setServicio($servicio["tipoServicio"]);
      $serv->setIngresos($servicio["ingresos"]);
      $this->pacientes[] = $serv;
    }

    return $this->getSummary($fechaInicio, $fechaFin);
  }

  public function getSummary($fechaInicio, $fechaFin) {
    $query = <<<SQL
      SELECT COUNT(DISTINCT s.idServicio) AS servicios, 
      COUNT(DISTINCT s.idPaciente) AS pacientes,
      TRUNCATE(SUM(subtotal - (subtotal * (descuento / 100))), 2) AS ingresos
      FROM servicio s JOIN factura f ON s.idFactura = f.idFactura
      WHERE f.fechaPago BETWEEN ? AND ?;
    SQL;

    $resultado = DB::query($query, $fechaInicio, $fechaFin);
    if (!$resultado) return false;
    if (count($resultado) != 1) return false;

    $this->numPacientes = $resultado[0]["pacientes"];
    $this->numServicios = $resultado[0]["servicios"];
    $this->ingresos = $resultado[0]["ingresos"];
    return true;
  }

  public function setDays() {
    $query = <<<SQL
      SELECT 
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 0) AS lunes,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 1) AS martes,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 2) AS miercoles,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 3) AS jueves,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 4) AS viernes,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 5) AS sabado,
      (SELECT COUNT(idServicio) FROM servicio WHERE WEEKDAY(fechaIngreso) = 6) AS domingo;
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    $this->days["lunes"] = $resultado[0]["lunes"];
    $this->days["martes"] = $resultado[0]["martes"];
    $this->days["miercoles"] = $resultado[0]["miercoles"];
    $this->days["jueves"] = $resultado[0]["jueves"];
    $this->days["viernes"] = $resultado[0]["viernes"];
    $this->days["sabado"] = $resultado[0]["sabado"];
    $this->days["domingo"] = $resultado[0]["domingo"];
    return true;
  }

  public function setTipoServicio() {
    $query = <<<SQL
      SELECT 
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "CONSULTA") AS CONSULTA,
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "VACUNA") AS VACUNA,
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "DESPARASITACION") AS DESPARASITACION,
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "CIRUGIA") AS CIRUGIA,
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "ESTETICA") AS ESTETICA,
      (SELECT COUNT(idServicio) FROM servicio WHERE tipoServicio = "ESTADIA") AS ESTADIA;
    SQL;

    $resultado = DB::query($query);
    if (!$resultado) return false;
    if (count($resultado) == 0) return false;

    $this->tipoServicio["CONSULTA"] = $resultado[0]["CONSULTA"];
    $this->tipoServicio["VACUNA"] = $resultado[0]["VACUNA"];
    $this->tipoServicio["DESPARASITACION"] = $resultado[0]["DESPARASITACION"];
    $this->tipoServicio["CIRUGIA"] = $resultado[0]["CIRUGIA"];
    $this->tipoServicio["ESTETICA"] = $resultado[0]["ESTETICA"];
    $this->tipoServicio["ESTADIA"] = $resultado[0]["ESTADIA"];
    return true;
  }
}

?>