<?php

namespace App\Models;

class EquipmentModel
{
    use \Database , \Sanitize;

    //cambiar en la base de datos por nombres singulares
    private $id_modelos_equipos;
    private $id_marca;
    private $id_modelo;
    private $id_categoria_equipo;


    public function __construct()
    {
        $this->Connect();
    }

    public function ListEquipments()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM `modelos_equipos`");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
