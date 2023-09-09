<?php

namespace App\Http\Controllers;
use App\Http\Response;
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
    public function index():Response
    {
        return view('client');
    }

    public function list():Response
    {
        return $this->listClient();
    }

    public function create():Response
    {
        if ($_POST) {
            $this->nombre_completo = $_POST['nombre'];
            $this->email = $_POST['email'];
            $this->telefono = $_POST['telefono'];
            $this->direccion = $_POST['direccion'];
            $this->CreateClient();
            return view('client');
        }

        return view('clientforminsert');
    }

    public function delete():Response
    {
        $this->id = $_GET['Documento'];
        $this->DeleteClient();
        return view('client');
    }

    public function search():Response
    {
        if ($_POST) {
            $this->id = $_POST['id'];
            $this->OneClient();
            redirect('/client/search');
        }

        return view('clientformsearch');
    }

    public function edit():Response
    {
        //cuando el usuario envia el formulario editar
        if ($_POST && isset($_POST['id']) && isset($_POST['Editar'])) 
        {
            $this->id = $_POST['id'];
            $this->nombre_completo = $_POST['nombre'] ?? 'sin datos';
            $this->email = $_POST['email'] ?? 'sin datos';
            $this->telefono = $_POST['telefono'] ?? 'sin datos';
            $this->direccion = $_POST['direccion'] ?? 'sin datos';

            $this->EditClient();

            return view('client');
        }

        //cuando desde cliente se le da click a editar a un usuario de la lista y es redireccionado al formulario 

        if ((isset($_GET['id']) && !empty($_GET['id'])) && !isset($_GET['ok'])) {
            $this->id = $_GET['id'];

            //chekea que el email exista
            if ($this->ExistClient($this->id)) {
                $result = $this->OneClient();
                $result = $result[0];
                $result = [
                    'id' => $result->id_cliente,
                    'nombre' =>  $result->cliente_nombre,
                    'email' =>  $result->cliente_email,
                    'telefono' =>  $result->cliente_telefono,
                    'direccion' =>  $result->cliente_direccion,
                    'ok' => '1'
                ];
                $queryString = http_build_query($result);

                redirect('/client/edit/?' . $queryString, 200);
            } else {
                $this->email = '';
            }
        }

        return view('clientformedit');
    }
}
