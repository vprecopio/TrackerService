<?php

namespace App\Models;

interface ContratoEstadoTickets
{
    public function ListET();
    public function EditET();
    public function InsertET();
    public function DeleteET();
    public function OneET();
}

interface ContratoPrioridades
{
    public function ListPrioridad();
    public function EditPrioridad();
    public function InsertPrioridad();
    public function DeletePrioridad();
    public function OnePrioridad();
}


class TicketModel implements ContratoEstadoTickets, ContratoPrioridades
{
    use \Database,\Sanitize;

    //atributos valor_ticket
    private $id_valor, $valor_servicios, $valor_repuestos ,$valor_ticket_total;

    //atributos estados_tickets
    private $id_estado_ticket, $estado_ticket_descripcion;

    //atributos prioridades
    private $id_prioridad, $prioridad_descripcion;

    public function __construct()
    {
        $this->Connect();
    }

    public function ListVT()
    {
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
            SET `estado_ticket descripcion` = :nuevo_estado_ticket_descripcion
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
            $stm->bindParam(':id_estado_ticket', $this->id_valor, \PDO::PARAM_INT);
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
            $stm->bindParam(':id_estado_ticket', $this->id_valor, \PDO::PARAM_INT);
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
        $sql = "INSERT INTO `prioridad` (`prioridad_descripcion`) VALUES (:priorida_descripcion)"; 
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
            $stm->bindParam(':id_prioridad', $this->id_valor, \PDO::PARAM_INT);
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
            $stm->bindParam(':id_prioridad', $this->id_valor, \PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    /* Fin prioridades*/

}


