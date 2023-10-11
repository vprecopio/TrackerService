<?php

namespace App\Http\Controllers;

use App\Mailer;
use App\Models\UserModel;
use CheckInternet;

class AuthController extends UserModel
{
    use CheckInternet;

    public function index()
    {
        // Redireccionar al inicio de sesión si el usuario no está autenticado
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            redirect('/auth/login');
        }
    }

    public function login()
    {
        if (isset($_POST['password']) && isset($_POST['email'])) {
            $this->usr_contrasena = sha1($_POST['password']);
            $this->usr_email = $_POST['email'];

            $respuesta = $this->ComprobarEmailYPassword();

            if (empty($respuesta)) {
                // si está vacío
                $_SESSION['logged_in'] = false;
                return view('authlogin');
            } else {
                // si está lleno
                $_SESSION['logged_in'] = true; // Marcar al usuario como autenticado
                $_SESSION['TODO'] = $respuesta;

                if ($this->hasConnection()) {
                    $php_mailer = new Mailer;
                    $php_mailer->SendLoginMail($_SESSION['TODO'][0]->usr_email, $_SESSION['TODO'][0]->usr_nombre, true);
                }

                redirect('/');
            }
        }
        return view('authlogin');
    }

    public function logout()
    {
        session_destroy();
        redirect('/');
    }

    public function register()
    {
        if (isset($_POST['nombre']) &&  isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_con'])) {

            $this->usr_nombre = $_POST['nombre'];
            $this->usr_apellido = $_POST['apellido'];
            $this->usr_email = $_POST['email'];
            $this->usr_contrasena = sha1($_POST['password']);

            //falta validar que no exista alguien con el mismo email
            if ($_POST['password'] == $_POST['password_con']) {
                $this->InsertarNuevoUsuario();
            } else {
                echo "<script>alert('contraseñas distintas')</script>";
            }


            return view('authregister');
        }

        return view('authregister');
    }

    public function reset()
    {
        return view('authforgot');
        //dentro de aca tiene que estar la logica para llamar a la otra vista authrecovery
    }
}
