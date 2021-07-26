<?php

require_once '../Controllers/Authenticatable.php';

$auth = new Controllers\Authenticatable();

$auth->access([
    'name' => $_REQUEST['name'],
    'email' => $_REQUEST['email'],
    'age' => $_REQUEST['age']
]);