<?php

namespace App\Models;

class EquipmentModel
{
    use \Database, \Sanitize;

    //cambiar en la base de datos por nombres singulares
    private $id_modelos_equipos;

    private $id_modelo, $modelo_equipo_descripcion;
    private $id_marca, $marca_descripcion;
    private $id_categoria_equipo, $categoria_equipo_descripcion;

    public function __construct()
    {
        $this->Connect();
    }






    //esto te trae un modelo tomando como parametro de busqueda lo que exista en el atributo modelo_equipo_descripcion
    public function OneEquip()
    {
        try {
            $sql = "SELECT * FROM `modelos_equipos` WHERE `id_modelos_equipos` = :id_modelos_equipos LIMIT 1";

            $params = [
                ':id_modelos_equipos' => $this->id_modelos_equipos
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    //esto te trae un modelo tomando como parametro de busqueda lo que exista en el atributo modelo_equipo_descripcion
    public function OneModel()
    {
        try {
            $sql = "SELECT * FROM `equipos_modelo` WHERE `descripcion` = :modelo_descripcion_buscar LIMIT 1";

            $params = [
                ':modelo_descripcion_buscar' => $this->modelo_equipo_descripcion
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    //esto te trae una marca tomando como parametro de busqueda lo que exista en el atributo marca_descripcion
    public function OneBrand()
    {
        try {
            $sql = "SELECT * FROM `equipos_marca` WHERE `marca_descripcion` = :marca_descripcion_buscar LIMIT 1";

            $params = [
                ':marca_descripcion_buscar' => $this->marca_descripcion
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    //esto te trae una categia tomando lo que exista en el atributo de busqueda
    public function OneCategory()
    {
        try {

            $sql = "SELECT * FROM `categorias_equipos` WHERE `categoria_equipo_descripcion` = :categoria_equipo_descripcion_buscar LIMIT 1";

            $params = [
                ':categoria_equipo_descripcion_buscar' => $this->categoria_equipo_descripcion
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
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
    public function ListEquipments()
    {
        try {
            $stm = $this->pdo->prepare(
                "SELECT
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
                categorias_equipos ON modelos_equipos.id_categoria_equipo = categorias_equipos.id_categoria_equipo"
            );

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }






    public function CreateEquipmentModel()
    {
        $sql = "INSERT INTO `equipos_modelo` (`descripcion`) VALUES (:modelo_descripcion)";

        $params = [
            ':modelo_descripcion' => $this->modelo_equipo_descripcion
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
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
    public function CreateEquipmentCategories()
    {
        $sql = "INSERT INTO `categorias_equipos` (`categoria_equipo_descripcion`) VALUES (:categoria_equipo_descripcion)";

        $params = [
            ':categoria_equipo_descripcion' => $this->categoria_equipo_descripcion
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }
    public function CreateEquipments()
    {
        $sql = 'INSERT INTO modelos_equipos (id_modelo, id_marca, id_categoria_equipo) VALUES (:id_modelo_existente, :id_marca_existente, :id_categoria_existente);';
        $params = [
            ':id_modelo_existente' => $this->id_modelo,
            ':id_marca_existente' => $this->id_marca,
            ':id_categoria_existente' => $this->id_categoria_equipo
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }




    public function EditEquipmentModel()
    {
        $sql = "UPDATE `equipos_modelo` SET `descripcion` = :modelo_descripcion WHERE `equipos_modelo`.`id_modelo` = :id_modelo ";

        $params = [
            ':id_modelo' => $this->id_modelo,
            ':modelo_descripcion' => $this->modelo_equipo_descripcion
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }
    public function EditEquipments()
    {
        $sql = "UPDATE `modelos_equipos` SET `id_marca` = :id_marca , `id_modelo` = :id_modelo , `id_categoria_equipo` = :id_categoria_equipo WHERE `modelos_equipos`.`id_modelos_equipos` = :id_modelos_equipos ";
        $params = [
            ':id_modelos_equipos' => $this->id_modelos_equipos,
            ':id_modelo' => $this->id_modelo,
            ':id_marca' => $this->id_marca,
            ':id_categoria_equipo' => $this->id_categoria_equipo
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function DeleteEquiptment()
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM modelos_equipos WHERE `modelos_equipos`.`id_modelos_equipos` = :id_equiptment");
            $stm->bindParam(':id_equiptment', $this->id_modelos_equipos, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        exit;
    }
}
