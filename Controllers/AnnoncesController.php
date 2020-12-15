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

    public function lire($id)
    {
        $id = intval(end($id));
        var_dump($id);

        $annonces = new AnnoncesModel;
        $annonces = $annonces->find($id);
        $this->render('annonces/lire.php', compact('annonces'));
    }
}
