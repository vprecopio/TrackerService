<?php

namespace App\Models;

class UserModel
{
    use \Database,\Sanitize;

    protected $id_usuario;
    private $usr_nombre;
    private $usr_apellido;
    private $usr_email;
    private $usr_contrasena;
    private $usr_estado;
    private $id_rol;

    public function __construct()
    {
        $this->Connect();
    }

    public function ListUser(){
        try{
            $stm = $this -> pdo -> prepare("SELECT * FROM `usuarios` ORDER BY `usuarios`.`id_usuario` DESC");
            $stm -> execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function OneUser(){
        try{
            $stm = $this -> pdo -> prepare("SELECT * FROM `usuarios` WHERE `usuarios`.`id_usuario` = :id_usuario");
            $stm -> bindParam(':id_usuario', $this->id_usuario, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function CreateUser(){
        $sql = "INSERT INTO `usuarios`(`usr_nombre`, `usr_apellido`, `usr_email`, `usr_contrasena`, `usr_estado`, `id_rol`) VALUES (:usr_nombre, :usr_apellido, :usr_email, :usr_contrasena, :usr_estado, :id_rol)";

        $params=[
            ':usr_nombre' => $this->usr_nombre,
            ':usr_apellido' => $this->usr_apellido,
            ':usr_email' => $this->usr_email,
            ':usr_contrasena' => $this->usr_contrasena,
            ':usr_estado' => $this->usr_estado,
            ':id_rol' => $this->id_rol
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function DeleteUser(){
        try{
            $stm = $this->pdo->prepare("DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = :id_usuario");
            $stm->bindParam(':id_usuario', $this->id_usuario, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function ExistUser(){
        try{
            $sql = "SELECT COUNT(*) FROM `usuarios` WHERE `id_usuario` = :id_usuario";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_usuario', $this->id_usuario, \PDO::PARAM_INT);
            $stm->execute();

            $result = $stm->fetchColumn();

            return $result > 0 ? true : false;
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function EditUser(){
        try {

            $fieldsToUpdate = [
                'usr_nombre' => $this->usr_nombre,
                'usr_apellido' => $this->usr_apellido,
                'usr_email' => $this->usr_email,
                'usr_contrasena' => $this->usr_contrasena,
                'usr_estado' => $this->usr_estado,
                'id_rol' => $this->id_rol,
            ];

            $sql = "UPDATE `usuarios` SET ";
            $params = [];
    
            foreach ($fieldsToUpdate as $field => $value) {
                if ($value !== null) {
                    $sql .= "`$field` = :$field, ";
                    $params[":$field"] = $value;
                }
            }
    
            // Quita la coma final y agrega la condición WHERE
            $sql = rtrim($sql, ', ') . " WHERE `id_usuario` = :id_usuario;";
    
            $stm = $this->pdo->prepare($sql);
    
            // Agrega los parámetros a la consulta
            $params[':id_usuario'] = $this->id_usuario;
            foreach ($params as $param => $value) {
                $stm->bindParam($param, $value);
            }
    
            // Ejecuta la consulta
            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /*----------------------------------------------------------------*/

    public function ComprobarEmailYPassword()
    {
        try {
            //consulta
            $stm = $this->pdo->prepare("SELECT * FROM `usuarios` JOIN `roles` ON `roles`.id_rol = `usuarios`.id_rol WHERE `usr_email` = :usr_email and `usr_contrasena` = :usr_contrasena ");

            //asignar variables en la consulta
            $stm->bindParam(':usr_email', $this->usr_email, \PDO::PARAM_STR);
            $stm->bindParam(':usr_contrasena', $this->usr_contrasena, \PDO::PARAM_STR);

            //ejecutar
            $stm->execute();

            //en caso de que no exista ninguno devuelva 0 o false en caso contrario que devuelva "return $stm->fetchAll(\PDO::FETCH_OBJ);"
            return $stm->fetchAll(\PDO::FETCH_OBJ);

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertarNuevoUsuario()
    {
        try {
            //consulta
            $stm = $this->pdo->prepare("INSERT INTO `usuarios` (`usr_nombre`, `usr_apellido`, `usr_email`, `usr_contrasena`, `usr_estado`, `id_rol`) VALUES (:nombre, :apellido, :email, :contrasena, '1', '1');");

            //asignar variables en la consulta
            $stm->bindParam(':nombre', $this->usr_nombre, \PDO::PARAM_STR);
            $stm->bindParam(':apellido', $this->usr_apellido, \PDO::PARAM_STR);
            $stm->bindParam(':email', $this->usr_email, \PDO::PARAM_STR);
            $stm->bindParam(':contrasena', $this->usr_contrasena, \PDO::PARAM_STR);

            //ejecutar
            $stm->execute();

            return true;

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

}

