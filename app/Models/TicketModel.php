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
}

class TicketModel implements ContratoEstadoTickets, ContratoPrioridades, ContratoValorTicket, ContratoTicket
{
    use \Database,\Sanitize;

    //atributos valor_ticket
    private $id_valor, $valor_servicios, $valor_repuestos ,$valor_ticket_total;

    //atributos estados_tickets
    private $id_estado_ticket, $estado_ticket_descripcion;

    //atributos prioridades
    private $id_prioridad, $prioridad_descripcion;

    //atributos ticket 	
    private $id_ticket, $ticket_fecha_creacion, $ticket_fecha_cierre, $ticket_tiempo_garantia, $ticket_descripcion, $id_usuario, $id_cliente, $id_modelo_equipo; 	

    public function __construct()
    {
        $this->Connect();
    }

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
        JOIN
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
        `id_usuario` = :id_usuario, `id_cliente` = :id_cliente, `id_prioridad` = :id_prioridad, `id_modelo_equipo` = :id_modelo_equipo,`id_valor` = :id_valor
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
            ':id_valor' => 1,
        ];
    
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);  

    }
    public function InsertT()
    {
        $sql= "INSERT INTO `tickets` (`id_ticket`, `ticket_fecha_creacion`, `ticket_fecha_cierre`, `ticket_tiempo_garantia`, `ticket_descripcion`, `id_usuario`, `id_cliente`, `id_estado_ticket`, `id_prioridad`, `id_modelo_equipo`, `id_valor`) VALUES (NULL, '2023-10-08', '2023-10-19', '2023-10-19', 'fdsafdsafdsadfadsf', '1', '10', '1', '1', '1', '1')";

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

}


