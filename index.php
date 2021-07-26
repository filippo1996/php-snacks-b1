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

//Instance class Authenticatable (snacks 2)
$auth = new Controllers\Authenticatable();

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
    <h1>Calendario Partita di Basket (snacks 1)</h1>
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
    <section>
        <h2>Accedi al tuo conto gioco (snacks 2)</h2>
        <p>Assicurati di inserire un nome più lungo di 3 caratteri, nella email deve essere presente la @ e il punto dopo la @, l'eta deve essere un numero maggiore di 0</p>
        <form>
            <input id="name" type="text" name="name" placeholder="Inserisci il tuo nome">
            <input id="email" type="text" name="email" placeholder="Inserisci la tua email">
            <input id="age" type="number" name="age" placeholder="Inserisci i tuoi anni">
            <input id="submit" type="submit" value="Accedi">
        </form>
        <h2 id="message"></h2>
    </section>
    <!-- App js -->
    <script src="js/app.js"></script>
</body>
</html>