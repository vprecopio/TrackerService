<?php

use \App\AutomaticForm;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\TicketController;

$nombre_pagina = 'Ticket';
$nombre_formulario = 'ticket-final';
//---------------------------seccion ticket
$ticket_controller = new TicketController;

/* 
572ac0d2c0220 [usr_estado] => 1 
[id_rol] => 1 
[cliente_nombre] => Dashawn Vandervort 
[cliente_email] => mateo80@example.org 
[cliente_telefono] => 1-507-546-5250 
[cliente_direccion] => 4729 Myrtie Centers 
[estado_ticket_descripcion] => en proceso 
[prioridad_descripcion] => alta 
[id_modelos_equipos] => 2 
[id_marca] => 1 
[id_modelo] => 2 
[id_categoria_equipo] => 2 ) 
[1] => 
stdClass Object ( [id_ticket] => 2 
[ticket_fecha_creacion] => 2023-10-25 
[ticket_fecha_cierre] => 2023-10-29 
[ticket_tiempo_garantia] => 2023-10-31 
[ticket_descripcion] => qcyo qcyo 
[id_usuario] => 3 
[id_cliente] => 28 
[id_estado_ticket] => 4 
[id_prioridad] => 3 
[id_modelo_equipo] => 1 
[id_valor] => 3 
[valor_servicios] => 400 
[valor_repuestos] => 200 
[valor_ticket_total] => 600 
[usr_nombre] => Hildegard 
[usr_apellido] => Skiles 
[usr_email] => larson.maxie@example.org 
[usr_contrasena] => 2345 
[usr_estado] => 1 
[id_rol] => 3 
[cliente_nombre] => Dayana Cremin 
[cliente_email] => ricky36@example.org 
[cliente_telefono] => +12569300056 
[cliente_direccion] => 8445 Daugherty Walks Apt. 697 
[estado_ticket_descripcion] => entregado 
[prioridad_descripcion] => media 
[id_modelos_equipos] => 1 
[id_marca] => 1 
[id_modelo] => 1 
[id_categoria_equipo] => 1 ) ) 





*/

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
            'height' => 3,
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
            'height' => 3,
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
    '',
    [
        'equipos-modelo' => [
            'title_label' => 'Nombre del equipo',
            'id_name' => 'modelo',
            'type' => 'text',
            'height' => 3,
            'placeholder' => 'samsung #4321',
            'required' => true,
        ],
        'equipos-marca' => [
            'title_label' => 'Selecciona una marca',
            'id_name' => 'marca',
            'type' => 'select',
            'height' => 6,
            'required' => true,
            'options' => json_encode($equipment_controller->ListEquipmentBrand()),
            'options_table' => 'marca_descripcion',
        ],
        'equipos-categoria' => [
            'title_label' => 'Selecciona una categoria',
            'id_name' => 'categoria',
            'type' => 'select',
            'height' => 6,
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
                                            Nombre
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Email
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            EstadoTicket
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Prioridad
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            ModeloEquipo
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Valor
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
                                                <data value="usr_nombre"><?= $obj_value->usr_nombre ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="cliente_email"><?= $obj_value->cliente_email ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="estado_ticket_descripcion"><?= $obj_value->estado_ticket_descripcion ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="prioridad_descripcion"><?= $obj_value->prioridad_descripcion ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap da rk:text-white">
                                                <data value="ModeloEquipo"><?= $obj_value->ModeloEquipo ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap da rk:text-white">
                                                <data value="valor_ticket_total">$<?= $obj_value->valor_ticket_total ?></data>
                                            </td>

                                            <!--botones editar y eliminar-->
                                            <td class="p-4 space-x-2 whitespace-nowrap">

                                                <button type="button" id="updateclienteButton" onclick="llenarFormulario('<?= $obj_value->id_ticket ?>','<?= $obj_value->ticket_fecha_creacion ?>','<?= $obj_value->ticket_fecha_cierre ?>','<?= $obj_value->ticket_tiempo_garantia ?>','<?= $obj_value->ticket_descripcion ?>','<?= $obj_value->usr_nombre ?>','<?= $obj_value->cliente_email ?>','<?= $obj_value->valor_ticket_total ?>','<?= $obj_value->prioridad_descripcion ?>','<?= $obj_value->ModeloEquipo ?>','<?= $obj_value->estado_ticket_descripcion ?>');" data-drawer-target="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-show="drawer-update-<?= $nombre_formulario ?>-default" aria-controls="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 hover:text-white focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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

            <!-- Edit equipo Drawer -->
            <div id="drawer-update-<?= $nombre_formulario ?>-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Editar <?= $nombre_formulario ?>
                </h5>
                <button type="button" data-drawer-dismiss="drawer-update-<?= $nombre_formulario ?>-default" aria-controls="drawer-update-<?= $nombre_formulario ?>-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar menu</span>
                </button>

                <form action="/ticket/edit/" method="POST">
                    <div class="space-y-4">


                        <div>
                            <label for="fecha_creacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fecha_creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="fecha_cierre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fecha_cierre</label>
                            <input type="date" name="fecha_cierre" id="fecha_cierre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="tiempo_garantia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tiempo_garantia</label>
                            <input type="date" name="tiempo_garanti" id="tiempo_garantia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="ticket_descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ticket_descripcion</label>
                            <input type="text" name="ticket_descripcion" id="ticket_descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="editar_nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">editar_nombre</label>
                            <input type="text" name="editar_nombre" id="editar_nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="editar_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">editar_email</label>
                            <input type="email" name="editar_email" id="editar-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>

                        <div>
                            <label for="editar_valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">editar_valor</label>
                            <input type="number" name="editar_valor" id="editar_valor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="modelo" placeholder="modelo" required="">
                        </div>


                        <div class="mb-4">
                            <label for="editar_prioridad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una prioridad</label>
                            <select id="editar_prioridad" name="editar_prioridad" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($ticket_controller->ListPrioridad() as $obj_brand) : ?>

                                    <option><?= $obj_brand->prioridad_descripcion ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="mb-4">
                            <label for="editar_modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un modelo</label>
                            <select id="editar_modelo" name="editar_modelo" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($equipment_controller->ListEquipments() as $obj_brand) : ?>

                                    <option><?= $obj_brand->modelo ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="mb-4">
                            <label for="editar_estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un estado</label>
                            <select id="editar_estado" name="editar_estado" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($ticket_controller->ListET() as $obj_brand) : ?>

                                    <option><?= $obj_brand->estado_ticket_descripcion ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <input type="hidden" name="id_ticket" id="id_ticket">

                    </div>
                    <div class="flex justify-center w-full pb-4 mt-4 space-x-4">
                        <button type="submit" value="Editar" name="Editar" class="w-full justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Editar
                        </button>
                    </div>
                </form>

            </div>
            <!-- Fin Edit equipo Drawer -->


            <!-- Delete euipo Drawer -->
            <div id="drawer-delete-equipment-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Eliminar <?= $nombre_formulario ?>
                </h5>
                <button type="button" data-drawer-dismiss="drawer-delete-equipment-default" aria-controls="drawer-delete-equipment-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">
                    ¿Estas seguro de eliminar este <?= $nombre_formulario ?>?
                </h3>
                <a href="" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                    Si, estoy seguro.
                </a>
            </div>
            <!-- Formulario Eliminar Equipo -->


        </entities-crud>

    </div>
</div>

<script>
    function handleDeleteButtonClick(ticket) {
        var deleteButton = document.getElementById("deleteticketsButton");
        var deleteLink = document.querySelector("#drawer-delete-equipment-default a.text-white.bg-red-600");
        deleteLink.href = "/ticket/delete/?id_ticket=" + ticket;
    }
</script>

<script>
    // Función para llenar los campos del formulario con los datos del formulario
    function llenarFormulario(id, fecha_creacion, fecha_cierre, tiempo_garantia, ticket_descripcion, editar_nombre, editar_email, editar_valor, editar_prioridad, editar_modelo, editar_estado) {
        // Obtener referencias a los campos del formulario
        var a = document.getElementById("fecha_creacion");
        var b = document.getElementById("fecha_cierre");
        var c = document.getElementById("tiempo_garantia");
        var d = document.getElementById("ticket_descripcion");
        var e = document.getElementById("editar_nombre");
        var f = document.getElementById("editar-email");
        var g = document.getElementById("editar_valor");
        var h = document.getElementById("editar_prioridad");
        var i = document.getElementById("editar_modelo");
        var j = document.getElementById("editar_estado");
        var z = document.getElementById("id_ticket");

        // Obtener referencias a los campos del formulario
        a.value = fecha_creacion;
        b.value = fecha_cierre;
        c.value = tiempo_garantia;
        d.value = ticket_descripcion;
        e.value = editar_nombre;
        f.value = editar_email;
        g.value = editar_valor;
        h.value = editar_prioridad;
        i.value = editar_modelo;
        j.value = editar_estado;
        z.value = id;
    }
</script>