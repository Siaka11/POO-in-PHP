<?php


namespace App\Controllers;

use App\Controllers\Controller;


class MainController extends Controller
{

    public function index()
    {
        echo 'Ceci est la page d\'accueil';
    }

    public function merci($params)
    {
        var_dump($params);
        echo 'ceci est la foonction merci';
    }
}
