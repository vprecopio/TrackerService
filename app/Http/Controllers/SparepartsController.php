<?php

namespace App\Http\Controllers;

use App\Models\SparepartsModel;

class SparepartsController extends SparepartsModel
{
    public function index()
    {
        return view('spareparts');
    }

    public function list()
    {
        exit;
    }

    public function createsparecateg()
    {

        if (isset($_POST['categoria-descripcion'])) 
        {
            $this->categoria_repuesto_descripcion = $_POST['categoria-descripcion'];
            $id_category = $this->OneCategory();

            if (empty($id_category))
            {
                $this->CreateSpareCategory();
            }
        }

        redirect('/spareparts/');
    }


    public function createspareparts()
    {
        if (isset($_POST['nombre-repuesto'])) 
        {

            $this->repuesto_nombre = $_POST['nombre-repuesto'];
            $this->repuesto_descripcion = $_POST['descripcion-repuesto'];
            $this->prov_empresa = $_POST['prov_empresa-repuesto'];
            $this->categoria_repuesto_descripcion = $_POST['descripcion_categoria-repuesto'];
            $this->respuesto_stock = $_POST['stock-repuesto'];
            $this->repuesto_costo = $_POST['costo-repuesto'];
            $this->repuesto_gan = $_POST['ganancia-repuesto'];
            $this->repuesto_estado = $_POST['estado-repuesto'];

            $id_category = $this->OneCategory();
            $id_proveedor = $this->OneSupplier();

            if (empty($id_proveedor || empty($id_category))) {
                echo 'agrega un proveedor y categoria';
            } 
            else     
            {
                $this->id_proveedor = $id_proveedor[0]->id_proveedor;
                $this->id_categoria_repuesto = $id_category[0]->id_categoria_repuesto;
                $this->CreateSpareModel();
            }
        }

        redirect('/spareparts/');
    }

    public function delete() //elimina el repuesto
    {
        $this->id_repuesto = $_GET['id_repuesto'];
        $this->DeleteSpareparts();
        return view('spareparts');
    }

    public function edit()
    {
        if ($_POST['Editar']) {

            echo '<pre>';
            print_r($_POST);exit;
            
            $this->repuesto_nombre = $_POST['repuesto'];
            $this->repuesto_descripcion = $_POST['descripcion'];
            $this->prov_empresa = $_POST['proveedor'];
            $this->categoria_repuesto_descripcion = $_POST['categoria'];
            $this->respuesto_stock = $_POST['stock'];
            $this->repuesto_costo = $_POST['costo'];
            $this->repuesto_gan = $_POST['ganancia'];
            $this->repuesto_estado = $_POST['estado-repuesto'];

            

           if (!empty($repuesto_nombre) && !empty($repuesto_descripcion)) {
       
                $this->EditSpareparts();
                
            }
            
        }
        unset($_POST,$id_repuesto);
        return view('spareparts');
    }
}
