<?php

session_start();
require_once "vendor/autoload.php";

$router = new App\Controllers\Routeur();
$router->url();

 
