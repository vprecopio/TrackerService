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
        $stm = $this->pdo->prepare($sql);
        /*
        Resto de tu codigo ...
        */
    }
    
}
```

**Conexión a la Base de Datos:**
Para que el trait de base de datos funcione correctamente, es importante que se establezca la conexión con la base de datos en el constructor de la clase que lo utiliza. Esto se logra utilizando `$this->connect();` en el constructor, como se muestra en el ejemplo anterior.

## Como mostrar una Vista y crear el Controller

**Introducción:**
En TrackerService, utilizamos controladores para gestionar las acciones y vistas de nuestras rutas. Aquí se explica cómo mostrar una vista utilizando un controlador como ejemplo.

1. **Ubicación del Controlador:**
   - Crea el controlador dentro de la carpeta `/app/Http/Controllers/`.
   - El nombre del archivo del controlador debe terminar en `Controller.php`.
   - La primera letra del nombre del archivo debe estar en mayúsculas, seguida de "Controller". Por ejemplo, `EjemploController.php`.

2. **Definir una Clase:**
   - Dentro del archivo del controlador, define una clase que finalice con la palabra "Controller". Esta clase será responsable de manejar las acciones relacionadas con la ruta.

3. **Crear el metodo "index"**
   - Dentro de la clase del controlador, define el método `index()`. Este método será responsable de manejar la acción cuando se accede a la ruta `http://tudominio.com/ejemplo/`.

4. **Ejecutar la Acción:**
   - Dentro del método `index()`, agrega el código necesario para realizar la acción deseada cuando se visite la ruta. Esto puede incluir la obtención de datos, la preparación de variables o cualquier otro procesamiento específico para esta página.
A continuación, se muestra un ejemplo de cómo podría verse la estructura de un controlador en TrackerService:

5. **Retorno Vista/opcional:**
   - Si es necesario, puedes utilizar `return` para devolver una respuesta al navegador, como una vista o una respuesta JSON o etc. Por ejemplo para devolver una vista solo es necesario usar la funcion `view()` dentro de tu metodo:

     ```php
     <?php
     namespace App\Http\Controllers;

     class EjemploController
     {
        public function index()
        {
            // Retorna la vista de inicio de la ruta
            return view('nombredetuvista');
        }
     }```
