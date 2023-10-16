<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

if(!isset($_GET['email'], $_GET['u']))
{
    exit;
}

$semilla = Seed::GenerateSeed($_GET['email']);
$semilla_url = $_GET['u'];
if(!Seed::CompareSeed($semilla, $semilla_url))
{
    exit;
}

use App\Models\TicketModel;
$page_title = 'Estado de su equipo';

final class TicketClient extends TicketModel
{
    use \Database, \Sanitize;

    private $client;
    public $ticket;

    public function __construct($client)
    {
        $this->Connect();
        $this->client = $client;
        $this->ticket = new \ArrayIterator($this->OneTicketByClient());
    }

    private function OneTicketByClient()
    {

        $sql = "SELECT *, (SELECT marca_descripcion FROM equipos_marca WHERE equipos_marca.id_marcas = modelos_equipos.id_marca) AS equipo_marca, (SELECT descripcion FROM equipos_modelo WHERE equipos_modelo.id_modelo = modelos_equipos.id_modelo) AS equipo_modelo FROM tickets JOIN clientes ON tickets.id_cliente = clientes.id_cliente JOIN estados_tickets ON tickets.id_estado_ticket = estados_tickets.id_estado_ticket JOIN modelos_equipos ON tickets.id_modelo_equipo = modelos_equipos.id_modelos_equipos WHERE cliente_email = :client_search";

        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(':client_search', $this->client, \PDO::PARAM_STR);
        $consulta->execute();

        return $consulta->fetchAll(\PDO::FETCH_OBJ);
    }


    public function GenerateBlockTicket()
    {
        foreach ($this->ticket as $value) {

            if ($this->ticket->valid()) {
                include __DIR__ . '/../views/components/ticket/ticket-activity-card.php';
            }
        }
    }
}


$client = new TicketClient($_GET['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="/public/src/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <div id="main-content" class="relative w-full max-w-screen-2xl mx-auto h-full overflow-y-auto bg-gray-50 dark:bg-gray-900">


            <main class="px-4 pt-6"> 
                <div class="grid grid-cols-4 md:grid-cols-2 gap-4">

                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="relative mx-auto ">

                            <div class="bg-white dark:bg-gray-800">
                                <div class="flex items-center mb-4 text-lg font-medium text-primary-600">
                                    <img src="../public/src/img/logo.png" class="h-8 mr-3" alt="TecnoGestión Logo">
                                    TecnoGestión
                                </div>
                                <h3 class="mb-4 text-2xl font-medium text-gray-900 dark:text-white">Hola <?=$client->ticket[0]->cliente_nombre?></h3>
                                <p class="mb-4 text-black-500 dark:text-white">Bienvenido/a al servicio de seguimiento de reparación de tu equipo. Aquí podrás ver el estado de tu reparación en tiempo real.</p>
                                <p class="mb-2 text-lg font-medium text-gray-900 dark:text-white">Te enviaremos un email:</p>
                                <ul class="pl-4 mb-4 space-y-3 text-gray-500 list-disc dark:text-gray-400">
                                    <li>Cuando tu equipo este reparado, ademas adjuntaremos la factura.</li>
                                    <li>Cuando el presupuesto este listo.</li>
                                    <li>Cuando tu equipo sea asignado a un técnico.</li>
                                </ul>
                                <a href="#" class="inline-flex items-center p-2 font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                                    Preguntas frecuentes.
                                    <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>


                    <?php $client->GenerateBlockTicket() ?>

                </div>
            </main>

        </div>
    </div>

</body>

</html>