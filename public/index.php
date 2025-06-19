<?php

require_once __DIR__ . '/../vendor/autoload.php';

// on définit une constante pour le chemin de base qui correspond à la racine de l'application
define('APP_ROOT', dirname(__DIR__));

use App\Routing\Router;

$router = new Router();
$router->handlerRequest($_SERVER["REQUEST_URI"]);


// use App\Controller\PageController;
// $pageController = new PageController();
// $pageController->home();
