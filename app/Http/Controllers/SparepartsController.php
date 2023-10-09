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
        if (isset($_POST['nueva-categoria'])) {
            $this->categoria_equipo_descripcion = $_POST['nueva-categoria'];
            $id_category = $this->OneCategory();

            if (empty($id_category)) {
                $this->createsparecateg();
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

            $id_spare = $this->OneSpare();
            $id_category = $this->OneCategory();
            $id_proveedor = $this->OneSupplier();

            if (empty($id_proveedor && empty($id_category))) {
                echo 'agrega un proveedor y categoria';
            } else 
                {
                $this->id_proveedor = $id_proveedor[0]->id_proveedor;
                $this->id_category = $id_category[0]->id_categoria_repuesto;

                $this->CreateSparetModel();

                $id_spare = $this->OneSpare();
                $this->id_spare = $id_repuesto[0]->id_spare;

                $this->createspareparts();
            }
        }
    }
}
