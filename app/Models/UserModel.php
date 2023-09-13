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

    public function ComprobarEmailYPassword()
    {
        try {
            //consulta
            $stm = $this->pdo->prepare("SELECT * FROM `usuarios` WHERE `usr_email` = :usr_email and `usr_contrasena` = :usr_contrasena ");

            //asignar variables en la consulta
            $stm->bindParam(':usr_email', $this->usr_email, \PDO::PARAM_STR);
            $stm->bindParam(':usr_contrasena', $this->usr_contrasena, \PDO::PARAM_STR);

            //ejecutar
            $stm->execute();

            return $stm->fetchAll(\PDO::FETCH_OBJ);

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

}

