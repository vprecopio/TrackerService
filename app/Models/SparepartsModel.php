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