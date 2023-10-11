<?php

use Carbon\Carbon;
?>

<!-- Activity Card -->
<div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><?= $value->equipo_modelo ?> - <?= $value->equipo_marca ?></h3>
    </div>
    <ol class="relative border-l border-gray-200 dark:border-gray-700">

        <?php if ($value->estado_ticket_descripcion == 'entregado') : ?>
            <!-- Estado Entregado -->
            <li class="mb-10 ml-4">
                <div class="absolute w-3 h-3 bg-green-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                </div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= Carbon::parse($value->ticket_fecha_cierre)->locale('es_ES')->isoFormat('LL') ?></time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tu equipo ha sido entregado con éxito 📦</h3>
            </li>
            <!-- Fin Estado Entregado -->

        <?php elseif ($value->estado_ticket_descripcion == 'reparado') : ?>
            <!-- Estado reparado -->
            <li class="mb-10 ml-4">
                <div class="absolute w-3 h-3 bg-green-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                </div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= Carbon::parse($value->ticket_fecha_cierre)->locale('es_ES')->isoFormat('LL') ?></time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tu equipo ya esta reparado ✅🛠️</h3>
            </li>
            <!-- Fin Estado reparado -->

        <?php elseif ($value->estado_ticket_descripcion == 'presupuesto') : ?>
            <!-- Estado Presupuesto -->
            <li class="mb-10 ml-4">
                <div class="absolute w-3 h-3 bg-blue-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                </div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= Carbon::parse($value->ticket_fecha_cierre)->locale('es_ES')->isoFormat('LL') ?></time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">¡Ya puedes acceder al presupuesto! 🎉</h3>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">En el siguiente boton podes obtener el presupuesto de la reparación.</p>
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-primary-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Descarga el presupuesto<svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            <!-- Fin Estado Presupuesto -->
        <?php elseif ($value->estado_ticket_descripcion == 'por asignar' || 'en proceso') : ?>
            <!-- Estado en proceso de asignacion -->
            <li class="mb-10 ml-4">
                <div class="absolute w-3 h-3 bg-green-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                </div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= Carbon::parse($value->ticket_fecha_cierre)->locale('es_ES')->isoFormat('LL') ?></time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tu equipo se encuentra en proceso de asignación ⌛</h3>
            </li>
            <!-- Fin Estado en proceso de asignacion -->
        <?php endif; ?>

        <!-- Estado inicial-->
        <li class="mb-10 ml-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
            </div>
            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><?= Carbon::parse($value->ticket_fecha_creacion)->locale('es_ES')->isoFormat('LL') ?></time>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hemos recibido tu equipo 🔍📦</h3>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?= $value->equipo_modelo ?><br><?= $value->equipo_marca ?></p>
        </li>
        <!-- Fin Estado Inicial -->
    </ol>
</div>
<!--END Activity Card -->