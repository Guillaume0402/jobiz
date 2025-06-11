<?php

require_once __DIR__ . '/../vendor/autoload.php';

// on définit une constante pour le chemin de base qui correspond à la racine de l'application
define('APP_ROOT', dirname(__DIR__));


use App\Controller\PageController;

$pageController = new PageController();
$pageController->home();
