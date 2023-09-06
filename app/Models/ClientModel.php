<?php

namespace App\Models;

use App\Config\Database;

class ClientModel
{
    use Database;

    protected $id;
    protected $nombre_completo;
    protected $email;
    protected $telefono;
    protected $direccion;

    public function __construct()
    {
        $this->Connect();
    }

    public function ListClient()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM `clientes` ORDER BY `clientes`.`id_cliente` DESC");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneClient()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE `clientes`.`id_cliente` = :id_client");
            $stm->bindParam(':id_client', $this->id, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function CreateClient()
    {
        try {
            $stm = $this->pdo->prepare(" INSERT INTO `clientes` (`cliente_nombre`, `cliente_email`, `cliente_telefono`, `cliente_direccion`) VALUES (:nombre, :email, :telefono, :direccion) ");
            $stm->bindParam(':nombre', $this->nombre_completo, \PDO::PARAM_STR);
            $stm->bindParam(':email', $this->email, \PDO::PARAM_STR);
            $stm->bindParam(':telefono', $this->telefono, \PDO::PARAM_STR);
            $stm->bindParam(':direccion', $this->direccion, \PDO::PARAM_STR);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function DeleteClient()
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM clientes WHERE `clientes`.`id_cliente` = :id_client");
            $stm->bindParam(':id_client', $this->id, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneClientByEmail()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE cliente_email = :cliente_email");
            $stm->bindParam(':cliente_email', $this->email, \PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function ExistClient()
    {
        try {

            $sql = "SELECT COUNT(*) FROM `clientes` WHERE `cliente_email` = :cliente_email";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':cliente_email', $this->email, \PDO::PARAM_STR);
            $stm->execute();

            $result = $stm->fetchColumn();
            
            return $result > 0 ? true : false;

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
