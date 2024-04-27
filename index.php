<?php

require_once __DIR__ . '/vendor/autoload.php';
use Jesse\Ingengno\Controllers\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$router = new Router();
$router->handleRequest();
