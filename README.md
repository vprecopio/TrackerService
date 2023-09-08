# TecnoGestion

Sistema de Seguimiento de Servicio Tecnico para aparatos electronicos.

## Uso del Trait de Base de Datos

**Introducción:**
En este apartado, aprenderás cómo utilizar un trait global para gestionar la conexión a la base de datos

**Utilizar el Trait de Base de Datos:**
Para comenzar a trabajar con la base de datos, simplemente utiliza el trait global que ya está cargado en tu proyecto a través de Composer. Dentro de tu clase, agrega la siguiente línea de código `use \Database;`:

```php
<?php
namespace Your\Namespace;

class MiClaseModel
{
    //heredas el atributo pdo y el metodo Connect
     use \Database;

    public function __construct()
    {
        $this->Connect();
    }

    public function TuFuncion()
    {
        $sql = 'tu sentencia sql';
        $this->pdo->prepare($sql);
        /*
        Resto de tu codigo ...
        */
    }
    
}
```

**Conexión a la Base de Datos:**
Para que el trait de base de datos funcione correctamente, es importante que se establezca la conexión con la base de datos en el constructor de la clase que lo utiliza. Esto se logra utilizando `$this->connect();` en el constructor, como se muestra en el ejemplo anterior.
