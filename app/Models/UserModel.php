<?php

namespace App\Models;

class UserModel
{
    use \Database,\Sanitize;

    private $id_usuario;
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
