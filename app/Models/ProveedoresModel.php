<?php

namespace App\Models;

class ProveedoresModel
{
    use \Database, \Sanitize;

    protected $id;
    private $prov_empresa ;
    private $prov_estado ;
    private $prov_dir ;
    private $prov_tel;
    private $prov_email ;
    private $prov_web ;
    private $prov_cuit;



    public function __construct()
    {
        $this->Connect();
    }

    public function ListProveedores() //listo los proveedores en tabla
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM `proveedores` ORDER BY `proveedores`.`id_proveedor` DESC");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneProv()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM proveedores WHERE `proveedores`.`id_proveedor` = :id_proveedor");
            $stm->bindParam(':id_proveedor', $this->id, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function CreateProv() //creo un provedor
    {
        $sql = "INSERT INTO `proveedores` (`prov_estado`, `prov_empresa`, `prov_cuit`, `prov_dir`, `prov_tel`, `prov_email`, `prov_web`) VALUES (:prov_estado,:nombre_prov,:prov_cuit,:prov_dir,:prov_tel,:prov_email,:prov_web);";

        $params = [
            ':nombre_prov' => $this->prov_empresa,
            ':prov_estado' => $this->prov_estado,
            ':prov_cuit' => $this->prov_cuit,
            ':prov_dir' => $this->prov_dir,
            ':prov_tel' => $this->prov_tel,
            ':prov_email' => $this->prov_email,
            ':prov_web' => $this->prov_web,
        ];
    
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);    
    }

    public function DeleteProv() //elimino prov
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM proveedores WHERE `proveedores`.`id_proveedor` = :id_proveedor");
            $stm->bindParam(':id_proveedor', $this->id, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

/*
    public function ExistClient()
    {
        try {
            $sql = "SELECT COUNT(*) FROM `clientes` WHERE `id_cliente` = :id_cliente";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_cliente', $this->id, \PDO::PARAM_INT);
            $stm->execute();

            $result = $stm->fetchColumn();

            return $result > 0 ? true : false;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //se que es mal editar todos los campos, pero por ahora queda asi
    public function EditClient()
    {
        try {
            $sql = "UPDATE `clientes` SET `cliente_nombre` = :nuevo_nombre, `cliente_email` = :nuevo_email, `cliente_telefono` = :nuevo_telefono, `cliente_direccion` = :nueva_direccion WHERE `id_cliente` = :id_cliente;";

            $stm = $this->pdo->prepare($sql);

            // Asignar valores a los marcadores de posición
            $stm->bindParam(':nuevo_nombre', $this->nombre_completo);
            $stm->bindParam(':nuevo_email', $this->email);
            $stm->bindParam(':nuevo_telefono', $this->telefono);
            $stm->bindParam(':nueva_direccion', $this->direccion);
            $stm->bindParam(':id_cliente', $this->id);

            // Ejecutar la consulta
            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function CountClient()
    {
        try {
            $sql = 'SELECT COUNT(cliente_email) AS cantclient FROM `clientes`';
            $stm = $this->pdo->prepare($sql);

            $stm->execute();

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }*/
}
