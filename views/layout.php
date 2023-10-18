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
    <title>TecnoGestión</title>
    <link rel="icon" type="image/x-icon" href="../public/src/img/favicon.ico">
    <script src="../public/src/scripts/flowbite.min.js"></script>
    <script src="../public/src/scripts/apexcharts.js"></script>
    <link rel="stylesheet" href="../public/src/styles/flowbite.min.css" />
    <link rel="stylesheet" href="../public/src/styles/main.css" />
    <style>
        *:target {
            outline: 1px solid red;
            background: #f330003b;
        }
    </style>
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