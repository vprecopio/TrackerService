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
        // simulacion valores que te vienen por el formulario
        $valor_servicio = '100';
        $valor_repuesto = '200';
        $valor_ticket_total = '300';
        // Fin simulacion

        if(!empty($valor_servicio) && !empty($valor_repuesto) && !empty($valor_ticket_total))
        {
            // cargar los atributos en TicketModel
            $this->valor_servicios = $valor_servicio;   
            $this->valor_repuestos = $valor_repuesto;
            $this->valor_ticket_total = $valor_ticket_total;
            // fin

            $this->InsertVT();
            exit;
        }

    }

    public function editarvalorticket()
    {
        $id_valor_ticket = '3';
        $valor_servicio = '400';
        $valor_repuesto = '200';
        $valor_ticket_total = '600';

        if(!empty($id_valor_ticket) && !empty($valor_servicio) && !empty($valor_repuesto) && !empty($valor_ticket_total))
        {
            $this->id_valor = $id_valor_ticket;

            if(!empty($this->OneVT()))
            {
                $this->valor_servicios = $valor_servicio;  
                $this->valor_repuestos = $valor_repuesto;
                $this->valor_ticket_total = $valor_ticket_total;
        
                $this->EditVT();
               
            }
            else
            {
                echo 'fijate que no existe esa id';
            }
        }
        exit;
    }

    public function eliminartvaloricket()
    {
        
        $id_valor_ticket = '1';
        if(!empty($id_valor_ticket))
        {
            $this->id_valor = $id_valor_ticket; 
            $this->DeleteVT();
            exit;
        }
       
    }

}