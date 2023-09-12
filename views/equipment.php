<?php

use App\Http\Controllers\EquipmentController;

$equipment_controller = new EquipmentController;


?>

<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 min-h-screen">


        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

        </div>

        <div class="w-full mt-10">


            <?php foreach ($equipment_controller->ListEquipments() as $obj_client) : ?>


                <ul class="dark:text-white">
                    <li><?= 'id equipo' . $obj_client->id_modelos_equipos ?></li>
                    <li><?= 'id marca' . $obj_client->id_marca ?></li>
                    <li><?= 'id modelo' . $obj_client->id_modelo ?></li>
                    <li><?= 'id categoria' . $obj_client->id_categoria_equipo ?></li>
                </ul>
                <hr>

            <? endforeach; ?>

        </div>

    </div>
</div>