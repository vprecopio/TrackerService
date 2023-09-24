<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Models\EquipmentModel;

class EquipmentController extends EquipmentModel
{
    public function index(): Response
    {
        return view('equipment');
    }

    public function list(): Response
    {
        return $this->ListEquipments();
    }

    public function createbrand()
    {
        if (isset($_POST['nueva-marca'])) {
            //falta comprobar que esa marca no exista
            $this->marca_descripcion = $_POST['nueva-marca'];

            $id_brand = $this->OneBrand();
            if(empty($id_brand))
            {
                $this->CreateEquipmentBrand();
            }
        }

        return view('equipment');
    }

    public function createcategory()
    {
        if (isset($_POST['nueva-categoria'])) 
        {
            $this->categoria_equipo_descripcion = $_POST['nueva-categoria'];
            $id_category = $this->OneCategory();
            if(empty($id_category))
            {
                $this->CreateEquipmentCategories();
            }
        }

        return view('equipment');
    }

    public function create()
    {
        $this->modelo_equipo_descripcion = $_POST['modelo'];
        $this->marca_descripcion = $_POST['marca'];
        $this->categoria_equipo_descripcion = $_POST['categoria'];

        $id_brand = $this->OneBrand();
        $id_category = $this->OneCategory();

        if(empty($id_brand) && empty($id_category))
        {
            echo 'agrega una marca y categoria';
        }
        else
        {
            $this->id_marca = $id_brand[0]->id_marcas;
            $this->id_categoria_equipo = $id_category[0]->id_categoria_equipo;

            $this->CreateEquipmentModel();

            $id_model = $this->OneModel();
            $this->id_modelo = $id_model[0]->id_modelo;

            $this->CreateEquipments();
        }

        unset($_POST,$id_brand,$id_category,$id_model);
        return view('equipment');
    }

    public function edit()
    {
        if ($_POST['Editar']) {

            $this->id_modelos_equipos = $_POST['equipo'];
            $this->modelo_equipo_descripcion = $_POST['modelo'];
            $this->marca_descripcion = $_POST['marca'];
            $this->categoria_equipo_descripcion = $_POST['categoria'];

            $id_equip = $this->OneEquip();
            $id_model = $this->OneModel();
            $id_brand = $this->OneBrand();
            $id_category = $this->OneCategory();

            if (!empty($id_equip) && !empty($id_brand) && !empty($id_category))
            {
                $this->id_modelos_equipos = $id_equip[0]->id_modelos_equipos;
                $this->id_marca = $id_brand[0]->id_marcas;
                $this->id_categoria_equipo = $id_category[0]->id_categoria_equipo;
                $this->id_modelo = $id_equip[0]->id_modelo;
                $this->EditEquipmentModel();
                $this->EditEquipments();
            } 

            unset($_POST,$id_equip,$id_model,$id_brand,$id_category);
            return view('equipment');
        }
    }
}
