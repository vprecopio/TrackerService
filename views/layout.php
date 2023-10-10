<?php

use App\Models\UserModel;

$usuario_controller = new UserModel;

$roles = $usuario_controller->ObtenerNuevosRoles();

$tu_array = [];

foreach ($roles as $obj) {
    $tu_array[] = $obj->rol_nombre;
}

if (isset($_SESSION["TODO"])) {
    $rol_a_buscar = $_SESSION["TODO"][0]->rol_nombre;
} else {
    $rol_a_buscar = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio web</title>
    <link rel="stylesheet" href="/public/src/main.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;600&display=swap" rel="stylesheet">
</head>

<body>

    <?php if (in_array($rol_a_buscar, $tu_array)) : ?>

        <?php require __DIR__ . '/components/template/navbar.php'; ?>

        <?php require __DIR__ . '/components/template/aside.php'; ?>

        <?php require $content; ?>

    <?php else : ?>
        <?php require __DIR__ . '/authlogin.php'; ?>
    <?php endif; ?>

    <script src="../public/src/scripts/dark-mode.js"></script>
</body>

</html>