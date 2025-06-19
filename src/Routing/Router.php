<?php

namespace App\Routing;

use App\Controller\ErrorController;

class Router
{
    private $routes;
    public function __construct()
    {
        $this->routes = require_once APP_ROOT . "/config/routes.php";  // On charge les routes depuis le fichier de configuration 
    }

    public function handlerRequest(string $uri) // On récupère les paramètres d'URL
    {
        try {
            $path = $this->normalizePath($uri); // On clean le chemin de l'URI
            if (!isset($this->routes[$path])) {
                throw new \Exception("La route n'existe pas !");
            }
            $route = $this->routes[$path]; // On cherche la route correspondante dans le tableau des routes


            $controllerPath = $route["controller"]; // On récupère le contrôleur associé à la route
            $action = $route["action"]; // On récupère l'action associée à la route

            if (!class_exists($controllerPath)) {
                throw new \Exception("La classe n'existe pas !");
            }
            $controller = new $controllerPath(); // On instancie le contrôleur

            if (!method_exists($controller, $action)) {
                throw new \Exception("L'action n'existe pas !");
            }
            $controller->$action(); // On appelle l'action du contrôleur
        } catch (\Exception $e) {
            $errorController = new ErrorController();
            $errorController->show($e->getMessage());
        }
    }


    public static function normalizePath(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH); // On extrait le chemin de l'URI 
        $path = rtrim($path, '/') . "/"; // On s'assure que le chemin se termine par un slash 
        return $path;
    }
}
