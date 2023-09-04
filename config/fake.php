<?php
namespace App\Config;

require_once __DIR__ . '/../vendor/autoload.php';
use App\Config\Database;

define('ROL_USER',['administrador','tecnico','ventas']);
define('TK_STATUS',['por asignar', 'asignado', 'en proceso', 'entregado']);
define('TK_PRIORITY',['alta', 'baja', 'media']);


class Falso
{
    use Database;

    protected $flag = TRUE;
    protected $faker;

    public function __CONSTRUCT()
    {
        $this->Connect();
        $this->faker = \Faker\Factory::create();
    }

    protected function flag()
    {
        if ($this->flag)
            echo 'Los datos falsos en '.get_class($this).' fueron insertados en la base de datos.';
        else
            echo 'PROBLEMA en '.get_class($this).' o la base de datos o en la consulta.';
    }
}

/**
 * 
 * Seccion Clientes
 * 
 */
class ClientFake extends Falso
{
    //inserta solo un cliente falso en la base de datos
    private function insertOne()
    {
        $a = $this->faker->name();
        $b = $this->faker->unique()->safeEmail;
        $c = $this->faker->phoneNumber;
        $d = $this->faker->streetAddress;

        try {
            $stm =  $this->pdo->prepare("INSERT INTO `clientes` (`cliente_nombre`, `cliente_email`, `cliente_telefono`, `cliente_direccion`) VALUES (:nombres, :email, :telefono, :direccion)");
            $stm->bindParam(':nombres', $a, \PDO::PARAM_STR, 100);
            $stm->bindParam(':email', $b, \PDO::PARAM_STR, 100);
            $stm->bindParam(':telefono', $c, \PDO::PARAM_STR, 100);
            $stm->bindParam(':direccion', $d, \PDO::PARAM_STR, 100);
            $stm->execute();
        } catch (\Exception) {
            $this->flag = FALSE;
        }
    }

    //inserta muchos clientes falsos en la base de datos, para ingresar mas datos modificar el atributo $cant
    private function insertMany(int $cant)
    {
        for ($i = 0; $i < $cant; $i++) {
            $this->insertOne();
        }
    }

    public function insert(int $cant = 1)
    {
        $this->insertMany($cant);
        $this->flag();
    }
}

/**
 * 
 * Seccion Usuarios
 * 
 */
//Primero debe ejecutarse RolUser y luego UserFake
class RolUser extends Falso
{
    //inserta solo un rol en la tabla roles
    private function insertOne($rol)
    {
        $a = $rol;
        $b = $this->faker->sentence(3);
        $c = 1;

        try {
            $stm =  $this->pdo->prepare("INSERT INTO `roles` (`rol_nombre`, `rol_descripcion`, `rol_estado`) VALUES (:nombre, :descripcion, :estado)");
            $stm->bindParam(':nombre', $a, \PDO::PARAM_STR, 32);
            $stm->bindParam(':descripcion', $b, \PDO::PARAM_STR, 100);
            $stm->bindParam(':estado', $c, \PDO::PARAM_INT, 1);
            $stm->execute();
        } catch (\Exception) {
            $this->flag = FALSE;
        }
    }

    private function insertMany($array)
    {       

        foreach($array as $rol)
        {
            $this->insertOne($rol);
        }
    }

    public function insert($array)
    {
        $this->insertMany($array);
        $this->flag();
    }

}
class UserFake extends Falso
{
    //inserta solo un usuario falso en la base de datos solo y solo si existen roles en la base de datos
    private function insertOne($i)
    {
        $a = $this->faker->firstname;
        $b = $this->faker->lastName;
        $c = $this->faker->unique()->safeEmail;
        $d = 2345;
        $e = 1;
        $f = $i + 1;
        if($f>count(ROL_USER))
        {
            $f=1;
        }

        try {
            $stm =  $this->pdo->prepare("INSERT INTO `usuarios` (`usr_nombre`, `usr_apellido`, `usr_email`, `usr_contrasena`,`usr_estado`,`id_rol`) 
            VALUES (
                :nombre, 
                :apellido, 
                :email, 
                :contrasena, 
                :estado,
                :id_rol)
            ");
            $stm->bindParam(':nombre', $a, \PDO::PARAM_STR, 100);
            $stm->bindParam(':apellido', $b, \PDO::PARAM_STR, 100);
            $stm->bindParam(':email', $c, \PDO::PARAM_STR, 100);
            $stm->bindParam(':contrasena', $d, \PDO::PARAM_STR, 100);
            $stm->bindParam(':estado', $e, \PDO::PARAM_STR, 100);
            $stm->bindParam(':id_rol', $f, \PDO::PARAM_STR, 100);
            $stm->execute();
        } catch (\Exception) {
            $this->flag = FALSE;
        }
    }

    private function insertMany(int $cant)
    {
        for ($i = 0; $i < $cant; $i++) {
            $this->insertOne($i);
        }
    }

    public function insert(int $cant = 1)
    {
        $this->insertMany($cant);
        $this->flag();
    }
}


/**
 * 
 * Seccion Tikets
 * 
 */
class TicketStatus extends Falso
{
    //inserta solo un estado en la estados_tickets
    private function insertOne($description)
    {
        $a = $description;

        try {
            $stm =  $this->pdo->prepare("INSERT INTO `estados_tickets` (`estado_ticket_descripcion`) VALUES (:descripcion)");
            $stm->bindParam(':descripcion', $a, \PDO::PARAM_STR, 100);
            $stm->execute();
        } catch (\Exception) {
            $this->flag = FALSE;
        }
    }

    private function insertMany($descriptions)
    {       

        foreach($descriptions as $description)
        {
            $this->insertOne($description);
        }
    }

    public function insert($array)
    {
        $this->insertMany($array);
        $this->flag();
    }

}
class TicketPriority extends Falso
{
    //inserta solo un estado en la estados_tickets
    private function insertOne($description)
    {
        $a = $description;

        try {
            $stm =  $this->pdo->prepare("INSERT INTO `prioridades` (`prioridad_descripcion`) VALUES (:descripcion)");
            $stm->bindParam(':descripcion', $a, \PDO::PARAM_STR, 100);
            $stm->execute();
        } catch (\Exception) {
            $this->flag = FALSE;
        }
    }

    private function insertMany($descriptions)
    {       

        foreach($descriptions as $description)
        {
            $this->insertOne($description);
        }
    }

    public function insert($array)
    {
        $this->insertMany($array);
        $this->flag();
    }

}

//insertar muchos clientes
$fake = new ClientFake;
$fake->insert(50);


//Inserta datos predefinidos en tickets
$fake = new TicketStatus;
$fake->insert(TK_STATUS);
$fake = new TicketPriority;
$fake->insert(TK_PRIORITY);


//insertar los roles y muchos usuarios
$fake = new RolUser;
$fake->insert(ROL_USER);
$fake = new UserFake;
$fake->insert(4);
