<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Models\UserModel;

class UserController extends UserModel
{
    public function index(): Response
    {
        return view('user');
    }

    public function list()
    {
        return $this->ListUser();
    }

    public function delete()
    {
        $this->id_usuario = $_GET['Documento'];
        $this->DeleteUser();
        redirect('/user/');
    }

    public function edit()
    {
        if ($_POST && isset($_POST['id_usuario']) && isset($_POST['Editar'])) {
            $this->id_usuario = $_POST['id_usuario'];
            $this->usr_nombre = $_POST['nombre'] ?? 'Sin datos';
            $this->usr_apellido = $_POST['apellido'] ?? 'Sin datos';
            $this->usr_email = $_POST['email'] ?? 'Sin datos';
            $this->usr_estado = ($_POST['estado'] == 'Activo') ? '1' : '0';
            $this->rol_nombre = $_POST['rol'] ?? 'Sin datos';

            $user = $this->OneUser();
            $rol = $this->OneRole();

            if (!empty($user) && !empty($rol)) {
                $this->id_rol = $rol[0]->id_rol;
                $this->EditUser();
            }
        }
        redirect('/user/');
    }
}
