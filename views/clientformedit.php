<?php
$form_data = [
    'id' => $_GET['id'] ?? '',
    'nombre' => $_GET['nombre'] ?? '',
    'email' => $_GET['email'] ?? '',
    'telefono' => $_GET['telefono'] ?? '',
    'direccion' => $_GET['direccion'] ?? ''
];

?>
<form action="/client/edit/" method="POST">
    <div class="mb-2">
        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="text" name="nombre" placeholder="nombre" value="<?=$form_data['nombre']?>"/>
    </div>
    <div class="mb-2">
        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="email" name="email" placeholder="email" value="<?=$form_data['email']?>" />
    </div>

    <div class="mb-2">
        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="text" name="telefono" placeholder="telefono" value="<?=$form_data['telefono']?>"/>
    </div>

    <div class="mb-2">
        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="text" name="direccion" placeholder="direccion" value="<?=$form_data['direccion']?>"/>
    </div>

    <input type="hidden" name="id" value="<?=$form_data['id']?>">
    <div>
        <input class="bg-[#4fd1c5] w-full py-2 mt-4 rounded-md text-white font-bold cursor-pointer hover:bg-[#34a49a]" type="submit" value="Editar" name="Editar"/>
    </div>
</form>