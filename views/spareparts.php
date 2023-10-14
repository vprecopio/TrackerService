<?php

use App\Http\Controllers\SparePartsController;

$nombre_pagina = 'Repuestos';
$nombre_formulario = 'repuestos';

$spareparts_controller = new SparePartsController;

/*#%%#%#%%#%#%%#%#
 1-Corregir Boton editar repuesto. ( no trae los datos seleccionados y no edita)
 2-Corregir boton eliminar repuesto.  
*/#/#/#//#/#/#

$repuestos_form = new AutomaticForm(
    'Nuevo Repuesto', //titulo de boton principal
    'Nuevo Repuesto', // titulo del form
    '/spareparts/createspareparts/',
    'POST',
    'bg-blue-700',
    [
            'repuesto-nom' => [
            'title_label' => 'Repuesto',
            'id_name' => 'nombre-repuesto',
            'type' => 'text',
            'height' => 6,
            'placeholder' => 'Nombre',
            'required' => true,
            ],
        
            'repuesto-des' => [
                'title_label' => 'Descripcion',
                'id_name' => 'descripcion-repuesto',
                'type' => 'text',
                'height' => 6,
                'placeholder' => 'Descripcion',
                'required' => true,
            ],
            'repuesto-empresa' => [
                'title_label' => 'Selecciona Proveedor',
                'id_name' => 'prov_empresa-repuesto',
                'type' => 'select',
                'height' => 3,
                'required' => true,
                'options' => json_encode($spareparts_controller->ListSpareparts()),
                'options_table' => 'prov_empresa',
            ],
            'repuesto-categoria' => [
            'title_label' => 'Selecciona una Categoria',
            'id_name' => 'descripcion_categoria-repuesto',
            'type' => 'select',
            'height' => 3,
            'required' => true,
            'options' => json_encode($spareparts_controller->ListSpareparts()),
            'options_table' => 'descripcion_categoria',
            ],
        
            'repuesto-stock' => [
                'title_label' => 'Stock',
                'id_name' => 'stock-repuesto',
                'type' => 'text',
                'height' => 6,
                'placeholder' => '0',
                'required' => true,
            ],
            'repuesto-costo' => [
                'title_label' => 'Costo',
                'id_name' => 'costo-repuesto',
                'type' => 'text',
                'height' => 6,
                'placeholder' => '0',
                'required' => true,
            ],
            'repuesto-ganancia' => [
                'title_label' => 'Ganancia',
                'id_name' => 'ganancia-repuesto',
                'type' => 'text',
                'height' => 6,
                'placeholder' => '0',
                'required' => true,
            ],
            'repuesto-stado' => [
                'title_label' => 'Estado',
                'id_name' => 'estado-repuesto',
                'type' => 'select',
                'height' => 6,
                'placeholder' => '0',
                'required' => true,
                

            ]

        
    ]
);

