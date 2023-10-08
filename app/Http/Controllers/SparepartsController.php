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
        if (isset($_POST['nueva-categoria'])) 
        {
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
        if (isset($_POST['nombre-repuesto'])) {
       
     $this->repuesto_nombre=$_POST['nombre-repuesto'];
     $this->repuesto_descripcion=$_POST['descripcion-repuesto'];
     $this->prov_empresa=$_POST['prov_empresa-repuesto'];
     $this->categoria_repuesto_descripcion=$_POST['descripcion_categoria-repuesto'];
     $this->respuesto_stock=$_POST['stock-repuesto'];
     $this->repuesto_costo=$_POST['costo-repuesto'];
     $this->repuesto_gan=$_POST['ganancia-repuesto'];
     $this->repuesto_estado=$_POST['estado-repuesto'];
        

        }
    }
    

}


