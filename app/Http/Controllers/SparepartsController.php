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
                $this->CreateEquipmentCategories();
            }
        }
        
        redirect('/spareparts/');
    }
}
