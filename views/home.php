<?php

use App\Http\Controllers\ClientController;
use App\Models\TicketModel;

$client_controller = new ClientController;
$cantclient = $client_controller->CountClient();

$ticket_model = new TicketModel;
$allTicket = $ticket_model->allTk();

$array_unico_titulos_estado_de_los_tickets = [];
$contador_estados = [];
$total = 0;
foreach ($allTicket as $value) {
    $array_unico_titulos_estado_de_los_tickets[] = $value->estado_ticket_descripcion;

    // Verificar si la clave existe en $contador_estados
    if (isset($contador_estados[$value->estado_ticket_descripcion])) {
        $contador_estados[$value->estado_ticket_descripcion] += 1;
    } else {
        $contador_estados[$value->estado_ticket_descripcion] = 1;
    }
    $total += 1;
}

$array_unico_titulos_estado_de_los_tickets = array_values(array_unique($array_unico_titulos_estado_de_los_tickets));

// Luego, si deseas obtener los valores en un nuevo array:
$contador_estados = array_values($contador_estados);
foreach ($contador_estados as &$valor) {
    $valor = round($valor / $total * 100, 0);
}


?>
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main>
            <div class="px-4 pt-6">
                <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                    <!-- Radial Chart -->
                    <div class="max-w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Estado de los tickets</h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <div class="grid grid-cols-3 gap-3 mb-2">

                                <?php foreach ($array_unico_titulos_estado_de_los_tickets as $xd) : ?>
                                    <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                        <!-- <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">64</dt> -->
                                        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium"><?= ucfirst($xd) ?></dd>
                                    </dl>
                                <? endforeach; ?>

                            </div>
                        </div>

                        <!-- Radial Chart -->
                        <div class="py-6" id="radial-chart"></div>
                        <!-- Rfdsaf Chart -->

                    </div>
                    <div class="flex flex-col space-y-6 2xl:col-span-2">
                        <!-- Tickets Chart -->
                        <div class="flex-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <div class="w-full">
                                <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">Repuestos</h3>
                                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
                            </div>
                            <div class="w-full" id="new-products-chart" style="min-height: 155px;">
                                <div id="apexchartsem3arr52" class="apexcharts-canvas apexchartsem3arr52 apexcharts-theme-light" style="width: 261px; height: 140px;"><svg id="SvgjsSvg31678" width="261" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG31680" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 30)">
                                            <defs id="SvgjsDefs31679">
                                                <linearGradient id="SvgjsLinearGradient31684" x1="0" y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop31685" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop31686" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop31687" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskem3arr52">
                                                    <rect id="SvgjsRect31689" width="248" height="83" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskem3arr52"></clipPath>
                                                <clipPath id="nonForecastMaskem3arr52"></clipPath>
                                                <clipPath id="gridRectMarkerMaskem3arr52">
                                                    <rect id="SvgjsRect31690" width="243" height="82" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect31688" width="30.72857142857143" height="78" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient31684)" class="apexcharts-xcrosshairs" y2="78" filter="none" fill-opacity="0.9"></rect>
                                            <g id="SvgjsG31709" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG31710" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                            </g>
                                            <g id="SvgjsG31719" class="apexcharts-grid">
                                                <g id="SvgjsG31720" class="apexcharts-gridlines-horizontal" style="display: none;">
                                                    <line id="SvgjsLine31722" x1="0" y1="0" x2="239" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31723" x1="0" y1="19.5" x2="239" y2="19.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31724" x1="0" y1="39" x2="239" y2="39" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31725" x1="0" y1="58.5" x2="239" y2="58.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31726" x1="0" y1="78" x2="239" y2="78" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG31721" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                                <line id="SvgjsLine31728" x1="0" y1="78" x2="239" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine31727" x1="0" y1="1" x2="0" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG31691" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG31692" class="apexcharts-series" rel="1" seriesName="Quantity" data:realIndex="0">
                                                    <path id="SvgjsPath31696" d="M 1.7071428571428573 78L 1.7071428571428573 14.700000000000003Q 1.7071428571428573 11.700000000000003 4.707142857142857 11.700000000000003L 24.43571428571429 11.700000000000003Q 27.43571428571429 11.700000000000003 27.43571428571429 14.700000000000003L 27.43571428571429 14.700000000000003L 27.43571428571429 78L 27.43571428571429 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 1.7071428571428573 78L 1.7071428571428573 14.700000000000003Q 1.7071428571428573 11.700000000000003 4.707142857142857 11.700000000000003L 24.43571428571429 11.700000000000003Q 27.43571428571429 11.700000000000003 27.43571428571429 14.700000000000003L 27.43571428571429 14.700000000000003L 27.43571428571429 78L 27.43571428571429 78z" pathFrom="M 1.7071428571428573 78L 1.7071428571428573 78L 27.43571428571429 78L 27.43571428571429 78L 27.43571428571429 78L 27.43571428571429 78L 27.43571428571429 78L 1.7071428571428573 78" cy="11.700000000000003" cx="33.35" j="0" val="170" barHeight="66.3" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31698" d="M 35.85 78L 35.85 10.800000000000011Q 35.85 7.800000000000011 38.85 7.800000000000011L 58.578571428571436 7.800000000000011Q 61.578571428571436 7.800000000000011 61.578571428571436 10.800000000000011L 61.578571428571436 10.800000000000011L 61.578571428571436 78L 61.578571428571436 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 35.85 78L 35.85 10.800000000000011Q 35.85 7.800000000000011 38.85 7.800000000000011L 58.578571428571436 7.800000000000011Q 61.578571428571436 7.800000000000011 61.578571428571436 10.800000000000011L 61.578571428571436 10.800000000000011L 61.578571428571436 78L 61.578571428571436 78z" pathFrom="M 35.85 78L 35.85 78L 61.578571428571436 78L 61.578571428571436 78L 61.578571428571436 78L 61.578571428571436 78L 61.578571428571436 78L 35.85 78" cy="7.800000000000011" cx="67.49285714285715" j="1" val="180" barHeight="70.19999999999999" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31700" d="M 69.99285714285715 78L 69.99285714285715 17.040000000000006Q 69.99285714285715 14.040000000000006 72.99285714285715 14.040000000000006L 92.72142857142858 14.040000000000006Q 95.72142857142858 14.040000000000006 95.72142857142858 17.040000000000006L 95.72142857142858 17.040000000000006L 95.72142857142858 78L 95.72142857142858 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 69.99285714285715 78L 69.99285714285715 17.040000000000006Q 69.99285714285715 14.040000000000006 72.99285714285715 14.040000000000006L 92.72142857142858 14.040000000000006Q 95.72142857142858 14.040000000000006 95.72142857142858 17.040000000000006L 95.72142857142858 17.040000000000006L 95.72142857142858 78L 95.72142857142858 78z" pathFrom="M 69.99285714285715 78L 69.99285714285715 78L 95.72142857142858 78L 95.72142857142858 78L 95.72142857142858 78L 95.72142857142858 78L 95.72142857142858 78L 69.99285714285715 78" cy="14.040000000000006" cx="101.6357142857143" j="2" val="164" barHeight="63.959999999999994" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31702" d="M 104.1357142857143 78L 104.1357142857143 24.450000000000003Q 104.1357142857143 21.450000000000003 107.1357142857143 21.450000000000003L 126.86428571428573 21.450000000000003Q 129.86428571428573 21.450000000000003 129.86428571428573 24.450000000000003L 129.86428571428573 24.450000000000003L 129.86428571428573 78L 129.86428571428573 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 104.1357142857143 78L 104.1357142857143 24.450000000000003Q 104.1357142857143 21.450000000000003 107.1357142857143 21.450000000000003L 126.86428571428573 21.450000000000003Q 129.86428571428573 21.450000000000003 129.86428571428573 24.450000000000003L 129.86428571428573 24.450000000000003L 129.86428571428573 78L 129.86428571428573 78z" pathFrom="M 104.1357142857143 78L 104.1357142857143 78L 129.86428571428573 78L 129.86428571428573 78L 129.86428571428573 78L 129.86428571428573 78L 129.86428571428573 78L 104.1357142857143 78" cy="21.450000000000003" cx="135.77857142857144" j="3" val="145" barHeight="56.55" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31704" d="M 138.27857142857144 78L 138.27857142857144 5.340000000000003Q 138.27857142857144 2.3400000000000034 141.27857142857144 2.3400000000000034L 161.00714285714287 2.3400000000000034Q 164.00714285714287 2.3400000000000034 164.00714285714287 5.340000000000003L 164.00714285714287 5.340000000000003L 164.00714285714287 78L 164.00714285714287 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 138.27857142857144 78L 138.27857142857144 5.340000000000003Q 138.27857142857144 2.3400000000000034 141.27857142857144 2.3400000000000034L 161.00714285714287 2.3400000000000034Q 164.00714285714287 2.3400000000000034 164.00714285714287 5.340000000000003L 164.00714285714287 5.340000000000003L 164.00714285714287 78L 164.00714285714287 78z" pathFrom="M 138.27857142857144 78L 138.27857142857144 78L 164.00714285714287 78L 164.00714285714287 78L 164.00714285714287 78L 164.00714285714287 78L 164.00714285714287 78L 138.27857142857144 78" cy="2.3400000000000034" cx="169.92142857142858" j="4" val="194" barHeight="75.66" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31706" d="M 172.42142857142858 78L 172.42142857142858 14.700000000000003Q 172.42142857142858 11.700000000000003 175.42142857142858 11.700000000000003L 195.15 11.700000000000003Q 198.15 11.700000000000003 198.15 14.700000000000003L 198.15 14.700000000000003L 198.15 78L 198.15 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 172.42142857142858 78L 172.42142857142858 14.700000000000003Q 172.42142857142858 11.700000000000003 175.42142857142858 11.700000000000003L 195.15 11.700000000000003Q 198.15 11.700000000000003 198.15 14.700000000000003L 198.15 14.700000000000003L 198.15 78L 198.15 78z" pathFrom="M 172.42142857142858 78L 172.42142857142858 78L 198.15 78L 198.15 78L 198.15 78L 198.15 78L 198.15 78L 172.42142857142858 78" cy="11.700000000000003" cx="204.06428571428572" j="5" val="170" barHeight="66.3" barWidth="30.72857142857143"></path>
                                                    <path id="SvgjsPath31708" d="M 206.56428571428572 78L 206.56428571428572 20.550000000000004Q 206.56428571428572 17.550000000000004 209.56428571428572 17.550000000000004L 229.29285714285714 17.550000000000004Q 232.29285714285714 17.550000000000004 232.29285714285714 20.550000000000004L 232.29285714285714 20.550000000000004L 232.29285714285714 78L 232.29285714285714 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskem3arr52)" pathTo="M 206.56428571428572 78L 206.56428571428572 20.550000000000004Q 206.56428571428572 17.550000000000004 209.56428571428572 17.550000000000004L 229.29285714285714 17.550000000000004Q 232.29285714285714 17.550000000000004 232.29285714285714 20.550000000000004L 232.29285714285714 20.550000000000004L 232.29285714285714 78L 232.29285714285714 78z" pathFrom="M 206.56428571428572 78L 206.56428571428572 78L 232.29285714285714 78L 232.29285714285714 78L 232.29285714285714 78L 232.29285714285714 78L 232.29285714285714 78L 206.56428571428572 78" cy="17.550000000000004" cx="238.20714285714286" j="6" val="155" barHeight="60.449999999999996" barWidth="30.72857142857143"></path>
                                                    <g id="SvgjsG31694" class="apexcharts-bar-goals-markers" style="pointer-events: none">
                                                        <g id="SvgjsG31695" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31697" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31699" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31701" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31703" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31705" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31707" className="apexcharts-bar-goals-groups"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG31693" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine31729" x1="0" y1="0" x2="239" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine31730" x1="0" y1="0" x2="239" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG31731" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG31732" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG31733" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG31718" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG31681" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 70px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title" style="font-family: Inter, sans-serif; font-size: 14px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(26, 86, 219);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Inter, sans-serif; font-size: 14px;">
                                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Users Chart -->
                        <div class="flex-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <div class="w-full">
                                <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">Usuarios</h3>
                                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
                            </div>
                            <div class="w-full" id="week-signups-chart" style="min-height: 155px;">
                                <div id="apexchartsuh3dkruw" class="apexcharts-canvas apexchartsuh3dkruw apexcharts-theme-light" style="width: 261px; height: 140px;"><svg id="SvgjsSvg31734" width="261" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG31736" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 30)">
                                            <defs id="SvgjsDefs31735">
                                                <linearGradient id="SvgjsLinearGradient31740" x1="0" y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop31741" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop31742" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop31743" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskuh3dkruw">
                                                    <rect id="SvgjsRect31745" width="243" height="78" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskuh3dkruw"></clipPath>
                                                <clipPath id="nonForecastMaskuh3dkruw"></clipPath>
                                                <clipPath id="gridRectMarkerMaskuh3dkruw">
                                                    <rect id="SvgjsRect31746" width="243" height="82" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect31744" width="8.535714285714286" height="78" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient31740)" class="apexcharts-xcrosshairs" y2="78" filter="none" fill-opacity="0.9"></rect>
                                            <g id="SvgjsG31772" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG31773" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                            </g>
                                            <g id="SvgjsG31782" class="apexcharts-grid">
                                                <g id="SvgjsG31783" class="apexcharts-gridlines-horizontal" style="display: none;">
                                                    <line id="SvgjsLine31785" x1="0" y1="0" x2="239" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31786" x1="0" y1="15.6" x2="239" y2="15.6" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31787" x1="0" y1="31.2" x2="239" y2="31.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31788" x1="0" y1="46.8" x2="239" y2="46.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31789" x1="0" y1="62.4" x2="239" y2="62.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine31790" x1="0" y1="78" x2="239" y2="78" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG31784" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                                <line id="SvgjsLine31792" x1="0" y1="78" x2="239" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine31791" x1="0" y1="1" x2="0" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG31747" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG31748" class="apexcharts-series" rel="1" seriesName="Users" data:realIndex="0">
                                                    <rect id="SvgjsRect31751" width="8.535714285714286" height="78" x="12.80357142857143" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31753" d="M 12.80357142857143 78L 12.80357142857143 46.315999999999995Q 12.80357142857143 43.315999999999995 15.80357142857143 43.315999999999995L 18.339285714285715 43.315999999999995Q 21.339285714285715 43.315999999999995 21.339285714285715 46.315999999999995L 21.339285714285715 46.315999999999995L 21.339285714285715 78L 21.339285714285715 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 12.80357142857143 78L 12.80357142857143 46.315999999999995Q 12.80357142857143 43.315999999999995 15.80357142857143 43.315999999999995L 18.339285714285715 43.315999999999995Q 21.339285714285715 43.315999999999995 21.339285714285715 46.315999999999995L 21.339285714285715 46.315999999999995L 21.339285714285715 78L 21.339285714285715 78z" pathFrom="M 12.589285714285714 78L 12.589285714285714 46.315999999999995Q 12.589285714285714 43.315999999999995 15.589285714285714 43.315999999999995L 17.982142857142854 43.315999999999995Q 20.982142857142854 43.315999999999995 20.982142857142854 46.315999999999995L 20.982142857142854 46.315999999999995L 20.982142857142854 78L 20.982142857142854 78zL 12.80357142857143 78L 21.339285714285715 78L 21.339285714285715 78L 21.339285714285715 78L 21.339285714285715 78L 21.339285714285715 78L 12.80357142857143 78" cy="43.315999999999995" cx="46.94642857142858" j="0" val="1334" barHeight="34.684000000000005" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31754" width="8.535714285714286" height="78" x="46.94642857142858" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31756" d="M 46.94642857142858 78L 46.94642857142858 17.689999999999998Q 46.94642857142858 14.689999999999998 49.94642857142858 14.689999999999998L 52.48214285714286 14.689999999999998Q 55.48214285714286 14.689999999999998 55.48214285714286 17.689999999999998L 55.48214285714286 17.689999999999998L 55.48214285714286 78L 55.48214285714286 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 46.94642857142858 78L 46.94642857142858 17.689999999999998Q 46.94642857142858 14.689999999999998 49.94642857142858 14.689999999999998L 52.48214285714286 14.689999999999998Q 55.48214285714286 14.689999999999998 55.48214285714286 17.689999999999998L 55.48214285714286 17.689999999999998L 55.48214285714286 78L 55.48214285714286 78z" pathFrom="M 46.160714285714285 78L 46.160714285714285 17.689999999999998Q 46.160714285714285 14.689999999999998 49.160714285714285 14.689999999999998L 51.55357142857143 14.689999999999998Q 54.55357142857143 14.689999999999998 54.55357142857143 17.689999999999998L 54.55357142857143 17.689999999999998L 54.55357142857143 78L 54.55357142857143 78zL 46.94642857142858 78L 55.48214285714286 78L 55.48214285714286 78L 55.48214285714286 78L 55.48214285714286 78L 55.48214285714286 78L 46.94642857142858 78" cy="14.689999999999998" cx="81.08928571428572" j="1" val="2435" barHeight="63.31" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31757" width="8.535714285714286" height="78" x="81.08928571428572" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31759" d="M 81.08928571428572 78L 81.08928571428572 35.422Q 81.08928571428572 32.422 84.08928571428572 32.422L 86.62500000000001 32.422Q 89.62500000000001 32.422 89.62500000000001 35.422L 89.62500000000001 35.422L 89.62500000000001 78L 89.62500000000001 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 81.08928571428572 78L 81.08928571428572 35.422Q 81.08928571428572 32.422 84.08928571428572 32.422L 86.62500000000001 32.422Q 89.62500000000001 32.422 89.62500000000001 35.422L 89.62500000000001 35.422L 89.62500000000001 78L 89.62500000000001 78z" pathFrom="M 79.73214285714286 78L 79.73214285714286 35.422Q 79.73214285714286 32.422 82.73214285714286 32.422L 85.125 32.422Q 88.125 32.422 88.125 35.422L 88.125 35.422L 88.125 78L 88.125 78zL 81.08928571428572 78L 89.62500000000001 78L 89.62500000000001 78L 89.62500000000001 78L 89.62500000000001 78L 89.62500000000001 78L 81.08928571428572 78" cy="32.422" cx="115.23214285714286" j="2" val="1753" barHeight="45.578" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31760" width="8.535714285714286" height="78" x="115.23214285714286" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31762" d="M 115.23214285714286 78L 115.23214285714286 46.472Q 115.23214285714286 43.472 118.23214285714286 43.472L 120.76785714285715 43.472Q 123.76785714285715 43.472 123.76785714285715 46.472L 123.76785714285715 46.472L 123.76785714285715 78L 123.76785714285715 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 115.23214285714286 78L 115.23214285714286 46.472Q 115.23214285714286 43.472 118.23214285714286 43.472L 120.76785714285715 43.472Q 123.76785714285715 43.472 123.76785714285715 46.472L 123.76785714285715 46.472L 123.76785714285715 78L 123.76785714285715 78z" pathFrom="M 113.30357142857143 78L 113.30357142857143 46.472Q 113.30357142857143 43.472 116.30357142857143 43.472L 118.69642857142857 43.472Q 121.69642857142857 43.472 121.69642857142857 46.472L 121.69642857142857 46.472L 121.69642857142857 78L 121.69642857142857 78zL 115.23214285714286 78L 123.76785714285715 78L 123.76785714285715 78L 123.76785714285715 78L 123.76785714285715 78L 123.76785714285715 78L 115.23214285714286 78" cy="43.472" cx="149.375" j="3" val="1328" barHeight="34.528" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31763" width="8.535714285714286" height="78" x="149.375" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31765" d="M 149.375 78L 149.375 50.97Q 149.375 47.97 152.375 47.97L 154.91071428571428 47.97Q 157.91071428571428 47.97 157.91071428571428 50.97L 157.91071428571428 50.97L 157.91071428571428 78L 157.91071428571428 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 149.375 78L 149.375 50.97Q 149.375 47.97 152.375 47.97L 154.91071428571428 47.97Q 157.91071428571428 47.97 157.91071428571428 50.97L 157.91071428571428 50.97L 157.91071428571428 78L 157.91071428571428 78z" pathFrom="M 146.875 78L 146.875 50.97Q 146.875 47.97 149.875 47.97L 152.26785714285714 47.97Q 155.26785714285714 47.97 155.26785714285714 50.97L 155.26785714285714 50.97L 155.26785714285714 78L 155.26785714285714 78zL 149.375 78L 157.91071428571428 78L 157.91071428571428 78L 157.91071428571428 78L 157.91071428571428 78L 157.91071428571428 78L 149.375 78" cy="47.97" cx="183.51785714285714" j="4" val="1155" barHeight="30.03" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31766" width="8.535714285714286" height="78" x="183.51785714285714" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31768" d="M 183.51785714285714 78L 183.51785714285714 38.568Q 183.51785714285714 35.568 186.51785714285714 35.568L 189.05357142857142 35.568Q 192.05357142857142 35.568 192.05357142857142 38.568L 192.05357142857142 38.568L 192.05357142857142 78L 192.05357142857142 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 183.51785714285714 78L 183.51785714285714 38.568Q 183.51785714285714 35.568 186.51785714285714 35.568L 189.05357142857142 35.568Q 192.05357142857142 35.568 192.05357142857142 38.568L 192.05357142857142 38.568L 192.05357142857142 78L 192.05357142857142 78z" pathFrom="M 180.44642857142856 78L 180.44642857142856 38.568Q 180.44642857142856 35.568 183.44642857142856 35.568L 185.8392857142857 35.568Q 188.8392857142857 35.568 188.8392857142857 38.568L 188.8392857142857 38.568L 188.8392857142857 78L 188.8392857142857 78zL 183.51785714285714 78L 192.05357142857142 78L 192.05357142857142 78L 192.05357142857142 78L 192.05357142857142 78L 192.05357142857142 78L 183.51785714285714 78" cy="35.568" cx="217.66071428571428" j="5" val="1632" barHeight="42.432" barWidth="8.535714285714286"></path>
                                                    <rect id="SvgjsRect31769" width="8.535714285714286" height="78" x="217.66071428571428" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#374151" class="apexcharts-backgroundBar"></rect>
                                                    <path id="SvgjsPath31771" d="M 217.66071428571428 78L 217.66071428571428 46.263999999999996Q 217.66071428571428 43.263999999999996 220.66071428571428 43.263999999999996L 223.19642857142856 43.263999999999996Q 226.19642857142856 43.263999999999996 226.19642857142856 46.263999999999996L 226.19642857142856 46.263999999999996L 226.19642857142856 78L 226.19642857142856 78z" fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskuh3dkruw)" pathTo="M 217.66071428571428 78L 217.66071428571428 46.263999999999996Q 217.66071428571428 43.263999999999996 220.66071428571428 43.263999999999996L 223.19642857142856 43.263999999999996Q 226.19642857142856 43.263999999999996 226.19642857142856 46.263999999999996L 226.19642857142856 46.263999999999996L 226.19642857142856 78L 226.19642857142856 78z" pathFrom="M 214.0178571428571 78L 214.0178571428571 46.263999999999996Q 214.0178571428571 43.263999999999996 217.0178571428571 43.263999999999996L 219.41071428571425 43.263999999999996Q 222.41071428571425 43.263999999999996 222.41071428571425 46.263999999999996L 222.41071428571425 46.263999999999996L 222.41071428571425 78L 222.41071428571425 78zL 217.66071428571428 78L 226.19642857142856 78L 226.19642857142856 78L 226.19642857142856 78L 226.19642857142856 78L 226.19642857142856 78L 217.66071428571428 78" cy="43.263999999999996" cx="251.80357142857142" j="6" val="1336" barHeight="34.736000000000004" barWidth="8.535714285714286"></path>
                                                    <g id="SvgjsG31750" class="apexcharts-bar-goals-markers" style="pointer-events: none">
                                                        <g id="SvgjsG31752" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31755" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31758" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31761" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31764" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31767" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG31770" className="apexcharts-bar-goals-groups"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG31749" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine31793" x1="0" y1="0" x2="239" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine31794" x1="0" y1="0" x2="239" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG31795" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG31796" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG31797" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG31781" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG31737" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 70px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title" style="font-family: Inter, sans-serif; font-size: 14px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(26, 86, 219);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Inter, sans-serif; font-size: 14px;">
                                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <?php 
                if($_SESSION['TODO'][0]->rol_nombre == 'tecnico')
                {
                    //sin asignar
                        require __DIR__ . '/components/section/02_list_ticket_tecnic.php';
                        
                    //asignados
                        require __DIR__ . '/components/section/03_list_ticket_tecnic.php';
                } 
                
                ?>  
                
            </div>
        </main>

    </div>
</div>


<? require_once __DIR__ . '/components/ticket/ticket-chart.php' ?>