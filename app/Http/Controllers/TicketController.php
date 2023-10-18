<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use App\Models\EquipmentModel;
use App\Models\TicketModel;
use App\Models\UserModel;

use App\Mailer;

class TicketController extends TicketModel
{
    use \CheckInternet;

    private $rol_ok = ['administrador', 'ventas'];

    public function index()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            return view('tickets');
        } else {
            redirect('/');
        }
    }

    public function listvalorticket()
    {
        var_dump($this->ListVT());
        exit;
    }

    public function insertarvalorticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            // simulacion valores que te vienen por el formulario
            $valor_servicio = '100';
            $valor_repuesto = '200';
            $valor_ticket_total = '300';
            // Fin simulacion

            if (!empty($valor_servicio) && !empty($valor_repuesto) && !empty($valor_ticket_total)) {
                // cargar los atributos en TicketModel
                $this->valor_servicios = $valor_servicio;
                $this->valor_repuestos = $valor_repuesto;
                $this->valor_ticket_total = $valor_ticket_total;
                // fin

                $this->InsertVT();
                exit;
            }
        }
        redirect('/ticket');
    }

    public function editarvalorticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            $id_valor_ticket = '3';
            $valor_servicio = '400';
            $valor_repuesto = '200';
            $valor_ticket_total = '600';

            if (!empty($id_valor_ticket) && !empty($valor_servicio) && !empty($valor_repuesto) && !empty($valor_ticket_total)) {
                $this->id_valor = $id_valor_ticket;

                if (!empty($this->OneVT())) {
                    $this->valor_servicios = $valor_servicio;
                    $this->valor_repuestos = $valor_repuesto;
                    $this->valor_ticket_total = $valor_ticket_total;

                    $this->EditVT();
                } else {
                    echo 'fijate que no existe esa id';
                }
            }
            exit;
        }
        redirect('/ticket');
    }

    public function eliminartvaloricket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {

            $id_valor_ticket = '1';
            if (!empty($id_valor_ticket)) {
                $this->id_valor = $id_valor_ticket;
                $this->DeleteVT();
                exit;
            }
        }
        redirect('/ticket');
    }

    //estados_tickets

    public function listestadoticket()
    {
        var_dump($this->ListET());
        exit;
    }

    public function insertarestadoticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            // simulacion valores que te vienen por el formulario
            $estad_ticket_descripcion = $_POST['nuevo-estado'];
            // Fin simulacion

            if (!empty($estad_ticket_descripcion)) {
                // cargar los atributos en TicketModel
                $this->estado_ticket_descripcion = $estad_ticket_descripcion;
                // fin

                $this->InsertET();
                redirect('/ticket');
            }
        }
        redirect('/ticket');
    }

    public function editarestadoticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            $id_estado_ticket = '5';
            $estad_ticket_descripcion = 'ccccc';

            if (!empty($id_estado_ticket) && !empty($estad_ticket_descripcion)) {
                $this->id_estado_ticket = $id_estado_ticket;

                if (!empty($this->OneET())) {
                    $this->estado_ticket_descripcion = $estad_ticket_descripcion;

                    $this->EditET();
                } else {
                    echo 'fijate que no existe esa id';
                }
            }
            exit;
        }
        redirect('/ticket');
    }

    public function eliminarvalorticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {

            $id_estado_ticket = '6';
            if (!empty($id_estado_ticket)) {
                $this->id_estado_ticket = $id_estado_ticket;
                $this->DeleteET();
                exit;
            }
        }
        redirect('/ticket');
    }

    //prioridades

    public function listprioridadticket()
    {
        var_dump($this->ListPrioridad());
        exit;
    }

    public function insertarprioridadticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            // simulacion valores que te vienen por el formulario
            $priorida_descripcion = $_POST['nueva-descripcion'];
            // Fin simulacion

            if (!empty($priorida_descripcion)) {
                // cargar los atributos en TicketModel
                $this->prioridad_descripcion = $priorida_descripcion;
                // fin

                $this->InsertPrioridad();
                redirect('/ticket');
            }
        }
        redirect('/ticket');
    }

    public function editarprioridadticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            $id_prioridad = '4';
            $priorida_descripcion = 'fijate';

            if (!empty($id_prioridad) && !empty($priorida_descripcion)) {
                $this->id_prioridad = $id_prioridad;

                if (!empty($this->OnePrioridad())) {
                    $this->prioridad_descripcion = $priorida_descripcion;

                    $this->EditPrioridad();
                } else {
                    echo 'fijate que no existe esa id';
                }
            }
            exit;
        }
        redirect('/ticket');
    }

    public function eliminarprioridadticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {

            $id_prioridad = '4';
            if (!empty($id_prioridad)) {
                $this->id_prioridad = $id_prioridad;
                $this->DeletePrioridad();
                exit;
            }
        }
        redirect('/ticket');
    }

    public function listarticket()
    {
        var_dump($this->ListT());
        exit;
    }

    public function delete()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            if (isset($_GET["id_ticket"])) {
                $this->id_ticket = $_GET["id_ticket"];
                $this->DeleteT();
            }
            redirect('/ticket/');
        }
        redirect('/ticket');
    }

    public function edit()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            $this->id_ticket = $_POST['id_ticket'];
            $this->ticket_fecha_creacion = $_POST['fecha_creacion'];
            $this->ticket_fecha_cierre = $_POST['fecha_cierre'];
            $this->ticket_tiempo_garantia = $_POST['tiempo_garanti'];
            $this->ticket_descripcion = $_POST['ticket_descripcion'];

            //cliente
            $cliente_model = new ClientModel;
            $cliente_model->email = $_POST['editar_email'];
            $datos_cliente = $cliente_model->OneClientByEmail();

            if (empty($datos_cliente)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_cliente = $datos_cliente[0]->id_cliente;
            }

            //usuario
            $usuario_model = new UserModel;
            $usuario_model->usr_email = $_POST['editar_email_usuario'];
            $datos_email = $usuario_model->OneUserByEmail();

            if (empty($datos_email)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_usuario = $datos_email[0]->id_usuario;
            }

            //equipo
            $equipo_model = new EquipmentModel;
            $equipo_model->modelo_equipo_descripcion = $_POST['editar_modelo'];
            $datos_model = $equipo_model->OneEquipByModel();

            if (empty($datos_model)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_modelo_equipo = $datos_model[0]->id_modelos_equipos;
            }

            //prioridad
            $this->prioridad_descripcion = $_POST['editar_prioridad'];
            $datos_prioridad = $this->OnePrioridadByDescripcion();

            if (empty($datos_prioridad)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_prioridad = $datos_prioridad[0]->id_prioridad;
            }

            //estado tk
            $this->estado_ticket_descripcion = $_POST['editar_estado'];
            $datos_estado = $this->OneETByDescripcion();

            if (empty($datos_estado)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_estado_ticket = $datos_estado[0]->id_estado_ticket;

                $estado_ok= $_POST['editar_estado'] ?? 'nada';
                $email_cliente = $datos_cliente[0]->cliente_email;
                $id_del_equipo = $datos_model[0]->id_modelos_equipos ?? '999';

                //aca tiene que ir para enviarle un email al usuario
                if ($this->hasConnection() && $estado_ok == $datos_estado[0]->estado_ticket_descripcion) {
                    $php_mailer = new Mailer;
                    $php_mailer->ResendTicketClient($email_cliente, 'usuario',$estado_ok,$id_del_equipo, true);
                }
            }

            $this->EditT();

            redirect('/ticket/');

            echo 'correcto';



            //por ahora el valor del ticket va a estar hardcodeado
            //$this->valor_ticket_total = $_POST['editar_valor'];
            //$_POST['Editar'];

            exit;
        }
        redirect('/ticket');
    }

    public function insertarticket()
    {
        if (in_array($_SESSION['TODO'][0]->rol_nombre, $this->rol_ok)) {
            $flag = false;
            //$_POST['editar_valor'];

            $this->ticket_fecha_creacion = $_POST['fecha_creacion_a'];
            $this->ticket_fecha_cierre = $_POST['fecha_cierre_a'];
            $this->ticket_tiempo_garantia = $_POST['fecha_tiempo_garantia_a'];
            $this->ticket_descripcion = $_POST['ticket_descripcion_a'];

            //cliente
            $cliente_model = new ClientModel;
            $cliente_model->email = $_POST['email_cliente_a'];
            $datos_cliente = $cliente_model->OneClientByEmail();

            if (empty($datos_cliente)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_cliente = $datos_cliente[0]->id_cliente;
                $flag = true;
            }

            //usuario
            $usuario_model = new UserModel;
            $usuario_model->usr_email = $_POST['empleado_a'];
            $datos_email = $usuario_model->OneUserByEmail();

            if (empty($datos_email)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_usuario = $datos_email[0]->id_usuario;
                $flag = true;
            }

            //equipo
            $equipo_model = new EquipmentModel;
            $equipo_model->modelo_equipo_descripcion = $_POST['modelo_a'];
            $datos_model = $equipo_model->OneEquipByModel();

            if (empty($datos_model)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_modelo_equipo = $datos_model[0]->id_modelos_equipos;
                $flag = true;
            }

            //prioridad
            $this->prioridad_descripcion = $_POST['prioridad_a'];
            $datos_prioridad = $this->OnePrioridadByDescripcion();

            if (empty($datos_prioridad)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_prioridad = $datos_prioridad[0]->id_prioridad;
                $flag = true;
            }

            //estado tk
            $this->estado_ticket_descripcion = $_POST['estado_a'];
            $datos_estado = $this->OneETByDescripcion();

            if (empty($datos_estado)) {
                echo 'no esta en la base de datos';
                redirect('/ticket/');
            } else {
                $this->id_estado_ticket = $datos_estado[0]->id_estado_ticket;
                $flag = true;
            }
            $this->InsertT();


            //aca tiene que ir para enviarle un email al usuario
            if ($this->hasConnection() && $flag == true) {
                $php_mailer = new Mailer;
                $php_mailer->SendTicketClient($_POST['email_cliente_a'], 'usuario', true);
            }

            redirect('/ticket/');
        }
        redirect('/ticket');
    }
}
