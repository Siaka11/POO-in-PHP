<?php


namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{


    public function index()
    {
        echo 'hello' . __NAMESPACE__;
    }

    public function login()
    {
        unset($_SESSION['message']);
        var_dump($_SESSION);
        $_SESSION['user'] = ['id' => 1, 'email' => 'ouattarsiaka11@gmail.com'];

        $form = new Form();

        $form->debutForm()
            ->ajoutLabelFor('email', ' E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email', 'required', 'autofocus', 'novalidate'])
            ->ajoutLabelFor('pass', 'Mot de passe :')
            ->ajoutInput('password', 'password', ['class' => 'form-control', 'id' => 'pass'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('users/login.php', ['loginForm' => $form->create()]);
    }
    /**
     * Inscription des utlisateurs
     *
     * @return void
     */
    public function register()
    {
        if (Form::validate($_POST, ['email', 'password'])) {
            // On nettoie l'adresse mail
            $email = strip_tags($_POST['email']);

            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
            //on stocke l'utilisateur de la base


            $user = new UsersModel();

            $user->setEmail($email)
                ->setPassword($password);
            $user->create();
        }




        $form = new Form();

        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Password :')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])

            ->ajoutBouton('S\'inscrire ', ['class' => 'btn btn-success'])
            ->finForm();

        $this->render('users/register.php', ['registerForm' => $form->create()]);
    }
}
