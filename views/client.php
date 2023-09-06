<?php

use App\Http\Controllers\ClientController;

$client_controller = new ClientController;

?>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Teléfono
                </th>
                <th scope="col" class="px-6 py-3">
                    Dirección
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client_controller->ListClient() as $obj_client) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $obj_client->cliente_nombre ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $obj_client->cliente_email ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $obj_client->cliente_telefono ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $obj_client->cliente_direccion ?>
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" onclick="window.location.href = '/client/edit/?email=<?php echo $obj_client->cliente_email;?>';">
                            <svg class="w-16" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                            Edit user
                        </button>

                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="/client/delete/?Documento=<?php echo $obj_client->id_cliente; ?>">
                            <svg class="w-16" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete user
                        </a>
                    
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>