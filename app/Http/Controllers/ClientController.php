<?php

namespace App\Http\Controllers;
use App\Http\Response;
use App\Models\ClientModel;

class ClientController extends ClientModel
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
            redirect('/client/');
        }

        return view('client');
    }

    public function delete():Response
    {
        $this->id = $_GET['Documento'];
        $this->DeleteClient();
        redirect('/client/');
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

            redirect('/client/');
        }

        return view('client');
    }
}
