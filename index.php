<?php

use Class\Converter;

require_once 'vendor/autoload.php';

//создаем переменную с json из примера и декодируем ее в массив
$json = require_once 'json.php';
$decoded_array = json_decode($json, true);

//создаем экземпляр класса Converter
$converter = new Converter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>

    <?php
    //точка входа
       echo $converter->convert($decoded_array);
    ?>

</body>
</html>
