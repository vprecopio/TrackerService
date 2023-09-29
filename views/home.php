<?php

use App\Http\Controllers\ClientController;

$client_controller = new ClientController;
$cantclient = $client_controller->CountClient();


?>
<div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 min-h-screen">
    <div class="px-4 pt-6">


        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                        New products
                    </h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
                    <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                        <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                            </svg>
                            12.5%
                        </span>
                        Since last month
                    </p>
                </div>
                <div class="w-full" id="new-products-chart" style="min-height: 155px;">
                    <div id="apexchartsr08rygj8" class="apexcharts-canvas apexchartsr08rygj8 apexcharts-theme-light" style="width: 222px; height: 140px;"><svg id="SvgjsSvg1479" width="222" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1532" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            <g id="SvgjsG1481" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 30)">
                                <defs id="SvgjsDefs1480">
                                    <linearGradient id="SvgjsLinearGradient1485" x1="0" y1="0" x2="0" y2="1">
                                        <stop id="SvgjsStop1486" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                        <stop id="SvgjsStop1487" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        <stop id="SvgjsStop1488" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                    </linearGradient>
                                    <clipPath id="gridRectMaskr08rygj8">
                                        <rect id="SvgjsRect1490" width="209" height="83" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskr08rygj8"></clipPath>
                                    <clipPath id="nonForecastMaskr08rygj8"></clipPath>
                                    <clipPath id="gridRectMarkerMaskr08rygj8">
                                        <rect id="SvgjsRect1491" width="204" height="82" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <rect id="SvgjsRect1489" width="25.714285714285715" height="78" x="30.000000000000004" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1485)" class="apexcharts-xcrosshairs" y2="78" filter="none" fill-opacity="0.9" x1="30.000000000000004" x2="30.000000000000004"></rect>
                                <g id="SvgjsG1510" class="apexcharts-grid">
                                    <g id="SvgjsG1511" class="apexcharts-gridlines-horizontal" style="display: none;">
                                        <line id="SvgjsLine1515" x1="0" y1="19.5" x2="200" y2="19.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1516" x1="0" y1="39" x2="200" y2="39" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1517" x1="0" y1="58.5" x2="200" y2="58.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1512" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                    <line id="SvgjsLine1520" x1="0" y1="78" x2="200" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    <line id="SvgjsLine1519" x1="0" y1="1" x2="0" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                </g>
                                <g id="SvgjsG1492" class="apexcharts-bar-series apexcharts-plot-series">
                                    <g id="SvgjsG1493" class="apexcharts-series" rel="1" seriesName="Quantity" data:realIndex="0">
                                        <path id="SvgjsPath1497" d="M 1.4285714285714288 75.001 L 1.4285714285714288 14.701000000000002 C 1.4285714285714288 13.201000000000002 2.928571428571429 11.701000000000002 4.428571428571429 11.701000000000002 L 19.142857142857146 11.701000000000002 C 20.642857142857146 11.701000000000002 22.142857142857146 13.201000000000002 22.142857142857146 14.701000000000002 L 22.142857142857146 75.001 C 22.142857142857146 76.501 20.642857142857146 78.001 19.142857142857146 78.001 L 4.428571428571429 78.001 C 2.928571428571429 78.001 1.4285714285714288 76.501 1.4285714285714288 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 1.4285714285714288 75.001 L 1.4285714285714288 14.701000000000002 C 1.4285714285714288 13.201000000000002 2.928571428571429 11.701000000000002 4.428571428571429 11.701000000000002 L 19.142857142857146 11.701000000000002 C 20.642857142857146 11.701000000000002 22.142857142857146 13.201000000000002 22.142857142857146 14.701000000000002 L 22.142857142857146 75.001 C 22.142857142857146 76.501 20.642857142857146 78.001 19.142857142857146 78.001 L 4.428571428571429 78.001 C 2.928571428571429 78.001 1.4285714285714288 76.501 1.4285714285714288 75.001 Z " pathFrom="M 1.4285714285714288 78.001 L 1.4285714285714288 78.001 L 22.142857142857146 78.001 L 22.142857142857146 78.001 L 22.142857142857146 78.001 L 22.142857142857146 78.001 L 22.142857142857146 78.001 L 1.4285714285714288 78.001 Z" cy="11.700000000000003" cx="27.5" j="0" val="170" barHeight="66.3" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1499" d="M 30 75.001 L 30 10.801000000000013 C 30 9.301000000000013 31.5 7.801000000000012 33 7.801000000000012 L 47.714285714285715 7.801000000000012 C 49.214285714285715 7.801000000000012 50.714285714285715 9.301000000000013 50.714285714285715 10.801000000000013 L 50.714285714285715 75.001 C 50.714285714285715 76.501 49.214285714285715 78.001 47.714285714285715 78.001 L 33 78.001 C 31.5 78.001 30 76.501 30 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 30 75.001 L 30 10.801000000000013 C 30 9.301000000000013 31.5 7.801000000000012 33 7.801000000000012 L 47.714285714285715 7.801000000000012 C 49.214285714285715 7.801000000000012 50.714285714285715 9.301000000000013 50.714285714285715 10.801000000000013 L 50.714285714285715 75.001 C 50.714285714285715 76.501 49.214285714285715 78.001 47.714285714285715 78.001 L 33 78.001 C 31.5 78.001 30 76.501 30 75.001 Z " pathFrom="M 30 78.001 L 30 78.001 L 50.714285714285715 78.001 L 50.714285714285715 78.001 L 50.714285714285715 78.001 L 50.714285714285715 78.001 L 50.714285714285715 78.001 L 30 78.001 Z" cy="7.800000000000011" cx="56.07142857142857" j="1" val="180" barHeight="70.19999999999999" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1501" d="M 58.57142857142857 75.001 L 58.57142857142857 17.041000000000004 C 58.57142857142857 15.541000000000004 60.07142857142857 14.041000000000006 61.57142857142857 14.041000000000006 L 76.28571428571428 14.041000000000006 C 77.78571428571428 14.041000000000006 79.28571428571428 15.541000000000004 79.28571428571428 17.041000000000004 L 79.28571428571428 75.001 C 79.28571428571428 76.501 77.78571428571428 78.001 76.28571428571428 78.001 L 61.57142857142857 78.001 C 60.07142857142857 78.001 58.57142857142857 76.501 58.57142857142857 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 58.57142857142857 75.001 L 58.57142857142857 17.041000000000004 C 58.57142857142857 15.541000000000004 60.07142857142857 14.041000000000006 61.57142857142857 14.041000000000006 L 76.28571428571428 14.041000000000006 C 77.78571428571428 14.041000000000006 79.28571428571428 15.541000000000004 79.28571428571428 17.041000000000004 L 79.28571428571428 75.001 C 79.28571428571428 76.501 77.78571428571428 78.001 76.28571428571428 78.001 L 61.57142857142857 78.001 C 60.07142857142857 78.001 58.57142857142857 76.501 58.57142857142857 75.001 Z " pathFrom="M 58.57142857142857 78.001 L 58.57142857142857 78.001 L 79.28571428571428 78.001 L 79.28571428571428 78.001 L 79.28571428571428 78.001 L 79.28571428571428 78.001 L 79.28571428571428 78.001 L 58.57142857142857 78.001 Z" cy="14.040000000000006" cx="84.64285714285714" j="2" val="164" barHeight="63.959999999999994" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1503" d="M 87.14285714285714 75.001 L 87.14285714285714 24.451000000000004 C 87.14285714285714 22.951000000000004 88.64285714285714 21.451000000000004 90.14285714285714 21.451000000000004 L 104.85714285714286 21.451000000000004 C 106.35714285714286 21.451000000000004 107.85714285714286 22.951000000000004 107.85714285714286 24.451000000000004 L 107.85714285714286 75.001 C 107.85714285714286 76.501 106.35714285714286 78.001 104.85714285714286 78.001 L 90.14285714285714 78.001 C 88.64285714285714 78.001 87.14285714285714 76.501 87.14285714285714 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 87.14285714285714 75.001 L 87.14285714285714 24.451000000000004 C 87.14285714285714 22.951000000000004 88.64285714285714 21.451000000000004 90.14285714285714 21.451000000000004 L 104.85714285714286 21.451000000000004 C 106.35714285714286 21.451000000000004 107.85714285714286 22.951000000000004 107.85714285714286 24.451000000000004 L 107.85714285714286 75.001 C 107.85714285714286 76.501 106.35714285714286 78.001 104.85714285714286 78.001 L 90.14285714285714 78.001 C 88.64285714285714 78.001 87.14285714285714 76.501 87.14285714285714 75.001 Z " pathFrom="M 87.14285714285714 78.001 L 87.14285714285714 78.001 L 107.85714285714286 78.001 L 107.85714285714286 78.001 L 107.85714285714286 78.001 L 107.85714285714286 78.001 L 107.85714285714286 78.001 L 87.14285714285714 78.001 Z" cy="21.450000000000003" cx="113.21428571428571" j="3" val="145" barHeight="56.55" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1505" d="M 115.71428571428571 75.001 L 115.71428571428571 5.341000000000004 C 115.71428571428571 3.8410000000000037 117.21428571428571 2.3410000000000033 118.71428571428571 2.3410000000000033 L 133.42857142857142 2.3410000000000033 C 134.92857142857142 2.3410000000000033 136.42857142857142 3.8410000000000037 136.42857142857142 5.341000000000004 L 136.42857142857142 75.001 C 136.42857142857142 76.501 134.92857142857142 78.001 133.42857142857142 78.001 L 118.71428571428571 78.001 C 117.21428571428571 78.001 115.71428571428571 76.501 115.71428571428571 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 115.71428571428571 75.001 L 115.71428571428571 5.341000000000004 C 115.71428571428571 3.8410000000000037 117.21428571428571 2.3410000000000033 118.71428571428571 2.3410000000000033 L 133.42857142857142 2.3410000000000033 C 134.92857142857142 2.3410000000000033 136.42857142857142 3.8410000000000037 136.42857142857142 5.341000000000004 L 136.42857142857142 75.001 C 136.42857142857142 76.501 134.92857142857142 78.001 133.42857142857142 78.001 L 118.71428571428571 78.001 C 117.21428571428571 78.001 115.71428571428571 76.501 115.71428571428571 75.001 Z " pathFrom="M 115.71428571428571 78.001 L 115.71428571428571 78.001 L 136.42857142857142 78.001 L 136.42857142857142 78.001 L 136.42857142857142 78.001 L 136.42857142857142 78.001 L 136.42857142857142 78.001 L 115.71428571428571 78.001 Z" cy="2.3400000000000034" cx="141.78571428571428" j="4" val="194" barHeight="75.66" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1507" d="M 144.28571428571428 75.001 L 144.28571428571428 14.701000000000002 C 144.28571428571428 13.201000000000002 145.78571428571428 11.701000000000002 147.28571428571428 11.701000000000002 L 162 11.701000000000002 C 163.5 11.701000000000002 165 13.201000000000002 165 14.701000000000002 L 165 75.001 C 165 76.501 163.5 78.001 162 78.001 L 147.28571428571428 78.001 C 145.78571428571428 78.001 144.28571428571428 76.501 144.28571428571428 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 144.28571428571428 75.001 L 144.28571428571428 14.701000000000002 C 144.28571428571428 13.201000000000002 145.78571428571428 11.701000000000002 147.28571428571428 11.701000000000002 L 162 11.701000000000002 C 163.5 11.701000000000002 165 13.201000000000002 165 14.701000000000002 L 165 75.001 C 165 76.501 163.5 78.001 162 78.001 L 147.28571428571428 78.001 C 145.78571428571428 78.001 144.28571428571428 76.501 144.28571428571428 75.001 Z " pathFrom="M 144.28571428571428 78.001 L 144.28571428571428 78.001 L 165 78.001 L 165 78.001 L 165 78.001 L 165 78.001 L 165 78.001 L 144.28571428571428 78.001 Z" cy="11.700000000000003" cx="170.35714285714286" j="5" val="170" barHeight="66.3" barWidth="25.714285714285715"></path>
                                        <path id="SvgjsPath1509" d="M 172.85714285714286 75.001 L 172.85714285714286 20.551000000000005 C 172.85714285714286 19.051000000000005 174.35714285714286 17.551000000000005 175.85714285714286 17.551000000000005 L 190.57142857142858 17.551000000000005 C 192.07142857142858 17.551000000000005 193.57142857142858 19.051000000000005 193.57142857142858 20.551000000000005 L 193.57142857142858 75.001 C 193.57142857142858 76.501 192.07142857142858 78.001 190.57142857142858 78.001 L 175.85714285714286 78.001 C 174.35714285714286 78.001 172.85714285714286 76.501 172.85714285714286 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="5" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskr08rygj8)" pathTo="M 172.85714285714286 75.001 L 172.85714285714286 20.551000000000005 C 172.85714285714286 19.051000000000005 174.35714285714286 17.551000000000005 175.85714285714286 17.551000000000005 L 190.57142857142858 17.551000000000005 C 192.07142857142858 17.551000000000005 193.57142857142858 19.051000000000005 193.57142857142858 20.551000000000005 L 193.57142857142858 75.001 C 193.57142857142858 76.501 192.07142857142858 78.001 190.57142857142858 78.001 L 175.85714285714286 78.001 C 174.35714285714286 78.001 172.85714285714286 76.501 172.85714285714286 75.001 Z " pathFrom="M 172.85714285714286 78.001 L 172.85714285714286 78.001 L 193.57142857142858 78.001 L 193.57142857142858 78.001 L 193.57142857142858 78.001 L 193.57142857142858 78.001 L 193.57142857142858 78.001 L 172.85714285714286 78.001 Z" cy="17.550000000000004" cx="198.92857142857144" j="6" val="155" barHeight="60.449999999999996" barWidth="25.714285714285715"></path>
                                        <g id="SvgjsG1495" class="apexcharts-bar-goals-markers" style="pointer-events: none">
                                            <g id="SvgjsG1496" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1498" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1500" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1502" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1504" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1506" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1508" className="apexcharts-bar-goals-groups"></g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1494" class="apexcharts-datalabels" data:realIndex="0"></g>
                                </g>
                                <g id="SvgjsG1513" class="apexcharts-grid-borders" style="display: none;">
                                    <line id="SvgjsLine1514" x1="0" y1="0" x2="200" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1518" x1="0" y1="78" x2="200" y2="78" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <line id="SvgjsLine1521" x1="0" y1="0" x2="200" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1522" x1="0" y1="0" x2="200" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG1523" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG1524" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                </g>
                                <g id="SvgjsG1533" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG1534" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG1535" class="apexcharts-point-annotations"></g>
                            </g>
                            <g id="SvgjsG1482" class="apexcharts-annotations"></g>
                        </svg>
                        <div class="apexcharts-legend" style="max-height: 70px;"></div>
                        <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 60.8571px; top: 30px;">
                            <div class="apexcharts-tooltip-title" style="font-family: Inter, sans-serif; font-size: 14px;">02 Feb</div>
                            <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(26, 86, 219);"></span>
                                <div class="apexcharts-tooltip-text" style="font-family: Inter, sans-serif; font-size: 14px;">
                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Quantity: </span><span class="apexcharts-tooltip-text-y-value">180</span></div>
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
            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Clientes 
                    </h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= $cantclient[0]->cantclient?></span>
                    <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                        <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                            </svg>
                            3,4%
                        </span>
                        Since last month
                    </p>
                </div>
                <div class="w-full" id="week-signups-chart" style="min-height: 155px;">
                    <div id="apexchartsqj1nw9uth" class="apexcharts-canvas apexchartsqj1nw9uth apexcharts-theme-light" style="width: 222px; height: 140px;"><svg id="SvgjsSvg1627" width="222" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1688" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            <g id="SvgjsG1629" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 30)">
                                <defs id="SvgjsDefs1628">
                                    <linearGradient id="SvgjsLinearGradient1633" x1="0" y1="0" x2="0" y2="1">
                                        <stop id="SvgjsStop1634" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                        <stop id="SvgjsStop1635" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        <stop id="SvgjsStop1636" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                    </linearGradient>
                                    <clipPath id="gridRectMaskqj1nw9uth">
                                        <rect id="SvgjsRect1638" width="204" height="78" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskqj1nw9uth"></clipPath>
                                    <clipPath id="nonForecastMaskqj1nw9uth"></clipPath>
                                    <clipPath id="gridRectMarkerMaskqj1nw9uth">
                                        <rect id="SvgjsRect1639" width="204" height="82" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <rect id="SvgjsRect1637" width="7.142857142857143" height="78" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1633)" class="apexcharts-xcrosshairs" y2="78" filter="none" fill-opacity="0.9"></rect>
                                <g id="SvgjsG1665" class="apexcharts-grid">
                                    <g id="SvgjsG1666" class="apexcharts-gridlines-horizontal" style="display: none;">
                                        <line id="SvgjsLine1670" x1="0" y1="15.6" x2="200" y2="15.6" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1671" x1="0" y1="31.2" x2="200" y2="31.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1672" x1="0" y1="46.8" x2="200" y2="46.8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1673" x1="0" y1="62.4" x2="200" y2="62.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1667" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                    <line id="SvgjsLine1676" x1="0" y1="78" x2="200" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    <line id="SvgjsLine1675" x1="0" y1="1" x2="0" y2="78" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                </g>
                                <g id="SvgjsG1640" class="apexcharts-bar-series apexcharts-plot-series">
                                    <g id="SvgjsG1641" class="apexcharts-series" rel="1" seriesName="Users" data:realIndex="0">
                                        <rect id="SvgjsRect1644" width="7.142857142857143" height="78" x="10.714285714285715" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1646" d="M 10.714285714285715 75.001 L 10.714285714285715 46.31699999999999 C 10.714285714285715 44.81699999999999 12.214285714285715 43.31699999999999 13.714285714285715 43.31699999999999 L 14.857142857142858 43.31699999999999 C 16.357142857142858 43.31699999999999 17.857142857142858 44.81699999999999 17.857142857142858 46.31699999999999 L 17.857142857142858 75.001 C 17.857142857142858 76.501 16.357142857142858 78.001 14.857142857142858 78.001 L 13.714285714285715 78.001 C 12.214285714285715 78.001 10.714285714285715 76.501 10.714285714285715 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 10.714285714285715 75.001 L 10.714285714285715 46.31699999999999 C 10.714285714285715 44.81699999999999 12.214285714285715 43.31699999999999 13.714285714285715 43.31699999999999 L 14.857142857142858 43.31699999999999 C 16.357142857142858 43.31699999999999 17.857142857142858 44.81699999999999 17.857142857142858 46.31699999999999 L 17.857142857142858 75.001 C 17.857142857142858 76.501 16.357142857142858 78.001 14.857142857142858 78.001 L 13.714285714285715 78.001 C 12.214285714285715 78.001 10.714285714285715 76.501 10.714285714285715 75.001 Z " pathFrom="M 10.714285714285715 78.001 L 10.714285714285715 78.001 L 17.857142857142858 78.001 L 17.857142857142858 78.001 L 17.857142857142858 78.001 L 17.857142857142858 78.001 L 17.857142857142858 78.001 L 10.714285714285715 78.001 Z" cy="43.315999999999995" cx="39.28571428571429" j="0" val="1334" barHeight="34.684000000000005" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1647" width="7.142857142857143" height="78" x="39.28571428571429" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1649" d="M 39.28571428571429 75.001 L 39.28571428571429 17.690999999999995 C 39.28571428571429 16.190999999999995 40.78571428571429 14.690999999999997 42.28571428571429 14.690999999999997 L 43.42857142857144 14.690999999999997 C 44.92857142857144 14.690999999999997 46.42857142857144 16.190999999999995 46.42857142857144 17.690999999999995 L 46.42857142857144 75.001 C 46.42857142857144 76.501 44.92857142857144 78.001 43.42857142857144 78.001 L 42.28571428571429 78.001 C 40.78571428571429 78.001 39.28571428571429 76.501 39.28571428571429 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 39.28571428571429 75.001 L 39.28571428571429 17.690999999999995 C 39.28571428571429 16.190999999999995 40.78571428571429 14.690999999999997 42.28571428571429 14.690999999999997 L 43.42857142857144 14.690999999999997 C 44.92857142857144 14.690999999999997 46.42857142857144 16.190999999999995 46.42857142857144 17.690999999999995 L 46.42857142857144 75.001 C 46.42857142857144 76.501 44.92857142857144 78.001 43.42857142857144 78.001 L 42.28571428571429 78.001 C 40.78571428571429 78.001 39.28571428571429 76.501 39.28571428571429 75.001 Z " pathFrom="M 39.28571428571429 78.001 L 39.28571428571429 78.001 L 46.42857142857144 78.001 L 46.42857142857144 78.001 L 46.42857142857144 78.001 L 46.42857142857144 78.001 L 46.42857142857144 78.001 L 39.28571428571429 78.001 Z" cy="14.689999999999998" cx="67.85714285714286" j="1" val="2435" barHeight="63.31" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1650" width="7.142857142857143" height="78" x="67.85714285714286" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1652" d="M 67.85714285714286 75.001 L 67.85714285714286 35.422999999999995 C 67.85714285714286 33.922999999999995 69.35714285714286 32.422999999999995 70.85714285714286 32.422999999999995 L 72 32.422999999999995 C 73.5 32.422999999999995 75 33.922999999999995 75 35.422999999999995 L 75 75.001 C 75 76.501 73.5 78.001 72 78.001 L 70.85714285714286 78.001 C 69.35714285714286 78.001 67.85714285714286 76.501 67.85714285714286 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 67.85714285714286 75.001 L 67.85714285714286 35.422999999999995 C 67.85714285714286 33.922999999999995 69.35714285714286 32.422999999999995 70.85714285714286 32.422999999999995 L 72 32.422999999999995 C 73.5 32.422999999999995 75 33.922999999999995 75 35.422999999999995 L 75 75.001 C 75 76.501 73.5 78.001 72 78.001 L 70.85714285714286 78.001 C 69.35714285714286 78.001 67.85714285714286 76.501 67.85714285714286 75.001 Z " pathFrom="M 67.85714285714286 78.001 L 67.85714285714286 78.001 L 75 78.001 L 75 78.001 L 75 78.001 L 75 78.001 L 75 78.001 L 67.85714285714286 78.001 Z" cy="32.422" cx="96.42857142857143" j="2" val="1753" barHeight="45.578" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1653" width="7.142857142857143" height="78" x="96.42857142857143" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1655" d="M 96.42857142857143 75.001 L 96.42857142857143 46.473 C 96.42857142857143 44.973 97.92857142857143 43.473 99.42857142857143 43.473 L 100.57142857142857 43.473 C 102.07142857142857 43.473 103.57142857142857 44.973 103.57142857142857 46.473 L 103.57142857142857 75.001 C 103.57142857142857 76.501 102.07142857142857 78.001 100.57142857142857 78.001 L 99.42857142857143 78.001 C 97.92857142857143 78.001 96.42857142857143 76.501 96.42857142857143 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 96.42857142857143 75.001 L 96.42857142857143 46.473 C 96.42857142857143 44.973 97.92857142857143 43.473 99.42857142857143 43.473 L 100.57142857142857 43.473 C 102.07142857142857 43.473 103.57142857142857 44.973 103.57142857142857 46.473 L 103.57142857142857 75.001 C 103.57142857142857 76.501 102.07142857142857 78.001 100.57142857142857 78.001 L 99.42857142857143 78.001 C 97.92857142857143 78.001 96.42857142857143 76.501 96.42857142857143 75.001 Z " pathFrom="M 96.42857142857143 78.001 L 96.42857142857143 78.001 L 103.57142857142857 78.001 L 103.57142857142857 78.001 L 103.57142857142857 78.001 L 103.57142857142857 78.001 L 103.57142857142857 78.001 L 96.42857142857143 78.001 Z" cy="43.472" cx="125" j="3" val="1328" barHeight="34.528" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1656" width="7.142857142857143" height="78" x="125" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1658" d="M 125 75.001 L 125 50.971 C 125 49.471 126.5 47.971 128 47.971 L 129.14285714285714 47.971 C 130.64285714285714 47.971 132.14285714285714 49.471 132.14285714285714 50.971 L 132.14285714285714 75.001 C 132.14285714285714 76.501 130.64285714285714 78.001 129.14285714285714 78.001 L 128 78.001 C 126.5 78.001 125 76.501 125 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 125 75.001 L 125 50.971 C 125 49.471 126.5 47.971 128 47.971 L 129.14285714285714 47.971 C 130.64285714285714 47.971 132.14285714285714 49.471 132.14285714285714 50.971 L 132.14285714285714 75.001 C 132.14285714285714 76.501 130.64285714285714 78.001 129.14285714285714 78.001 L 128 78.001 C 126.5 78.001 125 76.501 125 75.001 Z " pathFrom="M 125 78.001 L 125 78.001 L 132.14285714285714 78.001 L 132.14285714285714 78.001 L 132.14285714285714 78.001 L 132.14285714285714 78.001 L 132.14285714285714 78.001 L 125 78.001 Z" cy="47.97" cx="153.57142857142858" j="4" val="1155" barHeight="30.03" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1659" width="7.142857142857143" height="78" x="153.57142857142858" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1661" d="M 153.57142857142858 75.001 L 153.57142857142858 38.568999999999996 C 153.57142857142858 37.068999999999996 155.07142857142858 35.568999999999996 156.57142857142858 35.568999999999996 L 157.71428571428572 35.568999999999996 C 159.21428571428572 35.568999999999996 160.71428571428572 37.068999999999996 160.71428571428572 38.568999999999996 L 160.71428571428572 75.001 C 160.71428571428572 76.501 159.21428571428572 78.001 157.71428571428572 78.001 L 156.57142857142858 78.001 C 155.07142857142858 78.001 153.57142857142858 76.501 153.57142857142858 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 153.57142857142858 75.001 L 153.57142857142858 38.568999999999996 C 153.57142857142858 37.068999999999996 155.07142857142858 35.568999999999996 156.57142857142858 35.568999999999996 L 157.71428571428572 35.568999999999996 C 159.21428571428572 35.568999999999996 160.71428571428572 37.068999999999996 160.71428571428572 38.568999999999996 L 160.71428571428572 75.001 C 160.71428571428572 76.501 159.21428571428572 78.001 157.71428571428572 78.001 L 156.57142857142858 78.001 C 155.07142857142858 78.001 153.57142857142858 76.501 153.57142857142858 75.001 Z " pathFrom="M 153.57142857142858 78.001 L 153.57142857142858 78.001 L 160.71428571428572 78.001 L 160.71428571428572 78.001 L 160.71428571428572 78.001 L 160.71428571428572 78.001 L 160.71428571428572 78.001 L 153.57142857142858 78.001 Z" cy="35.568" cx="182.14285714285717" j="5" val="1632" barHeight="42.432" barWidth="7.142857142857143"></path>
                                        <rect id="SvgjsRect1662" width="7.142857142857143" height="78" x="182.14285714285717" y="0" rx="3" ry="3" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E5E7EB" class="apexcharts-backgroundBar"></rect>
                                        <path id="SvgjsPath1664" d="M 182.14285714285717 75.001 L 182.14285714285717 46.26499999999999 C 182.14285714285717 44.76499999999999 183.64285714285717 43.26499999999999 185.14285714285717 43.26499999999999 L 186.2857142857143 43.26499999999999 C 187.7857142857143 43.26499999999999 189.2857142857143 44.76499999999999 189.2857142857143 46.26499999999999 L 189.2857142857143 75.001 C 189.2857142857143 76.501 187.7857142857143 78.001 186.2857142857143 78.001 L 185.14285714285717 78.001 C 183.64285714285717 78.001 182.14285714285717 76.501 182.14285714285717 75.001 Z " fill="rgba(26,86,219,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqj1nw9uth)" pathTo="M 182.14285714285717 75.001 L 182.14285714285717 46.26499999999999 C 182.14285714285717 44.76499999999999 183.64285714285717 43.26499999999999 185.14285714285717 43.26499999999999 L 186.2857142857143 43.26499999999999 C 187.7857142857143 43.26499999999999 189.2857142857143 44.76499999999999 189.2857142857143 46.26499999999999 L 189.2857142857143 75.001 C 189.2857142857143 76.501 187.7857142857143 78.001 186.2857142857143 78.001 L 185.14285714285717 78.001 C 183.64285714285717 78.001 182.14285714285717 76.501 182.14285714285717 75.001 Z " pathFrom="M 182.14285714285717 78.001 L 182.14285714285717 78.001 L 189.2857142857143 78.001 L 189.2857142857143 78.001 L 189.2857142857143 78.001 L 189.2857142857143 78.001 L 189.2857142857143 78.001 L 182.14285714285717 78.001 Z" cy="43.263999999999996" cx="210.71428571428575" j="6" val="1336" barHeight="34.736000000000004" barWidth="7.142857142857143"></path>
                                        <g id="SvgjsG1643" class="apexcharts-bar-goals-markers" style="pointer-events: none">
                                            <g id="SvgjsG1645" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1648" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1651" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1654" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1657" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1660" className="apexcharts-bar-goals-groups"></g>
                                            <g id="SvgjsG1663" className="apexcharts-bar-goals-groups"></g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1642" class="apexcharts-datalabels" data:realIndex="0"></g>
                                </g>
                                <g id="SvgjsG1668" class="apexcharts-grid-borders" style="display: none;">
                                    <line id="SvgjsLine1669" x1="0" y1="0" x2="200" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1674" x1="0" y1="78" x2="200" y2="78" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <line id="SvgjsLine1677" x1="0" y1="0" x2="200" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1678" x1="0" y1="0" x2="200" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG1679" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG1680" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                                </g>
                                <g id="SvgjsG1689" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG1690" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG1691" class="apexcharts-point-annotations"></g>
                            </g>
                            <g id="SvgjsG1630" class="apexcharts-annotations"></g>
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
</div>