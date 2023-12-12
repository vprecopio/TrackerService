<?php

namespace App\Models;

interface ContratoEstadoTickets
{
    public function ListET();
    public function EditET();
    public function InsertET();
    public function DeleteET();
    public function OneET();
    public function OneETByDescripcion();
}

interface ContratoPrioridades
{
    public function ListPrioridad();
    public function EditPrioridad();
    public function InsertPrioridad();
    public function DeletePrioridad();
    public function OnePrioridad();
    public function OnePrioridadByDescripcion();
    public function editUsuarioAsignado();
}

interface ContratoValorTicket
{
    public function ListVT();
    public function EditVT();
    public function InsertVT();
    public function DeleteVT();
    public function OneVT();
}

interface ContratoTicket
{
    public function ListT();
    public function EditT();
    public function InsertT();
    public function DeleteT();
    public function OneT();
    public function OneTT();
}

class TicketModel implements ContratoEstadoTickets, ContratoPrioridades, ContratoValorTicket, ContratoTicket
{
    use \Database, \Sanitize;


    //atributos valor_ticket
    private $id_valor = null, $valor_servicios, $valor_repuestos, $valor_ticket_total, $usuario_asignado;

    //atributos estados_tickets
    private $id_estado_ticket, $estado_ticket_descripcion;

    //atributos prioridades
    private $id_prioridad, $prioridad_descripcion;

    //atributos ticket 	
    private $id_ticket, $ticket_fecha_creacion, $ticket_fecha_cierre, $ticket_tiempo_garantia, $ticket_descripcion, $id_usuario, $id_cliente, $id_modelo_equipo;

    private $ticket_valor = null;


    public function __construct()
    {
        $this->Connect();
    }


    //se agrego el setidticket trae el dato del ticket del formulario y lo vuelve una variable miercoles a la madrugada
    public function setIdTicket($idTicket)
    {
        $this->id_ticket = $idTicket;
    }

