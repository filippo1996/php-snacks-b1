<?php

function autoloadClass($className){
    $file = str_replace('\\', '/', $className).'.php';
    if(file_exists($file)){
        require_once $file;
    }
}

spl_autoload_register('autoloadClass');

$calendar = new Models\BasketballGames();
$basketball = new Controllers\BasketballGamesController($calendar->basketBall());
$basket = $basketball->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snacks - b1</title>
</head>
<body>
    <h1>Calendario Partita di Basket</h1>
    <div>
        <ul>
            <?php for($i = 0, $length = count($basket); $i < $length; $i++): ?>

                <li>
                    Girone <?= $i + 1 ?>
                    <p><?= $basket[$i]['home']['name']. ' - ' .$basket[$i]['guest']['name']. ' | ' .$basket[$i]['home']['points']. '-' .$basket[$i]['guest']['points'] ?></p>
                </li>

            <?php endfor; ?>
        </ul>
    </div>
</body>
</html>