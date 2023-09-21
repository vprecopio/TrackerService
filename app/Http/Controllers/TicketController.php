<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;

class TicketController extends TicketModel
{
    public function index()
    {
        return view('ticket');
    }

    public function listvalorticket()
    {
        var_dump($this->ListVT());
        exit;
    }

    public function insertarvalorticket()
    {
        $this->InsertVT();
        exit;
    }

    public function valorticket()
    {
        $this->EditVT();
        exit;
    }

    public function eliminarticket()
    {
        $this->DeleteVT();
        exit;
    }

}