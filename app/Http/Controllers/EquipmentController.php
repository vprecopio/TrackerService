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

}
