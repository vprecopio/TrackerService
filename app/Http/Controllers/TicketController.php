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
        return view('ticket');
    }
}