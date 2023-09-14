<?php

namespace App\Models;

class EquipmentModel
{
    use \Database , \Sanitize;

    //cambiar en la base de datos por nombres singulares
    private $id_modelos_equipos;
    private $id_marca;
    private $marca_descripcion;

    private $id_modelo;
    private $modelo_equipo_descripcion;

    private $id_categoria_equipo;
    private $categoria_equipo_descripcion;

    public function __construct()
    {
        $this->Connect();
    }

    public function ListEquipmentBrand()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM equipos_marca");

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function CreateEquipmentBrand()
    {
        $sql = "INSERT INTO `equipos_marca` (`marca_descripcion`) VALUES (:marca_descripcion)";
    
        $params = [
            ':marca_descripcion' => $this->marca_descripcion
        ];
    
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);    
    }

    public function ListEquipmentModels()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM equipos_modelo");

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListEquipmentCategories()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM categorias_equipos");

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function CreateEquipmentCategories()
    {
            $sql = "INSERT INTO `categorias_equipos` (`categoria_equipo_descripcion`) VALUES (:categoria_equipo_descripcion)";
    
            $params = [
                ':categoria_equipo_descripcion' => $this->categoria_equipo_descripcion
            ];
        
            $stm = $this->pdo->prepare($sql);
            return $stm->execute($params);    
  
    }

    public function ListEquipments()
    {
        try {
            $stm = $this->pdo->prepare("SELECT
          modelos_equipos.id_modelos_equipos as equipo,
          equipos_marca.marca_descripcion as marca,
          equipos_modelo.descripcion as modelo,
          categorias_equipos.categoria_equipo_descripcion as categoria
        FROM
          modelos_equipos
        JOIN
          equipos_marca ON modelos_equipos.id_marca = equipos_marca.id_marcas
        JOIN
          equipos_modelo ON modelos_equipos.id_modelo = equipos_modelo.id_modelo
        JOIN
          categorias_equipos ON modelos_equipos.id_categoria_equipo = categorias_equipos.id_categoria_equipo");

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
