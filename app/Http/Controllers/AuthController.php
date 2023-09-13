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

        if(isset($_POST['password']) && isset($_POST['email']))
        {
            $this->usr_contrasena = md5($_POST['password']);
            $this->usr_email = $_POST['email'];

            //comprobar email tendria que devolver todos los datos del usuario o 0 false
            $respuesta = $this->ComprobarEmailYPassword();

            /*             
            if($respuesta == 0 )
            {
                echo "<script>alert('usuario o contraseña incorrectos')</script>";
            }
            else
            {
                echo "<script>alert('usuario existe')</script>";
                $_SESSION['USUARIO'] = $respuesta;
                return view('home');
            } */

        }
        return view('authlogin');
    }

    public function register()
    {
        if(isset($_POST['nombre']) &&  isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_con']))
        {
          
            $this->usr_nombre = $_POST['nombre'];
            $this->usr_apellido = $_POST['apellido'];
            $this->usr_email = $_POST['email'];
            $this->usr_contrasena = md5($_POST['password']);

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
