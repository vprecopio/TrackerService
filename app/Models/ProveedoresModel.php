<?php

namespace App\Models;

class ProveedoresModel
{
    use \Database, \Sanitize;

    protected $id;
    private $prov_empresa;
    private $prov_estado = 1;
    private $prov_dir;
    private $prov_tel;
    private $prov_email;
    private $prov_web;
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

    //se que es mal editar todos los campos, pero por ahora queda asi
    public function EditProv()
    {
        try {
            $sql = "UPDATE `proveedores` 
            SET 
            `prov_empresa` = :prov_empresa, 
            `prov_cuit` = :prov_cuit, 
            `prov_dir` = :prov_dir,
            `prov_tel` = :prov_tel,
            `prov_email` = :prov_email,
            `prov_web` = :prov_web  
            WHERE `proveedores`.`id_proveedor` = :id_proveedor ";

            $stm = $this->pdo->prepare($sql);

            $params = [
                ':prov_empresa' => $this->prov_empresa,
                ':prov_estado' => $this->prov_estado,
                ':prov_cuit' => $this->prov_cuit,
                ':prov_dir' => $this->prov_dir,
                ':prov_tel' => $this->prov_tel,
                ':prov_email' => $this->prov_email,
                ':prov_web' => $this->prov_web,
                ':id_proveedor'=>$this->id
            ];

            // Ejecutar la consulta
            $stm->execute($params);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
