<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\TicketController;

$nombre_pagina = 'Ticket';
$nombre_formulario = 'ticket-final';
//---------------------------seccion ticket
$ticket_controller = new TicketController;

$form_estadticket = new AutomaticForm(
    'ticket_estado',
    'Nuevo estado',
    '/ticket/insertarestadoticket/',
    'POST',
    '',
    [
        'ticket_estado' => [
            'title_label' => 'Nuevo estado',
            'id_name' => 'nuevo-estado',
            'type' => 'text',
            'height' => 6,
            'placeholder' => 'Estado',
            'required' => true,
        ]
    ]
);

$form_prioridades = new AutomaticForm(
    'prioridad_descripcion',
    'Nueva descripcion',
    '/ticket/insertarprioridadticket/',
    'POST',
    '',
    [
        'prioridad_descripcion' => [
            'title_label' => 'Nueva descripcion',
            'id_name' => 'nueva-descripcion',
            'type' => 'text',
            'height' => 6,
            'placeholder' => 'Descripcion',
            'required' => true,
        ]
    ]
);
//---------------------------fin tickets


//---------------------------seccion equipos
$equipment_controller = new EquipmentController;

$equipo_form = new AutomaticForm(
    'equipo',
    '',
    '/equipment/create/',
    'POST',
    'bg-blue-500 animate-spin',
    [
        'equipos-modelo' => [
            'title_label' => 'Nombre del equipo',
            'id_name' => 'modelo',
            'type' => 'text',
            'height' => 6,
            'placeholder' => 'samsung #4321',
            'required' => true,
        ],
        'equipos-marca' => [
            'title_label' => 'Selecciona una marca',
            'id_name' => 'marca',
            'type' => 'select',
            'height' => 3,
            'required' => true,
            'options' => json_encode($equipment_controller->ListEquipmentBrand()),
            'options_table' => 'marca_descripcion',
        ],
        'equipos-categoria' => [
            'title_label' => 'Selecciona una categoria',
            'id_name' => 'categoria',
            'type' => 'select',
            'height' => 3,
            'required' => true,
            'options' => json_encode($equipment_controller->ListEquipmentCategories()),
            'options_table' => 'categoria_equipo_descripcion',
        ],
    ]
);
//---------------------------fin equipos
?>

<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 min-h-screen">
        <entities-crud type="usuarios">

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full mb-1">
                    <div class="mb-4">
                        <nav class="flex mb-5" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                                <li class="inline-flex items-center">
                                    <a href="/" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="/crud/" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Crud</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page"><?= $nombre_pagina ?></span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Todos los <?= $nombre_pagina ?>
                        </h1>
                    </div>

                    <div class="items-center justify-between block sm:flex">

                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <a type="button" href="/equipment/" type="button" data-refresh="" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center hover:text-white text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                                </svg>
                                Refrescar
                            </a>
                            <!--Form agregar equipo -->
                            <? $form_estadticket->GenerateButton() ?>
                            <? $form_estadticket->GenerateForm() ?>
                            <!--FIN Agregar Equipo -->
                            <? $form_prioridades->GenerateButton() ?>
                            <? $form_prioridades->GenerateForm() ?>
                            <!--Form agregar equipo -->
                            <? $equipo_form->GenerateButton() ?>
                            <? $equipo_form->GenerateForm() ?>
                            <!--FIN Agregar Equipo -->

                        </div>
                    </div>
                </div>
            </div>


            <!--Listado equipos-->
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <!--Titulos-->
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdTicket
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Fecha Creacion
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Fecha Cierre
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Tiempo de Garantia
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Descripcion
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdUsuario
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdCliente
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdEstadoTicket
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdPrioridad
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdModeloEquipo
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            IdValor
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Botones
                                        </th>


                                    </tr>
                                </thead>


                                <!--clientes-->
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    <?php foreach ($ticket_controller->ListT() as $obj_value) : ?>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                            <!--datos-->
                                        
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="id_ticket"><?= $obj_value->id_ticket ?></data>
                                            </td>
                                           
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           
                                            <data value="ticket_fecha_creacion"><?= $obj_value->ticket_fecha_creacion ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="ticket_fecha_cierre"><?= $obj_value->ticket_fecha_cierre ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="ticket_tiempo_garantia"><?= $obj_value->ticket_tiempo_garantia ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="ticket_descripcion"><?= $obj_value->ticket_descripcion ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap da rk:text-white">
                                                <data value="id_usuario"><?= $obj_value->id_usuario ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="id_cliente"><?= $obj_value->id_cliente ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="id_estado_ticket"><?= $obj_value->id_estado_ticket ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="id_prioridad"><?= $obj_value->id_prioridad ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap da rk:text-white">
                                                <data value="id_modelo_equipo"><?= $obj_value->id_modelo_equipo ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap da rk:text-white">
                                                <data value="id_valor"><?= $obj_value->id_valor ?></data>
                                            </td>

                                            <!--botones editar y eliminar-->
                                            <td class="p-4 space-x-2 whitespace-nowrap">

                                                <button type="button" id="updateclienteButton" onclick="llenarFormulario('');" data-drawer-target="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-show="drawer-update-<?= $nombre_formulario ?>-default" aria-controls="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 hover:text-white focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <svg>
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </svg>
                                                    Editar <?= $nombre_formulario ?>
                                                </button>

                                                <button type="button" id="deleteEquipmentButton" onclick="handleDeleteButtonClick('<?php echo $obj_value->id_ticket ?>')" data-drawer-target="drawer-delete-equipment-default" data-drawer-show="drawer-delete-equipment-default" aria-controls="drawer-delete-equipment-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Eliminar <?= $nombre_formulario ?>
                                                </button>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <!--Fin clientes-->



                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </entities-crud>

    </div>
</div>

<script>
    function handleDeleteButtonClick(equiptmentId) {
        var deleteButton = document.getElementById("deleteEquiptmentButton");
        var deleteLink = document.querySelector("#drawer-delete-equipment-default a.text-white.bg-red-600");
        deleteLink.href = "/equipment/delete/?id_equipo=" + equiptmentId;
    }
</script>

<script>
    // Función para llenar los campos del formulario con los datos del formulario
    function llenarFormulario(equipo, modelo, marca, categoria) {
        // Obtener referencias a los campos del formulario
        var equipoInput = document.getElementById("editar-equipo");
        var modeloInput = document.getElementById("editar-modelo");
        var marcaInput = document.getElementById("editar-marca");
        var categoriaInput = document.getElementById("editar-categoria");

        // Llenar los campos con los datos del formulario
        equipoInput.value = equipo;
        modeloInput.value = modelo;
        marcaInput.value = marca;
        categoriaInput.value = categoria;
    }
</script>