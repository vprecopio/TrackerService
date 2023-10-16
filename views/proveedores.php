<?php

use App\Http\Controllers\ProvController;
use App\AutomaticForm;

$nombre_pagina = 'Proveedores';
$nombre_formulario = 'proveedor';
$action_prov_editar = '/prov/edit/';

$prov_controller = new ProvController;

$prov_crear_form = new AutomaticForm(
    'proveedor',
    '',
    '/prov/create/',
    'POST',
    'bg-blue-700',
    [
        '0' => [
            'title_label' => 'Nombre',
            'id_name' => 'nombre_prov_crear',
            'type' => 'text',
            'height' => 3,
            'placeholder' => false,
            'required' => true,
        ],


        '2' => [
            'title_label' => 'Cuit',
            'id_name' => 'prov_cuit_crear',
            'type' => 'text',
            'height' => 3,
            'placeholder' => false,
            'required' => true,

        ],
        '3' => [
            'title_label' => 'Direccion',
            'id_name' => 'prov_dir_crear',
            'type' => 'select',
            'height' => 3,
            'placeholder' => false,
            'required' => true,
        ],

        '4' => [
            'title_label' => 'Telefono',
            'id_name' => 'prov_tel_crear',
            'type' => 'text',
            'height' => 3,
            'placeholder' => false,
            'required' => true,
        ],
        '5' => [
            'title_label' => 'Email',
            'id_name' => 'prov_email_crear',
            'type' => 'text',
            'height' => 3,
            'placeholder' => false,
            'required' => true,
        ],
        '6' => [
            'title_label' => 'Web',
            'id_name' => 'prov_web_crear',
            'type' => 'text',
            'height' => 3,
            'placeholder' => false,
            'required' => true,
        ],

    ]
);

?>

<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 min-h-screen">
        <entities-crud type="proveedores">

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
                                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Proveedores</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Todos los Proveedores
                        </h1>
                    </div>

                    <div class="items-center justify-between block sm:flex">


                        <!--buscar-->
                        <div class="flex items-center mb-4 sm:mb-0">
                            <form class="sm:pr-3" action="#" method="GET">
                                <label for="products-search" class="sr-only">Buscar</label>
                                <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                    <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Buscar cliente">
                                </div>
                            </form>
                        </div>
                        <!--Fin buscar-->


                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <a type="button" href="/client/" type="button" data-refresh="" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                                </svg>
                                Refrescar
                            </a>
                            <?php $prov_crear_form->GenerateButton() ?>
                            <?php $prov_crear_form->GenerateForm() ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <!--Titulos-->
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Empresa
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Cuit
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Dirección
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Telefono
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Email
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Web
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400 w-1/5">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>

                                <!--Proveedores-->
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    <?php foreach ($prov_controller->ListProveedores() as $obj_prov) : ?>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                            <!--datos-->
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="name"><?= $obj_prov->prov_empresa ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="cuit"><?= $obj_prov->prov_cuit ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="direccion"><?= $obj_prov->prov_dir ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="telefono"><?= $obj_prov->prov_tel ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="email"><?= $obj_prov->prov_email ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/5">
                                                <data value="web"><?= $obj_prov->prov_web ?></data>
                                            </td>

                                            <!--botones editar y eliminar-->
                                            <td class="p-4 space-x-2 whitespace-nowrap w-1/5">

                                                <button type="button" id="updateprovButton" onclick="llenarFormularioCliente('<?php echo $obj_prov->id_cliente; ?>','<?= $obj_prov->cliente_nombre ?>', '<?= $obj_prov->cliente_email ?>', '<?= $obj_prov->cliente_telefono ?>', '<?= $obj_prov->cliente_direccion ?>');" data-drawer-target="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-show="drawer-update-<?= $nombre_formulario ?>-default" aria-controls="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-placement="right" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <svg>
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </svg>
                                                    Editar Proveedor
                                                </button>


                                                <button type="button" id="deleteClientButton" onclick="handleDeleteButtonClick('<?php echo $obj_prov->id_proveedor  ?>')" data-drawer-target="drawer-delete-client-default" data-drawer-show="drawer-delete-client-default" aria-controls="drawer-delete-client-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">

                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Eliminar usuario
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



            <!--EDITAR PROV-->

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

                <form action="<?= $action_prov_editar ?>" method="POST">
                    <div class="space-y-4">

                        <div>
                            <label for="prove" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Empresa</label>
                            <input type="text" name="editar-prove" id="editar-prove" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="prove" placeholder="prove" required="">
                        </div>
                        <div>
                            <label for="cuit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuit</label>
                            <input type="text" name="editar-cuit" id="editar-cuit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="cuit" placeholder="cuit" required="">
                        </div>
                        <div>
                            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                            <input type="text" name="editar-direccion" id="editar-direccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="direccion" placeholder="direccion" required="">
                        </div>
                        <div>
                            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                            <input type="text" name="editar-telefono" id="editar-telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="telefono" placeholder="telefono" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="editar-email" id="editar-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="email" placeholder="email" required="">
                        </div>
                        <div>
                            <label for="web" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Web</label>
                            <input type="text" name="editar-web" id="editar-web" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="web" placeholder="web" required="">
                        </div>

                        <input type="hidden" name="id" id="id">

                    </div>



                    <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                        <button type="submit" value="Editar" name="Editar" class="w-full justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Update
                        </button>
                    </div>
                </form>

            </div>
            <!--Fin EDITAR PROV-->



            <!-- Delete cliente Drawer -->
            <div id="drawer-delete-client-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Eliminar cliente
                </h5>
                <button type="button" data-drawer-dismiss="drawer-delete-client-default" aria-controls="drawer-delete-client-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">
                    ¿Estas seguro de eliminar este cliente?
                </h3>
                <a href="" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                    Si, estoy seguro.
                </a>
            </div>
            <!-- Formulario Eliminar Cliente -->


           
        </entities-crud>

    </div>
</div>

<script>
    function handleDeleteButtonClick(clientId) {
        var deleteButton = document.getElementById("deleteClientButton");
        var deleteLink = document.querySelector("#drawer-delete-client-default a.text-white.bg-red-600");
        deleteLink.href = "/prov/delete/?eliminar_prove=" + clientId;
    }
</script>

<script>
    // Función para llenar los campos del formulario con los datos del cliente
    function llenarFormularioCliente(id, nombre, email, telefono, direccion) {
        // Obtener referencias a los campos del formulario
        var idInput = document.getElementById("id");
        var nombreInput = document.getElementById("nombre");
        var emailInput = document.getElementById("email");
        var telefonoInput = document.getElementById("telefono");
        var direccionInput = document.getElementById("direccion");

        // Llenar los campos con los datos del cliente
        idInput.value = id;
        nombreInput.value = nombre;
        emailInput.value = email;
        telefonoInput.value = telefono;
        direccionInput.value = direccion;
    }
</script>