    public function setUsuarioAsignado($nuevoUsuarioAsignado)
    {
        $this->usuario_asignado = $nuevoUsuarioAsignado;
    }
    //se agrego editusuarioasignado donde edita la tabla tickets para el propio usuario que esta logeado miercoles a la madrugada
    public function editUsuarioAsignado()
    {
        try {
            //esto se agrego el jueves a la madrugada 
            // Convertir $this->usuario_asignado a entero
            $usuarioAsignado = (int)$this->usuario_asignado;
            $estado = 3;
            $query = $this->prepare('UPDATE tickets 
            SET usuario_asignado = :usuario_asignado,
                id_estado_ticket = :id_estado_ticket
            WHERE id_ticket = :idTicket');

            $query->execute([
                'idTicket' => $this->id_ticket,
                'usuario_asignado' => $usuarioAsignado,
                'id_estado_ticket' => $estado
            ]);


            return true;
        } catch (\PDOException $e) {
            // Mostrar un mensaje más detallado del error
            echo 'Error al actualizar el ticket: ' . $e->getMessage();
            return false;
        }
    }

    public function editUsuarioAsignado2()
    {
        try {
            //esto se agrego el jueves a la madrugada 
            // Convertir $this->usuario_asignado a entero
            $usuarioAsignado = (int)$this->usuario_asignado;
            $estado = 6;
            $query = $this->prepare('UPDATE tickets 
            SET usuario_asignado = :usuario_asignado,
                id_estado_ticket = :id_estado_ticket
            WHERE id_ticket = :idTicket');

            $query->execute([
                'idTicket' => $this->id_ticket,
                'usuario_asignado' => $usuarioAsignado,
                'id_estado_ticket' => $estado
            ]);


            return true;
        } catch (\PDOException $e) {
            // Mostrar un mensaje más detallado del error
            echo 'Error al actualizar el ticket: ' . $e->getMessage();
            return false;
        }
    }

    //se agrego el ticket exist donde verifica si el ticket correspondiente existe miercoles a la madrugada    
    private function ticketExists()
    {
        $sql = "SELECT COUNT(*) FROM tickets WHERE id_ticket = :idTicket";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':idTicket', $this->id_ticket);
        $stm->execute();

        return $stm->fetchColumn() > 0;
    }
    //hasta aca 

    public function ListVT()
    {
        // a la izquierda del join el nombre de la tabla foranea(traer todos los datos que corresponde al id dentro de tu tabla principal)

        try {
            $stm = $this->pdo->prepare("SELECT * FROM `valor_ticket` ");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertVT()
    {
        $sql = "INSERT INTO `valor_ticket` (`valor_servicios`, `valor_repuestos`, `valor_ticket_total`) VALUES (:ValorServicio, :ValorRepuesto, :ValorDelTicket)";

        $params = [
            ':ValorServicio' => $this->valor_servicios,
            ':ValorRepuesto' => $this->valor_repuestos,
            ':ValorDelTicket' => $this->valor_ticket_total,
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function EditVT()
    {

        try {
            $sql = "UPDATE `valor_ticket` 
             SET `valor_servicios` = :nuevo_valor_servicio, `valor_repuestos` = :nuevo_valor_repuesto, `valor_ticket_total` = :nuevo_valor_ticket_total 
             WHERE `valor_ticket`.`id_valor` = :id_valor ";

            $stm = $this->pdo->prepare($sql);

            // Asignar valores a los marcadores de posición 
            $stm->bindParam(':id_valor', $this->id_valor);
            $stm->bindParam(':nuevo_valor_servicio', $this->valor_servicios);
            $stm->bindParam(':nuevo_valor_repuesto', $this->valor_repuestos);
            $stm->bindParam(':nuevo_valor_ticket_total', $this->valor_ticket_total);

            // Ejecutar la consulta
            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function DeleteVT()
    {
        try {
            $sql = "DELETE FROM valor_ticket WHERE `valor_ticket`.`id_valor` = :id_valor";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_valor', $this->id_valor, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneVT()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM valor_ticket WHERE `valor_ticket`.`id_valor` = :id_valor");
            $stm->bindParam(':id_valor', $this->id_valor, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /* Seccion estados_tickets*/
    public function ListET()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM `estados_tickets` ");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function EditET()
    {
        try {
            $sql = "UPDATE `estados_tickets` 
            SET `estado_ticket_descripcion` = :nuevo_estado_ticket_descripcion
            WHERE `estados_tickets`.`id_estado_ticket` = :id_estado_ticket ";

            $stm = $this->pdo->prepare($sql);

            // Asignar valores a los marcadores de posición 
            $stm->bindParam(':id_estado_ticket', $this->id_estado_ticket);
            $stm->bindParam(':nuevo_estado_ticket_descripcion', $this->estado_ticket_descripcion);

            // Ejecutar la consulta
            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function InsertET()
    {
        $sql = "INSERT INTO `estados_tickets` (`estado_ticket_descripcion`) VALUES (:estad_ticket_descripcion)";
        $params = [
            ':estad_ticket_descripcion' => $this->estado_ticket_descripcion,
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }
    public function DeleteET()
    {
        try {
            $sql = "DELETE FROM estados_tickets WHERE `estados_tickets`.`id_estado_ticket` = :id_estado_ticket";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_estado_ticket', $this->id_estado_ticket, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function OneET()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM estados_tickets WHERE `estados_tickets`.`id_estado_ticket` = :id_estado_ticket");
            $stm->bindParam(':id_estado_ticket', $this->id_estado_ticket, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneETByDescripcion()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM estados_tickets WHERE `estados_tickets`.`estado_ticket_descripcion` = :estado_ticket_descripcion");
            $stm->bindParam(':estado_ticket_descripcion', $this->estado_ticket_descripcion, \PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /* Fin estados_tickets*/


    /* Seccion prioridades*/
    public function ListPrioridad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM `prioridades` ");
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function EditPrioridad()
    {
        try {
            $sql = "UPDATE `prioridades` 
            SET `prioridad_descripcion` = :nuevo_prioridad_descripcion
            WHERE `prioridades`.`id_prioridad` = :id_prioridad ";

            $stm = $this->pdo->prepare($sql);

            // Asignar valores a los marcadores de posición 
            $stm->bindParam(':id_prioridad', $this->id_prioridad);
            $stm->bindParam(':nuevo_prioridad_descripcion', $this->prioridad_descripcion);

            // Ejecutar la consulta
            $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertPrioridad()
    {
        $sql = "INSERT INTO `prioridades` (`prioridad_descripcion`) VALUES (:priorida_descripcion)";
        $params = [
            ':priorida_descripcion' => $this->prioridad_descripcion,
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function DeletePrioridad()
    {
        try {
            $sql = "DELETE FROM prioridades WHERE `prioridades`.`id_prioridad` = :id_prioridad";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_prioridad', $this->id_prioridad, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OnePrioridad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM prioridades WHERE `prioridades`.`id_prioridad` = :id_prioridad");
            $stm->bindParam(':id_prioridad', $this->id_prioridad, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OnePrioridadByDescripcion()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM prioridades WHERE `prioridades`.`prioridad_descripcion` = :prioridad_descripcion");
            $stm->bindParam(':prioridad_descripcion', $this->prioridad_descripcion, \PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /* Fin prioridades*/

    /*Inicio de ticket*/
    public function ListT()
    {
        $sql_ejemplo = "SELECT *, 
        (SELECT descripcion FROM equipos_modelo WHERE equipos_modelo.id_modelo = modelos_equipos.id_modelo) AS ModeloEquipo
        FROM
        tickets
        LEFT JOIN
        valor_ticket ON valor_ticket.id_valor = tickets.id_valor
        JOIN
        usuarios ON usuarios.id_usuario = tickets.id_usuario
        JOIN
        clientes ON clientes.id_cliente = tickets.id_cliente
        JOIN 
        estados_tickets ON estados_tickets.id_estado_ticket = tickets.id_estado_ticket
        JOIN
        prioridades ON prioridades.id_prioridad = tickets.id_prioridad
        JOIN
        modelos_equipos ON modelos_equipos.id_modelos_equipos = tickets.id_modelo_equipo   
        
        ";
        try {
            $stm = $this->pdo->prepare($sql_ejemplo);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function EditT()
    {
        $sql = "UPDATE `tickets` 
        SET 
        `ticket_fecha_creacion` = :ticket_fecha_creacion, 
        `ticket_fecha_cierre` = :ticket_fecha_cierre, 
        `ticket_tiempo_garantia` = :ticket_tiempo_garantia, 
        `ticket_descripcion` = :ticket_descripcion, 
        `id_usuario` = :id_usuario, 
        `id_cliente` = :id_cliente, 
        `id_prioridad` = :id_prioridad, 
        `id_modelo_equipo` = :id_modelo_equipo,
        `id_estado_ticket` = :id_estado_ticket,
        `id_valor` = :id_valor,
        `ticket_valor` = :ticket_valor
        WHERE `id_ticket` = :id_ticket";

        $params = [
            ':id_ticket' => $this->id_ticket,
            ':ticket_fecha_creacion' => $this->ticket_fecha_creacion,
            ':ticket_fecha_cierre' => $this->ticket_fecha_cierre,
            ':ticket_tiempo_garantia' => $this->ticket_tiempo_garantia,
            ':ticket_descripcion' => $this->ticket_descripcion,
            ':id_usuario' => $this->id_usuario,
            ':id_cliente' => $this->id_cliente,
            ':id_prioridad' => $this->id_prioridad,
            ':id_modelo_equipo' => $this->id_modelo_equipo,
            ':id_estado_ticket' => $this->id_estado_ticket,
            ':id_valor' => $this->id_valor,
            ':ticket_valor' => $this->ticket_valor,
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }
    public function InsertT()
    {
        $sql = "INSERT INTO 
        `tickets` 
        (`ticket_fecha_creacion`, `ticket_fecha_cierre`, `ticket_tiempo_garantia`, `ticket_descripcion`, `id_usuario`, `id_cliente`, `id_estado_ticket`, `id_prioridad`, `id_modelo_equipo`, `id_valor`,`ticket_valor`) 
        VALUES (:fechacreacion, :fechacierre, :tiempogarantia, :descripcion, :usuario, :cliente, :estadoticket, :prioridad, :modeloequipo, :valor, :ticket_valor)";
        $params = [
            ':fechacreacion' => $this->ticket_fecha_creacion,
            ':fechacierre' => $this->ticket_fecha_cierre,
            ':tiempogarantia' => $this->ticket_tiempo_garantia,
            ':descripcion' => $this->ticket_descripcion,
            ':usuario' => $this->id_usuario,
            ':cliente' => $this->id_cliente,
            ':estadoticket' => $this->id_estado_ticket,
            ':prioridad' => $this->id_prioridad,
            ':modeloequipo' => $this->id_modelo_equipo,
            ':valor' => $this->id_valor,
            ':ticket_valor' => $this->ticket_valor,
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }
    public function DeleteT()
    {
        $sql = "DELETE FROM tickets WHERE `tickets`.`id_ticket` = :id_ticket";
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id_ticket', $this->id_ticket, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        exit;
    }
    public function OneT()
    {
        $sql = "SELECT * FROM `tickets` WHERE `tickets`.`id_ticket` = 1";
    }

    //se agrego el oneTT verifica si un ticket existe miercoles a la madrugada
    public function OneTT()
    {
        try {
            $sql = "SELECT * FROM tickets WHERE id_ticket = :idTicket";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':idTicket', $this->id_ticket);
            $stm->execute();

            // Verificar si hay al menos una fila en el resultado
            $result = $stm->fetchAll();
            if (count($result) > 0) {
                // Devolver el resultado
                return $result;
            } else {
                // Devolver NULL si no hay resultados
                return NULL;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    //hasta aca


    public function allTk()
    {

        $sql = "SELECT *, (SELECT marca_descripcion FROM equipos_marca WHERE equipos_marca.id_marcas = modelos_equipos.id_marca) AS equipo_marca, (SELECT descripcion FROM equipos_modelo WHERE equipos_modelo.id_modelo = modelos_equipos.id_modelo) AS equipo_modelo FROM tickets JOIN clientes ON tickets.id_cliente = clientes.id_cliente JOIN estados_tickets ON tickets.id_estado_ticket = estados_tickets.id_estado_ticket JOIN modelos_equipos ON tickets.id_modelo_equipo = modelos_equipos.id_modelos_equipos";

        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function getTicketsByUserId($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tickets WHERE id_usuario = :id_usuario");
            $stm->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}