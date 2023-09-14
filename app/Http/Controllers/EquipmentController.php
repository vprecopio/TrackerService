<?php
namespace App\Http\Controllers;

use App\Http\Response;
use App\Models\EquipmentModel;

class EquipmentController extends EquipmentModel
{
    public function index():Response
    {
        return view('equipment');
    }

    public function list():Response
    {
        return $this->ListEquipments();
    }

    public function createbrand()
    {
        
        if(isset($_POST['nueva-marca']))
        {
            $this->marca_descripcion =  trim($_POST['nueva-marca']);
            $this->CreateEquipmentBrand();
        }

        return view('equipment');
    }

    public function createcategory()
    {
        
        if(isset($_POST['nueva-categoria']))
        {
            $this->categoria_equipo_descripcion =  trim($_POST['nueva-categoria']);
            $this->CreateEquipmentCategories();
        }

        return view('equipment');
    }

}
