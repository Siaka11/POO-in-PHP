<?php
//C:\wamp\www\BASE definit la racine du dossier 

use App\Autoloader;
use App\Core\Main;
use App\Core\Router;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/Autoloader.php';
Autoloader::register();
require_once ROOT . '/vendor/autoload.php';

//Main est notre routeur
$app = new Main();
$app->start();

// $router = new Router($_GET['p']);

// $router->get('/', 'App\Controllers\AnnoncesController@index');
// $router->get('/posts/:id', 'App\Controllers\AnnoncesController@show');

// var_dump($router);
// $router->run();



 



































//use App\Autoloader;

//use App\Db\Db;
//use App\Models\AnnoncesModel;
//use App\Models\Model;
//use App\Models\UsersModel;

//require_once 'Autoloader.php';
//Autoloader::register();


//$model = new AnnoncesModel;

//var_dump($model->find(2));

//$donnees = [
//  'titre' => 'titre modifiée',
//'description' => 'description modifiée',
// 'actif' => 0
//];
//$annonce = $model->hydrate($donnees);


//$modelUsers = new UsersModel();
//$annonce = $modelUsers
 //   ->setEmail('youkarlo123@gmail.com')
   // ->setPassword(password_hash('AZERTY', PASSWORD_ARGON2I));
//$modelUsers->create($annonce);






//var_dump($model->findAll());
