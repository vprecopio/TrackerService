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
}
