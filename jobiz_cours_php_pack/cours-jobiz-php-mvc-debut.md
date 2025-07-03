# Cours PHP – Débuter avec le MVC

Ce cours est destiné aux débutants en PHP souhaitant comprendre la structure d’une application utilisant le modèle MVC.

## 1. Le Contrôleur : PageController
```php
<?php

namespace App\Controller;

class PageController
{
    public function home(): void
    {
        $greeting = "Hello";
        $name = "Yom";
        $this->render("page/home", [
            'greeting' => $greeting,
            'name' => $name
        ]);
    }

    public function about(): void
    {
        $this->render("page/about");
    }

    protected function render(string $path, array $params = []) : void
    {
        $filePath = APP_ROOT . "/templates/$path.php";
        if (!file_exists($filePath)) {
            echo "Le fichier $filePath n'existe pas.";
        } else {
            extract($params);
            require_once $filePath;
        }
    }
}
```
## 2. Le Fichier d’entrée de l’application
```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';
define('APP_ROOT', dirname(__DIR__));

use App\Controller\PageController;

$pageController = new PageController();
$pageController->home();
```
## 3. Résumé visuel du fonctionnement
- Le fichier d’entrée est exécuté.
- Il prépare l'environnement avec autoload et une constante de chemin.
- Il instancie le contrôleur PageController.
- Il appelle la méthode home().
- home() prépare des variables et appelle render().
- render() affiche un fichier HTML avec les variables transmises.
