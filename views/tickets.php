<?php

use App\Http\Controllers\TicketController;

$ticket_controller = new TicketController;

$nombre_pagina = 'Ticket';
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
                            
                            <!--FIN Agregar Equipo -->

                            <!--Form agregar equipo -->
                             
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
                                            Equipo
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Modelo
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Marca
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Categoria
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
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