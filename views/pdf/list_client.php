<?php

use App\Models\ClientModel;

$client_model = new ClientModel;

$all_client = $client_model->ListClient();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul>
    <?php foreach($all_client as $value):?>
        <li><?=$value->cliente_email?></li>
    <?endforeach;?>
</ul>
    
</body>
</html>