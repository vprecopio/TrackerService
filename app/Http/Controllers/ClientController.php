<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;

interface Crud
{
    public function index();
    public function list();
    public function create();
    public function delete();
}

class ClientController extends ClientModel implements Crud
{
    public function index()
    {
        return view('client');
    }

    public function list()
    {
        return $this->listClient();
    }

    public function create()
    {
        if ($_POST) {
            $this->nombre_completo = $_POST['nombre'];
            $this->email = $_POST['email'];
            $this->telefono = $_POST['telefono'];
            $this->direccion = $_POST['direccion'];
            $this->CreateClient();
            redirect('/client');
        }

        return view('clientforminsert');
    }

    public function delete()
    {
        $this->id = $_GET['Documento'];
        $this->DeleteClient();
        redirect('/client');
    }

    public function search()
    {
        if($_POST)
        {
            $this->id = $_POST['id'];
            $this->OneClient();
            redirect('/client/search');
        }

        return view('clientformsearch');
    }

    public function edit()
    {
        //cuando el usuario envia el formulario editar
        if($_POST && $_POST['Editar'] && $_POST['email'])
        {
            $this->nombre_completo = $_POST['nombre'] ?? 'sin datos';
            $this->email = $_POST['email'] ?? 'sin datos';
            $this->telefono = $_POST['telefono'] ?? 'sin datos';
            $this->direccion = $_POST['direccion'] ?? 'sin datos';
        }

        //cuando desde cliente se le da click a editar a un usuario de la lista y es redireccionado al formulario 

        if
        ( 
            (isset($_GET['email']) && !empty($_GET['email']))
            &&
            !isset($_GET['ok'])
        )
        {
            $this->email = $_GET['email'];

            //chekea que el email exista
            if($this->ExistClient($this->email))
            {
                $result = $this->OneClientByEmail();
                $result = $result[0];
                $result = [
                    'nombre' =>  $result->cliente_nombre,
                    'email' =>  $result->cliente_email,
                    'telefono' =>  $result->cliente_telefono,
                    'direccion' =>  $result->cliente_direccion,
                    'ok' => '1'
                ];
                $queryString = http_build_query($result);
                 
                redirect('/client/edit/?' . $queryString ,200);
            }
            else
            {
                $this->email = '';
            }
        }

        return view('clientformedit');
    }
}
