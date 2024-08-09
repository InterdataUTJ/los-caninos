<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class Facturas {
    protected $facturas = [];

    function __construct() {
        $query = "SELECT * FROM factura;";
        $resultado = DB::query($query);
        if (count($resultado) == 0) return;

        foreach ($resultado as $factura) {
            $nuevaFactura = new Factura();
            $nuevaFactura->setId($factura["idFactura"]);
            $nuevaFactura->setFechaPago($factura["fechaPago"]);
            $nuevaFactura->setMetodoPago($factura["metodoPago"]);
            $nuevaFactura->setDescuento($factura["descuento"]);
            $nuevaFactura->setSubtotal($factura["subtotal"]);
            $nuevaFactura->setServicios();
            $this->facturas[] = $nuevaFactura;
        }
    }

    public function getFacturas() { return $this->facturas; }
}

?>