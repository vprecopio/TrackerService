<?php
namespace App\Http\Controllers;

use App\Models\UserModel;

class AuthController extends UserModel
{
    public function index()
    {
        //en este caso, esto tendria que comprobar si estas logeado o no por ahora tiene una redireccion al login
        redirect('/auth/login');
    }

    public function login()
    {

        if($_POST)
        {
            $this->usr_contrasena = $_POST['password'];
            $this->usr_email = $_POST['email'];
            $_SESSION['TODO'] = $this->ComprobarEmailYPassword();
            return view('home');

        }
        return view('authlogin');
    }

    public function register()
    {

        return view('authregister');
    }

    public function reset()
    {
        return view('authforgot');
        //dentro de aca tiene que estar la logica para llamar a la otra vista authrecovery
    }
}
