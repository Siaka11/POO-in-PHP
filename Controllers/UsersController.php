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
        if (Form::validate($_POST, ['email', 'password'])) {

            $email = strip_tags($_POST['email']);

            $userModel = new UsersModel;
            var_dump($userModel);
            $emailExist = $userModel->findOneByEmail($email);
            //var_dump($emailExist);


            if (!$emailExist) {
                $_SESSION['erreur'] = 'L\'adresse mail ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }

            $user = $userModel->hydrate($emailExist);
            //var_dump($user);


            if (password_verify($_POST['password'], $user->getPassword())) {
                $user->setSession();
                $_SESSION['bienvenu'] = 'Bonjour ' . $_SESSION['user']['email'] . ' Vous nous avez manquer';
                header('Location: /annonces ');
                exit;
            } else {
                $_SESSION['erreur'] = 'L\'adresse mail ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }
        }



        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'form-control'])
            ->ajoutLabelFor('pass', 'Password :')
            ->ajoutInput('password', 'password', ['class' => 'form-control'])
            ->ajoutBouton('Se connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        $formLogin = $form->create();

        $this->render('users/login.php', compact('formLogin'));
    }
    /**
     * Inscription des utlisateurs
     *
     * @return void
     */
    public function register()
    {

        if (Form::validate($_POST, ['email', 'password'])) {

            if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                $email = strip_tags($_POST['email']);
                $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);


                $createUser = new UsersModel;



                $emailExist = $createUser->findOneByEmail($email);
                var_dump($emailExist);

                if (!$emailExist) {
                } else {
                    $_SESSION['erreurConnexion'] = 'L\'adresse mail a déjà été utilisée.';

                    header('Location: /users/register');
                    exit;
                }

                $createUser->setEmail($email)
                    ->setPassword($pass);
                $createUser->createOne();
                $_SESSION['message'] = "Votre compte sera crée , merci de le confirmer svp";
            }
        } else {
            $_SESSION['erreur'] = !empty($_POST) ? "Votre formulaire est incomplet" : "";
        }

        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'form-control'])
            ->ajoutLabelFor('pass', 'Password :')
            ->ajoutInput('password', 'password', ['class' => 'form-control'])
            ->ajoutBouton('S\'inscrire', ['class' => 'btn btn-primary'])
            ->finForm();
        $formRegister = $form->create();
        $this->render('users/register.php', compact('formRegister'));
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
