<?php


namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AnnoncesModel;

class AnnoncesController extends Controller
{
    public function index()
    {
        $annonces = new AnnoncesModel;

        $annonces = $annonces->findAll();
        $this->render('annonces/index.php', compact('annonces'));
    }

    public function show()
    {
        echo 'Bonjour bro';
    }
}
