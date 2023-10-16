<?php

use App\AutomaticForm;
use App\Http\Controllers\UserController;

$nombre_pagina = 'Usuarios';
$nombre_formulario = 'usuario';

$user_controller = new UserController;

$user_form = new AutomaticForm(
    'usuario',
    '',
    '/user/create/',
    'POST',
    'bg-blue-700',
    [
        'usuarios-nombre' => [
            'title_label' => 'Nombre',
            'id_name' => 'nombre',
            'type' => 'text',
            'height' => 3,
            'placeholder' => 'Gustavo',
            'required' => true,
        ],
        'usuarios-apellido' => [
            'title_label' => 'Apellido',
            'id_name' => 'apellido',
            'type' => 'text',
            'height' => 3,
            'placeholder' => 'Sanchez',
            'required' => true,
        ],
        'usuarios-email' => [
            'title_label' => 'Email',
            'id_name' => 'email',
            'type' => 'email',
            'height' => 3,
            'placeholder' => 'ejemplo@mail.com',
            'required' => true,
        ],
        'usuarios-contrasena' => [
            'title_label' => 'Contraseña',
            'id_name' => 'password',
            'type' => 'password',
            'height' => 3,
            'placeholder' => '••••••',
            'required' => true
        ],
        'usuarios-estado' => [
            'title_label' => 'Estado',
            'id_name' => 'estado',
            'type' => 'select',
            'height' => 3,
            'required' => true,
            'option' => '{"id":1,"estado_descripcion":"Pepsi"}',
            'options_table' => 'estados_descripcion',
        ],
    ]
);
?>
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 min-h-screen">
        <entities-crud type="users" class="block overflow-hidden shadow">
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
                                        Página principal
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="/crud/" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tablas</a>
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
                    <div class="sm:flex">
                        <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                            <form class="lg:pr-3" action="#" method="GET">
                                <label for="users-search" class="sr-only">Buscar usuario</label>
                                <div class="relative mt-1 lg:w-64 xl:w-96">
                                    <input type="text" name="email" id="users-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Buscar <?= $nombre_pagina ?>">
                                </div>
                            </form>
                        </div>
                        <!--Fin buscar-->
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <a type="button" href="/user/" type="button" data-refresh="" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center hover:text-white text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                                </svg>
                                Refrescar
                            </a>

                            <!--Form agregar usuario -->
                            <? $user_form->GenerateButton() ?>
                            <? $user_form->GenerateForm() ?>
                            <!--FIN Agregar usuario -->
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
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400">
                                            Nombre completo
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400">
                                            Estado
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400">
                                            Rol
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-gray-500 uppercase dark:text-gray-400">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>

                                <!--Usuarios-->
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    <?php foreach ($user_controller->ListUser() as $obj_user) : ?>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <!--datos-->
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="nombre"><?= $obj_user->usr_nombre . ' ' . $obj_user->usr_apellido ?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="email"><?= $obj_user->usr_email ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    <?php if ($obj_user->usr_estado > 0) : ?>
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                        Activo
                                                    <?php else : ?>
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div>
                                                        Inactivo
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="rol"><?= $obj_user->rol_nombre ?></data>
                                            </td>

                                            <!--botones editar y eliminar-->
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                <button type="button" id="updateUserButton" onclick="llenarFormularioUsuario('<?php echo $obj_user->id_usuario ?>','<?= $obj_user->usr_nombre ?>', '<?= $obj_user->usr_apellido ?>', '<?= $obj_user->usr_email ?>', '<?= $obj_user->usr_estado ?>', '<?= $obj_user->rol_nombre ?>');" data-drawer-target="drawer-update-user-default" data-drawer-show="drawer-update-user-default" aria-controls="drawer-update-user-default" data-drawer-placement="right" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <svg>
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </svg>
                                                    Editar usuario
                                                </button>

                                                <button type="button" id="deleteUserButton" onclick="handleDeleteButtonClick('<?php echo $obj_user->id_usuario; ?>')" data-drawer-target="drawer-delete-user-default" data-drawer-show="drawer-delete-user-default" aria-controls="drawer-delete-user-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Eliminar usuario
                                                </button>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Usuario Drawer -->
            <div id="drawer-update-user-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Editar usuario
                </h5>
                <button type="button" data-drawer-dismiss="drawer-update-user-default" aria-controls="drawer-update-user-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar menu</span>
                </button>

                <form action="/user/edit/" method="POST">
                    <div class="space-y-4">
                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre" required="">
                        </div>
                        <div>
                            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Apellido" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                        </div>
                        <div>
                            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select id="estado" name="estado" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                        <div>
                            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                            <select id="rol" name="rol" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($user_controller->ListUserRoles() as $obj_rol) : ?>

                                    <option><?= $obj_rol->rol_nombre ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="hidden" name="id_usuario" id="id_usuario">

                    </div>

                    <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                        <button type="submit" value="Editar" name="Editar" class="w-full justify-center items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Editar
                        </button>
                    </div>
                </form>
            </div>
            <!-- Fin Edit User Drawer -->
            <!-- Delete User Drawer -->
            <div id="drawer-delete-user-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Eliminar usuario
                </h5>
                <button type="button" data-drawer-dismiss="drawer-delete-user-default" aria-controls="drawer-delete-user-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar</span>
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
            <!-- Fin Delete User Drawer -->
        </entities-crud>
    </div>
</div>

<script>
    //script eliminar usuario button
    function handleDeleteButtonClick(userId) {
        var deleteButton = document.getElementById("deleteUserButton");
        var deleteLink = document.querySelector("#drawer-delete-user-default a.text-white.bg-red-600");
        deleteLink.href = "/user/delete/?id_usuario" + userId;
    }

    document.addEventListener("DOMContentLoaded", function() {
        var deleteButton = document.getElementById("deleteUserButton");
        var userId = deleteButton.getAttribute("data-user-id");
        var deleteLink = document.querySelector("#drawer-delete-user-default a.text-white.bg-red-600");

        deleteButton.addEventListener("click", function() {
            // Establecer la ID del cliente en el enlace de eliminación
            deleteLink.href = "/user/delete/?Documento=" + userId;
        });
    });

    // Función para llenar los campos del formulario con los datos del usuario
    function llenarFormularioUsuario(id, nombre, apellido, email, estado, rol) {
        // Obtener referencias a los campos del formulario
        var idInput = document.getElementById("id_usuario");
        var nombreInput = document.getElementById("nombre");
        var apellidoInput = document.getElementById("apellido");
        var emailInput = document.getElementById("email");
        var estadoInput = document.getElementById("estado");
        var rolInput = document.getElementById("rol");

        // Llenar los campos con los datos del cliente
        idInput.value = id;
        nombreInput.value = nombre;
        apellidoInput.value = apellido;
        emailInput.value = email;
        //estadoInput.value = estado;

        for (var i = 0; i < estadoInput.options.length; i++) {
            if (estadoInput.options[i].value === estado) {
                estadoInput.options[i].selected = true;
                break;
            }
        }
        rolInput.value = rol;
    }
</script>