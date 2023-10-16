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
    private $id_rol, $rol_nombre;

    public function __construct()
    {
        $this->Connect();
    }

    public function ObtenerNuevosRoles(){
        try {
            //consulta
            $stm = $this->pdo->prepare("SELECT * FROM `roles`");

            //asignar variables en la consulta

            //ejecutar
            $stm->execute();

            //en caso de que no exista ninguno devuelva 0 o false en caso contrario que devuelva "return $stm->fetchAll(\PDO::FETCH_OBJ);"
            return $stm->fetchAll(\PDO::FETCH_OBJ);

        } catch (\Exception $e) {        

        }
    }

    public function ListStatus(){
        try{
            $stm = $this -> pdo -> prepare("SELECT DISTINCT usr_estado FROM usuarios");

            $stm -> execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }


    public function ListUser(){
        try{
            $stm = $this -> pdo -> prepare("SELECT * FROM usuarios JOIN roles ON usuarios.id_rol = roles.id_rol ORDER BY usuarios.id_usuario ASC");

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

    public function OneRole(){
        try{
            $stm = $this -> pdo -> prepare("SELECT * FROM `roles` WHERE `roles`.`rol_nombre` = :rol_nombre");
            $stm -> bindParam(':rol_nombre', $this->rol_nombre, \PDO::PARAM_STR);
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
            $sql = "UPDATE `usuarios` SET `usr_nombre` = :new_usr_nombre, `usr_apellido` = :new_usr_apellido, `usr_email` = :new_usr_email, `usr_estado` = :new_usr_estado, `id_rol` = :new_id_rol WHERE `id_usuario` = :id_usuario;";

            $stm = $this->pdo->prepare($sql);

            $stm->bindParam(':new_usr_nombre', $this->usr_nombre);
            $stm->bindParam(':new_usr_apellido', $this->usr_apellido);
            $stm->bindParam(':new_usr_email', $this->usr_email);
            $stm->bindParam(':new_usr_estado', $this->usr_estado);
            $stm->bindParam(':new_id_rol', $this->id_rol);
            $stm->bindParam(':id_usuario', $this->id_usuario);

            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListUserRoles(){
        try{
            $stm = $this -> pdo -> prepare("SELECT * FROM roles");

            $stm -> execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function OneUserByEmail()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE `usuarios`.`usr_email` = :usr_emai");
            $stm->bindParam(':usr_emai', $this->usr_email, \PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
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
