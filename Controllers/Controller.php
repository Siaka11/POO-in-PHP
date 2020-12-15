<?php


namespace App\Controllers;

abstract class Controller
{

    public function render(string $fichier, array $donnees = [], string $template = 'default.php')
    {

        extract($donnees);

        ob_start();

        require_once ROOT . '/Views/' . $fichier;
        $contenu = ob_get_clean();

        require_once ROOT . '/Views/' . $template;
    }
}
