<?php

namespace App\Http\Controllers;
use App\Http\Response;
use App\Models\ProveedoresModel;

class ProvController extends ProveedoresModel
{
    public function index():Response
    {
        return view('proveedores');
    }

    public function list():Response
    {
        return $this->ListProveedores();
    }

    public function create()
    {
        
        
        if ($_POST) {
            
            $this->prov_empresa = $_POST['nombre_prov_crear'];
            $this->prov_cuit = $_POST['prov_cuit_crear'];
            $this->prov_dir = $_POST['prov_dir_crear'];
            $this->prov_tel = $_POST['prov_tel_crear'];
            $this->prov_email = $_POST['prov_email_crear'];
            $this->prov_web = $_POST['prov_web_crear'];
            $this->CreateProv();
        }

        redirect('/prov/');
    }

    public function delete():Response
    {
        $this->id = $_GET['Documento'];
        $this->DeleteProv();
        return view('proveedores');
    }

   /* public function search():Response
    {
        if ($_POST) {
            $this->id = $_POST['id'];
            $this->OneProv();
            redirect('/proveedores/search');
        }
        return view('proveedoresformsearch');
    }
    */

    public function edit():Response
    {
        //cuando el usuario envia el formulario editar.....FALTA EDITAR
        if ($_POST && isset($_POST['id_proveedor']) && isset($_POST['Editar'])) 
        {
            $this->id = $_POST['id'];
            $this->nombre_completo = $_POST['nombre'] ?? 'sin datos';
            $this->email = $_POST['email'] ?? 'sin datos';
            $this->telefono = $_POST['telefono'] ?? 'sin datos';
            $this->direccion = $_POST['direccion'] ?? 'sin datos';

            $this->EditProv();

            return view('proveedores');
        }

        return view('proveedores');
    }
}
