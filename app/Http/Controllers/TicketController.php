<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;

class TicketController extends TicketModel
{
    public function index()
    {
        return view('tickets');
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

    //estados_tickets

    public function listestadoticket()
    {
        var_dump($this->ListET());
        exit;
    }

    public function insertaretadoticket()
    {
        // simulacion valores que te vienen por el formulario
        $estad_ticket_descripcion = $_POST['nuevo-estado'];
        // Fin simulacion

        if(!empty($estad_ticket_descripcion))
        {
            // cargar los atributos en TicketModel
            $this->estado_ticket_descripcion = $estad_ticket_descripcion;   
            // fin

            $this->InsertET();
            redirect('/ticket');
        }

    }

    public function editarestadoticket()
    {
        $id_estado_ticket = '5';
        $estad_ticket_descripcion = 'ccccc';

        if(!empty($id_estado_ticket) && !empty($estad_ticket_descripcion))
        {
            $this->id_estado_ticket = $id_estado_ticket;

            if(!empty($this->OneET()))
            {
                $this->estado_ticket_descripcion = $estad_ticket_descripcion;
        
                $this->EditET();
               
            }
            else
            {
                echo 'fijate que no existe esa id';
            }
        }
        exit;
    }

    public function eliminarvalorticket()
    {
        
        $id_estado_ticket = '6';
        if(!empty($id_estado_ticket))
        {
            $this->id_estado_ticket = $id_estado_ticket; 
            $this->DeleteET();
            exit;
        }
       
    }

    //prioridades

    public function listprioridadticket()
    {
        var_dump($this->ListPrioridad());
        exit;
    }

    public function insertarprioridadticket()
    {
        // simulacion valores que te vienen por el formulario
        $priorida_descripcion = $_POST['nueva-descripcion'];
        // Fin simulacion

        if(!empty($priorida_descripcion))
        {
            // cargar los atributos en TicketModel
            $this->prioridad_descripcion= $priorida_descripcion;   
            // fin

            $this->InsertPrioridad();
            redirect('/ticket');
        }

    }

    public function editarprioridadticket()
    {
        $id_prioridad = '4';
        $priorida_descripcion = 'fijate';

        if(!empty($id_prioridad) && !empty($priorida_descripcion))
        {
            $this->id_prioridad= $id_prioridad;

            if(!empty($this->OnePrioridad()))
            {
                $this->prioridad_descripcion = $priorida_descripcion;
        
                $this->EditPrioridad();
               
            }
            else
            {
                echo 'fijate que no existe esa id';
            }
        }
        exit;
    }

    public function eliminarprioridadticket()
    {
        
        $id_prioridad = '4';
        if(!empty($id_prioridad))
        {
            $this->id_prioridad = $id_prioridad; 
            $this->DeletePrioridad();
            exit;
        }
       
    }

    public function listarticket()
    {
        var_dump($this->ListT());
        exit;
    }

    public function delete()
    {
        if(!isset($_GET["id_ticket"]))
        {
        $this->id_ticket = $_GET["id_ticket"];
        $this->DeleteT();
        redirect('/ticket/');
        }
    }

    public function edit()
    {
        $this->ticket_fecha_creacion = $_POST['fecha_creacion'];
        $this->ticket_fecha_cierre = $_POST['fecha_cierre'] ;
        $this->ticket_tiempo_garantia = $_POST['tiempo_garanti']; 
        $this->ticket_descripcion = $_POST['ticket_descripcion'];
        $id_usuario = $_POST['editar_nombre'] ;
        $id_cliente = $_POST['editar_email'];
        $this->valor_ticket_total = $_POST['editar_valor'] ;
        $this->prioridad_descripcion = $_POST['editar_prioridad'];
        $id_modelo_equipo = $_POST['editar_modelo'];
        $this->estado_ticket_descripcion = $_POST['editar_estado'] ;
        $this->id_ticket = $_POST['id_ticket'] ;
        //$_POST['Editar'];

        exit;
    }

}