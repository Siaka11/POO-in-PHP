<?php


namespace App\Controllers;

use App\Core\Form;
use App\Models\AnnoncesModel;
use App\Controllers\Controller;

class AnnoncesController extends Controller
{
    public function index()
    {
        $annonces = new AnnoncesModel;

        $annonces = $annonces->findAll();
        //var_dump($annonces);
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

    public function ajouter()
    {
        // on vérifie si l'utilisateur est connecté 
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {

            if (Form::validate($_POST, ['titre', 'description'])) {

                $titre = strip_tags($_POST['titre']);
                $description = strip_tags($_POST['description']);

                $annonceModel = new AnnoncesModel;
                var_dump($_SESSION['user']['id']);
                $annonceModel->setTitre($titre)
                    ->setDescription($description)
                    ->setUser_id($_SESSION['user']['id']);


                $annonceModel->createOne();
                $_SESSION['message'] = "Votre annonce a été enregistré avec succès";
            } else {
                $_SESSION['erreur'] = "Veuillez remplir les champs svp.";
            }
            $form = new Form;

            $form->debutForm()
                ->ajoutLabelFor('titre', 'Titre de l\'annonce :')
                ->ajoutInput('text', 'titre', ['class' => 'form-control', 'id' => 'titre'])
                ->ajoutLabelFor('description', 'Description de l\'annonce :')
                ->ajoutTextarea('description', '', ['id' => 'description', 'class' => 'form-control'])
                ->ajoutBouton('Ajouter', ['class' => 'btn btn-info'])
                ->finForm();

            $formAjouter = $form->create();
            $this->render('annonces/ajouter.php', compact('formAjouter'));
        } else {
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /users/login');
        }
    }

    public function modifier($id)
    {
        $id = intval(end($id));

        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {

            $annonceModel = new AnnoncesModel;
            $annonce = $annonceModel->find($id);

            // si l'annonce n'existe pas on retourne à la liste des annonces
            if (!$annonce) {
                $_SESSION['erreur'] = 'L\'annonce recherchée n\'existe pas .';
                header('Location: /annonces');
                exit;
            }
            //On vérfie si l'utilisateur est propriétaire de l'annonce
            if ($annonce->user_id != $_SESSION['user']['id']) {
                $_SESSION['erreur'] = "Vous n'avez pas accès à cette page pour éditer l'annonce";
                header('Location: /annonces');
                exit;
            }
        } else {
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page. ";
            header('Location: /users/login');
            exit;
        }
    }
}
