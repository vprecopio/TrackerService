<?php
namespace App\Models;

class SparepartsModel
{
    use \Database, \Sanitize;

    //cambiar en la base de datos por nombres singulares

    //provedores 	
    private $id_proveedor, 	$prov_estado,$prov_empresa,$prov_cuit,$prov_dir,$prov_tel,$prov_email,$prov_web;

    // categoria repuesto 
    private $id_categoria_repuesto,$categoria_repuesto_descripcion;
    
    //Repuestos
    private $id_repuesto,$repuesto_estado,$repuesto_nombre,$repuesto_descripcion,$respuesto_stock,$repuesto_costo,$repuesto_gan; 	

    
    public function __construct()
    {
        $this->Connect();
    }

    public function OneSpare() // Traigo el id del repuesto
    {
        try {
            $sql = "SELECT * FROM `repuestos` WHERE `id_repuesto` = :id_repuesto LIMIT 1";

            $params = [
                ':id_repuesto' => $this->id_repuesto 
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneSupplier() // traigo el id de proveedor
    {
        try {
            $sql = "SELECT * FROM `proveedores` WHERE `id_proveedor` = :id_proveedor LIMIT 1";

            $params = [
                ':id_proveedor' => $this->id_proveedor 
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function OneCategory() //traigo el id de marca categoria

    {
        try {
            $sql = "SELECT * FROM `categorias_repuestos` WHERE `id_categoria_repuesto` = :id_categoria_repuesto LIMIT 1";

            $params = [
                ':id_categoria_repuesto' => $this->id_categoria_repuesto
            ];

            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);

            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListSpareparts()
    {
        try {
            $stm = $this->pdo->prepare(
                "SELECT `repuestos`.`id_repuesto` AS `id_repuesto`, 
                `repuestos`.`repuesto_estado` AS `estado`, `repuestos`.`repuesto_nombre` AS `nombre`, `repuestos`.`repuesto_descripcion` AS `descripcion`, `repuestos`.`repuesto_stock` AS `stock`, `repuestos`.`repuesto_costo` AS `costo`, `repuestos`.`repuesto_gan` AS `ganancia`, `repuestos`.`repuesto_id_provedor` AS `id_proveedor`, `repuestos`.`id_categoria_repuesto` AS `categoria_repuesto`, `categoria`.`categoria_repuesto_descripcion` AS `descripcion_categoria`, `proveedor`.`prov_empresa` AS `prov_empresa`
                FROM `repuestos` AS `repuestos`
                    LEFT JOIN `categorias_repuestos` AS `categoria` ON `repuestos`.`id_categoria_repuesto` = `categoria`.`id_categoria_repuesto` 
                    LEFT JOIN `proveedores` AS `proveedor` ON `repuestos`.`repuesto_id_provedor` = `proveedor`.`id_proveedor`;
                "
            );

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}