$categoria_form = new AutomaticForm(
    'Nueva categoria', //titulo de boton principal
    'Nueva categoria', // titulo del form
    '/spareparts/createsparecateg/',
    'POST',
    'bg-blue-700',
    [
        'categoria-des' => [
            'title_label' => '',
            'id_name' => 'categoria-descripcion',
            'type' => 'text',
            'height' => 6,
            'placeholder' => 'Categoria',
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
                            <a type="button" href="/spareparts/" type="button" data-refresh="" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center hover:text-white text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                                </svg>
                                Refrescar
                            </a>

                            <!--Form agregar categoria -->
                            <?$categoria_form->GenerateButton() ?>
                            <?$categoria_form->GenerateForm() ?>
                            <!--FIN Agregar Categoria -->

                            <!--Form agregar Repuesto -->
                            <?$repuestos_form->GenerateButton() ?>
                            <?$repuestos_form->GenerateForm() ?>
                            <!--FIN Agregar Repuesto -->

                            
                        </div>
                    </div>
                </div>
            </div>


            <!--Listado Repuestos-->
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <!--Titulos-->
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Repuesto
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Estado
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Descripcion
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Proveedor
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Stock
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Costo
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Ganancia
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Categoria
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>

                                <!--Repuestos-->
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                <?php foreach ($spareparts_controller->ListSpareparts() as $obj_spare) : ?>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                            <!--datos-->
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="repuesto"><?= $obj_spare->nombre?></data>
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                    <?php if ($obj_spare->estado > 0) : ?>
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                        Activo
                                                    <?php else : ?>
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div>
                                                        Inactivo
                                                    <?php endif; ?>
                                                </div>
                                
                                            </td>

                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="descripcion"><?= $obj_spare->descripcion ?></data>
                                            </td>  
                                            
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="proveedor"><?= $obj_spare->prov_empresa?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="stock"><?= $obj_spare->stock ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="costo"><?= $obj_spare->costo ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="ganancia"><?= $obj_spare->ganancia ?></data>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <data value="categoria"><?= $obj_spare->descripcion_categoria ?></data>
                                            </td>

                                            <!--botones editar y eliminar-->
                                            <td class="p-4 space-x-2 whitespace-nowrap">

                                                <button type="button" id="updateSpareButton" onclick="llenarFormulario('<?php echo $obj_spare->repuesto_nombre; ?>','<?= $obj_spare->repuesto_descripcion ?>', '<?= $obj_spare->prov_empresa ?>', '<?= $obj_spare->categoria ?>');" data-drawer-target="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-show="drawer-update-<?= $nombre_formulario ?>-default" aria-controls="drawer-update-<?= $nombre_formulario ?>-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 hover:text-white focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <svg>
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </svg>
                                                    Editar <?= $nombre_formulario ?>
                                                </button>

                                                <button type="button" id="deleteSparepartsButton" onclick="handleDeleteButtonClick('<?php echo $obj_spare->repuesto ?>')" data-drawer-target="drawer-delete-spareparts-default" data-drawer-show="drawer-delete-spareparts-default" aria-controls="drawer-delete-spareparts-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
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
            
        </entities-crud>
    </div>

    <!-- Edit Repuesto Drawer -->
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

                <form action="/spareparts/edit/" method="POST">
                    <div class="space-y-4">
                        <div>
                            <label for="repuesto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repuesto</label>
                            <input type="text" name="repuesto" id="editar-repuesto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  value="repuesto_nombre" placeholder="repuesto" required="">
                            
                        </div>
                        <div>
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                            <input type="text" name="descripcion" id="editar-repuesto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="descripcion" placeholder="descripcion" required="">
                        </div>
                        <div>
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                            <input type="text" name="stock" id="editar-repuesto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="stock" placeholder="stock" required="">
                        </div>
                        <div>
                            <label for="costo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Costo</label>
                            <input type="text" name="costo" id="editar-repuesto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="costo" placeholder="costo" required="">
                        </div>
                        <div>
                            <label for="ganancia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ganancia</label>
                            <input type="text" name="ganancia" id="editar-repuesto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="ganancia" placeholder="" required="">
                        </div>

                        <div class="mb-4">
                            <label for="proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un Proveedor</label>
                            <select id="editar-spare" name="proveedor" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($spareparts_controller->ListProveedores() as $obj_spare) : ?>

                                    <option><?= $obj_spare->nombre_prov  ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>


                        <div class="mb-4">
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una categioría</label>
                            <select id="editar-categoria" name="categoria" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <?php foreach ($spareparts_controller->ListCategorias() as $obj_spare) : ?>

                                    <option><?= $obj_spare->nombre_categoria?></option>

                                <?php endforeach; ?>
                            </select>

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
      <!-- Delete  Drawer -->
      <div id="drawer-delete-spareparts-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-x-full" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Eliminar <?= $nombre_formulario ?>
                </h5>
                <button type="button" data-drawer-dismiss="drawer-delete-spareparts-default" aria-controls="drawer-delete-spareparts-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
            <!-- Formulario Eliminar -->
   <script>
        function handleDeleteButtonClick(sparepartsId) {
           
            var deleteButton = document.getElementById("deleteSparepartsButton");
            var deleteLink = document.querySelector("#drawer-delete-spareparts-default a.text-white.bg-red-600");
            deleteLink.href = "/spareparts/delete/?id_repuesto=" + sparepartsId;
            
        } 
    </script>

    <script>
        // Función para llenar los campos del formulario con los datos del formulario
      
	  function llenarFormulario(nombre, descripcion, proveedor,stock,costo,ganancia,categoria,estado) {
            // Obtener referencias a los campos del formulario
            var nombreInput = document.getElementById("editar-nombre");
            var descripcionInput = document.getElementById("editar-descripcion");
            var proveedorInput = document.getElementById("editar-proveedor");
            var stockInput=document.getElementById("edit-stock");
            var gananciaInput=document.getElementById("edit-ganancia");
            var categoriaInput = document.getElementById("editar-categoria");
            var estadoInput=document.getElementById("editar-estado");

            // Llenar los campos con los datos del formulario
            nombreImput.value = nombre;
            descripcionInput.value = descripcion;
            proveedorInput.value=proveedor;
            stockInput.value =stock;
            costoInput.value = costo;
            gananciaInput.value=ganancia;
            categoriaInput.value=categoria;
            estadoInput.value=estado;
        }
    </script>