<?php

use \App\Models\TicketModel;
use Carbon\Carbon;
$model_tiket = new TicketModel;

$title_secction_ticket = 'Tickets';
$sub_secction_ticket = 'Esto es una lista de los últimos tickets.';

$th_title = ['Fecha de creación', 'Email del Cliente', 'Nombre del dispositivo', 'Estado del ticket','Ver más'];

$estados_a_excluir = ['entregado','reparado'];

$array = new ArrayIterator($model_tiket->allTk());
$text_link = [
    'text' => 'Todos los Tickets',
    'link' => '/ticket/',
];

?>


<div class="p-4 my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
            <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                <?= SanitizeText::Output($title_secction_ticket) ?>
            </h3>
            <span class="text-base font-normal text-gray-500 dark:text-gray-400"><?= SanitizeText::Output($sub_secction_ticket) ?></span>
        </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <? foreach ($th_title as $value) : ?>
                                    <td scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        <?=SanitizeText::Output($value) ?>
                                    </td>
                                <? endforeach; ?>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            <? foreach ($array as $value) : ?>
                                <? if (!in_array($value->estado_ticket_descripcion, $estados_a_excluir)) : ?>
                                    <tr>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <span class="font-semibold"><?=SanitizeText::Output(Carbon::parse($value->ticket_fecha_creacion)->locale('es_ES')->isoFormat('LL'))?></span>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <a class="font-semibold underline" href="mailto:<?= SanitizeText::Output($value->cliente_email) ?>"><?= SanitizeText::Output($value->cliente_email) ?></a>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <span class="font-semibold"><?= SanitizeText::Output($value->equipo_modelo) ?></span>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <span class="font-semibold"><?= SanitizeText::Output($value->estado_ticket_descripcion) ?></span>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <a class="font-semibold underline" href="/ticket/#<?= SanitizeText::Output($value->id_ticket.'-'.$value->cliente_email)?>">Ver Más</a>
                                        </td>
                                    </tr>
                                <? endif; ?>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Footer -->
    <div class="flex items-center justify-between pt-3 sm:pt-6">
        <div class="flex-shrink-0">
            <a href="<?= SanitizeText::Output($text_link['link']) ?>" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                <?= SanitizeText::Output($text_link['text']) ?>
                <svg class="w-4 h-4 ml-1 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>