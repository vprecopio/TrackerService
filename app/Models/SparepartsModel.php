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
            $sql = "SELECT * FROM `repuestos` WHERE `repuesto_nombre` = :id_repuesto LIMIT 1";

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
            $sql = "SELECT * FROM `proveedores` WHERE `prov_empresa` = :prov_empresa_a_buscar LIMIT 1";

            $params = [
                ':prov_empresa_a_buscar' => $this->prov_empresa 
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
            $sql = "SELECT * FROM `categorias_repuestos` WHERE `categoria_repuesto_descripcion` = :categoria_repuesto_descripcion LIMIT 1";

            $params = [
                ':categoria_repuesto_descripcion' => $this->categoria_repuesto_descripcion
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

    public function CreateSpareModel()
    {
        $sql = "INSERT INTO `repuestos` ( `repuesto_estado`, `repuesto_nombre`, `repuesto_descripcion`, `repuesto_id_provedor`, `repuesto_stock`, `repuesto_costo`, `repuesto_gan`, `id_categoria_repuesto`) VALUES (:repuesto_estado,:repuesto_nombre,:repuesto_descripcion,:repuesto_id_provedor,:repuesto_stock,:repuesto_costo,:repuesto_gan,:id_categoria_repuesto)"; 
        
        $params = [
            ':repuesto_estado' => $this->repuesto_estado,
            ':repuesto_nombre' => $this->repuesto_nombre,
            ':repuesto_descripcion' => $this->repuesto_descripcion,
            ':repuesto_id_provedor' => $this->id_proveedor,
            ':repuesto_stock' => $this->respuesto_stock,
            ':repuesto_costo' => $this->repuesto_costo,
            ':repuesto_gan' => $this->repuesto_gan,
            ':id_categoria_repuesto' => $this->id_categoria_repuesto,
        ];
    
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);  
    }


    public function CreateSpareCategory()
    {
        $sql = "INSERT INTO `categorias_repuestos` (`categoria_repuesto_descripcion`)  VALUES (:categoria_repuesto_descripcion)";

        $params = [
            ':categoria_repuesto_descripcion' => $this->categoria_repuesto_descripcion,
        ];
    
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);  
    }

    public function DeleteSpareparts() //elimina el repuesto
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM `repuestos` WHERE `repuestos`.`id_repuesto` = :id_repuesto");
            $stm->bindParam(':id_repuesto', $this->id_repuesto, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
      
    }

    // Edito Repuesto
   
    public function EditSpareparts()
    {
        $sql = "UPDATE `repuestos` SET `repuesto_nombre`=:repuesto_nombre, `repuesto_descripcion`=:repuesto_descripcion, `repuesto_stock`=:repuesto_stock, 'repuesto_costo'=:repuesto_costo, 'repuesto_gan'=:repuesto_gan, 'repuesto_id_provedor'=:repuesto_id_provedor,'id_categoria_repuesto'=:id_categoria_repuesto,'repuesto_estado'=:repuesto_estado WHERE `repuestos`.`id_repuesto`=:id_repuesto";
        $params = [
            ':repuesto_estado' => $this->repuesto_estado,
            ':repuesto_nombre' => $this->repuesto_nombre,
            ':repuesto_descripcion' => $this->repuesto_descripcion,
            ':repuesto_id_provedor' => $this->id_proveedor,
            ':repuesto_stock' => $this->respuesto_stock,
            ':repuesto_costo' => $this->repuesto_costo,
            ':repuesto_gan' => $this->repuesto_gan,
            ':id_categoria_repuesto' => $this->id_categoria_repuesto
        ];

        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
        
    }
    public function ListCategorias() //Listo la categorias de repuestos
    {
        try {
            $stm = $this->pdo->prepare(
                "SELECT `categoria_repuestos`.`categoria_repuesto_descripcion` AS `nombre_categoria`
                FROM `categorias_repuestos` AS `categoria_repuestos`;"
            );

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function ListProveedores() //listo proveedores
    {
        try {
            $stm = $this->pdo->prepare(
                "SELECT `proveedores`.`prov_empresa` AS `nombre_prov`
                FROM `proveedores` AS `proveedores`;"
            );

            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }



}