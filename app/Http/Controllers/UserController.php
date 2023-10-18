<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Models\UserModel;

class UserController extends UserModel
{
    public function index(): Response
    {
        if ($_SESSION['TODO'][0]->rol_nombre == 'administrador') {
            return view('user');
        }
        redirect('/');
    }

    public function list()
    {
        return $this->ListUser();
    }

    public function delete()
    {
        if ($_SESSION['TODO'][0]->rol_nombre == 'administrador') {
            $this->id_usuario = $_GET['id_usuario'];
            $this->DeleteUser();
        }
        redirect('/user/');
        exit;
    }

    public function create()
    {
        if ($_SESSION['TODO'][0]->rol_nombre == 'administrador') {
            if ($_POST) {
                $this->usr_nombre = $_POST['nombre-crear'];
                $this->usr_apellido = $_POST['apellido-crear'];
                $this->usr_email = $_POST['email-crear'];
                $this->usr_contrasena = sha1($_POST['contrasena-crear']);
                $this->usr_estado = $_POST['estado-crear'] == 'activo' ? 1 : 0;
                $this->rol_nombre = $_POST['rol-crear'];

                $rol = $this->OneRole();

                if (!empty($rol)) {
                    $this->id_rol = $rol[0]->id_rol;
                    $this->CreateUser();
                }
            }
        }
        redirect('/user/');
        exit;
    }

    public function edit()
    {
        if ($_SESSION['TODO'][0]->rol_nombre == 'administrador') {
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
        }
        redirect('/user/');
        exit;
    }
}
