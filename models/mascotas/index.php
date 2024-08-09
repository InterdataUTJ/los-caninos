<?php

require_once(__DIR__."/../db.php");
require_once(__DIR__."/ver.php");

class Mascotas {
    protected $mascotas = [];

    function __construct() {
        $query = "SELECT * FROM paciente;";
        $resultado = DB::query($query);
        if (count($resultado) == 0) return;

        foreach ($resultado as $mascota) {
            $nuevaMascota = new Mascota();
            $nuevaMascota->setId($mascota["idPaciente"]);
            $nuevaMascota->setIdEmpleado($mascota["idEmpleado"]);
            $nuevaMascota->setIdCliente($mascota["idCliente"]);
            $nuevaMascota->setNombre($mascota["nombre"]);
            $nuevaMascota->setRaza($mascota["raza"]);
            $nuevaMascota->setTipoMascota($mascota["tipo_mascota"]);
            $nuevaMascota->setFechaNac($mascota["fechaNac"]);
            $nuevaMascota->setTamano($mascota["tamano"]);
            $nuevaMascota->setSexo($mascota["sexo"]);
            $nuevaMascota->setPeso($mascota["peso"]);
            $this->mascotas[] = $nuevaMascota;
        }
    }

    public function getMascotas() { return $this->mascotas; }
}

?>