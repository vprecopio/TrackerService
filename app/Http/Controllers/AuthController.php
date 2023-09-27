<?php
namespace App\Http\Controllers;

use App\Mailer;
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

        if(isset($_POST['password']) && isset($_POST['email']))
        {
            $this->usr_contrasena = sha1($_POST['password']);
            $this->usr_email = $_POST['email'];
            
            $respuesta = $this->ComprobarEmailYPassword();

            if(empty($respuesta))
            {
              //si esta vacio 
                return view('authlogin');
            }
            else
            {
                // si esta lleno
                $_SESSION['TODO'] = $respuesta;

                $php_mailer = new Mailer;
                $php_mailer->SendLoginMail($_SESSION['TODO'][0]->usr_email, $_SESSION['TODO'][0]->usr_nombre, true);

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
        if(isset($_POST['nombre']) &&  isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_con']))
        {
          
            $this->usr_nombre = $_POST['nombre'];
            $this->usr_apellido = $_POST['apellido'];
            $this->usr_email = $_POST['email'];
            $this->usr_contrasena = sha1($_POST['password']);

            //falta validar que no exista alguien con el mismo email
            if ($_POST ['password'] == $_POST['password_con']){   
                $this->InsertarNuevoUsuario();
            }
            else{
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
