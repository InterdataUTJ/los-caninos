<?php

require_once(__DIR__."/../db.php");

class Factura {
    protected $id;
    protected $fechaPago;
    protected $metodoPago;
    protected $descuento;
    protected $subtotal;
    protected $servicios = [];

    public function setId($_id) { $this->id = $_id; }
    public function setFechaPago($_fechaPago) { $this->fechaPago = $_fechaPago; }
    public function setMetodoPago($_metodoPago) { $this->metodoPago = $_metodoPago; }
    public function setDescuento($_descuento) { $this->descuento = $_descuento; }
    public function setSubtotal($_subtotal) { $this->subtotal = $_subtotal; }
    public function changeServicios($_servicios) { $this->servicios = $_servicios; }

    public function getId() { return $this->id; }
    public function getFechaPago() { return $this->fechaPago; }
    public function getMetodoPago() { return $this->metodoPago; }
    public function getDescuento() { return $this->descuento; }
    public function getSubtotal() { return $this->subtotal; }
    public function getServicios() { return $this->servicios; }

    public function setServicios() {
        $query = "SELECT idServicio FROM servicio WHERE idFactura = ?;";
        $resultado = DB::query($query, $this->id);
        
        if (count($resultado) == 0) return false;
        foreach ($resultado as $servicio) {
            $nuevoServicio = new Servicio();
            $nuevoServicio->setId($servicio["idServicio"]);
            if (!$nuevoServicio->getData()) continue;
            $this->servicios[] = $nuevoServicio;
        }

        return true;
    }

    public function getData() {
        $query = "SELECT * FROM factura WHERE idFactura = ?;";
        $resultado = DB::query($query, $this->id);
        if (count($resultado) == 0) return false;
        if (!isset($resultado[0])) return false;
        if (!isset($resultado[0]["idFactura"])) return false;

        $this->setId($resultado[0]["idFactura"]);
        $this->setFechaPago($resultado[0]["fechaPago"]);
        $this->setMetodoPago($resultado[0]["metodoPago"]);
        $this->setDescuento($resultado[0]["descuento"]);
        $this->setSubtotal($resultado[0]["subtotal"]);
        return $this->setServicios();
    }
}


class Servicio {
    protected $id;
    protected $idPaciente;
    protected $idCliente;
    protected $idFactura;
    protected $diagnostico;
    protected $tratamiento;
    protected $tipoServicio;
    protected $fechaIngreso;
    protected $fechaSalida;
    protected $estatus;
    protected $empleados = [];
    protected $idEmpleados = [];
    protected $nombreUsuarioEmpleados = [];

    public function setId($_id) { $this->id = $_id; }
    public function setIdPaciente($_idPaciente) { $this->idPaciente = $_idPaciente; }
    public function setIdCliente($_idCliente) { $this->idCliente = $_idCliente; }
    public function setIdFactura($_idFactura) { $this->idFactura = $_idFactura; }
    public function setDiagnostico($_diagnostico) { $this->diagnostico = $_diagnostico; }
    public function setTratamiento($_tratamiento) { $this->tratamiento = $_tratamiento; }
    public function setTipoServicio($_tipoServicio) { $this->tipoServicio = $_tipoServicio; }
    public function setFechaIngreso($_fechaIngreso) { $this->fechaIngreso = $_fechaIngreso; }
    public function setFechaSalida($_fechaSalida) { $this->fechaSalida = $_fechaSalida; }
    public function setEstatus($_estatus) { $this->estatus = $_estatus; }
    public function changeEmpleados($_empleados) { $this->empleados = $_empleados; }
    public function changeIdEmpleados($_idEmpleados) { $this->idEmpleados = $_idEmpleados; }

    public function getId() { return $this->id; }
    public function getIdPaciente() { return $this->idPaciente; }
    public function getIdCliente() { return $this->idCliente; }
    public function getIdFactura() { return $this->idFactura; }
    public function getDiagnostico() { return $this->diagnostico; }
    public function getTratamiento() { return $this->tratamiento; }
    public function getTipoServicio() { return $this->tipoServicio; }
    public function getFechaIngreso() { return $this->fechaIngreso; }
    public function getFechaSalida() { return $this->fechaSalida; }
    public function getEstatus() { return $this->estatus; }
    public function getEmpleados() { return $this->empleados; }
    public function getIdEmpleados() { return $this->idEmpleados; }
    public function getNombreUsuarioEmpleados() { return $this->nombreUsuarioEmpleados; }

    public function setEmpleados() {
        $query = <<<QUERY
            SELECT e.idEmpleado, nombreUsuario FROM empleadoServicio s
            JOIN empleado e ON e.idEmpleado = s.idEmpleado
            JOIN usuario u ON e.idUsuario = u.idUsuario
            WHERE s.idServicio = ?;
        QUERY;
        $resultado = DB::query($query, $this->id);
        
        if (count($resultado) == 0) return false;
        foreach ($resultado as $empleado) {
            $this->empleados[] = "#{$empleado["idEmpleado"]} - {$empleado["nombreUsuario"]}";
            $this->idEmpleados[] = $empleado["idEmpleado"];
            $this->nombreUsuarioEmpleados[$empleado["idEmpleado"]] = $empleado["nombreUsuario"];
        }

        return true;
    }

    public function getData() {
        $query = "SELECT s.*, p.idCliente FROM servicio s JOIN paciente p ON p.idPaciente = s.idPaciente WHERE s.idServicio = ?;";
        $resultado = DB::query($query, $this->id);
        if (count($resultado) == 0) return false;
        if (!isset($resultado[0])) return false;
        if (!isset($resultado[0]["idServicio"])) return false;

        $this->setId($resultado[0]["idServicio"]);
        $this->setIdPaciente($resultado[0]["idPaciente"]);
        $this->setIdCliente($resultado[0]["idCliente"]);
        $this->setIdFactura($resultado[0]["idFactura"]);
        $this->setDiagnostico($resultado[0]["diagnostico"]);
        $this->setTratamiento($resultado[0]["tratamiento"]);
        $this->setTipoServicio($resultado[0]["tipoServicio"]);
        $this->setFechaIngreso($resultado[0]["fechaIngreso"]);
        $this->setFechaSalida($resultado[0]["fechaSalida"]);
        $this->setEstatus($resultado[0]["estatus"]);
        return $this->setEmpleados();
    }
}

?>