<?php


namespace App\Controllers;

abstract class Controller
{

    public function render(string $fichier, array $donnees = [])
    {

        extract($donnees);

        require_once ROOT . '/Views/' . $fichier;
    }
}
