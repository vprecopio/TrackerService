<?php

namespace App\Models;

class TicketModel
{
    use \Database,\Sanitize;

    //atributos valor_ticket
    private $id_valor, $valor_servicios, $valor_repuestos ,$valor_ticket_total;

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


}


