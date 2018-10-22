<?php
require_once 'vendor/autoload.php';

session_start();

$app = new \Slim\Slim();

\apache\Service\ConnectionFactory::connectORM();
$loader = new Twig_Loader_Filesystem('src/Twig');
$twig = new Twig_Environment($loader, array(
));

$app->get('/',function () use ($twig, $app){
    /*
    $g = new \apache\Controler\ControlerGeneral();
    $g->showIndex();
    */
    echo $_COOKIE["PHPSESSID"];
    echo $twig->render('index.html', array('join' => $app->urlFor('join')));
})->name('home');

$app->post('/',function () {

    $g = new \apache\Controller\ControllerSalon();
    $g->creerSalon($_POST["name"],$_POST["pass"],$_POST["private"]);
})->name('homeP');


$app->get('/join',function () use ($twig){
    /*
    $g = new \apache\Controler\ControlerGeneral();

    $g->showList();
    */
    $t = \apache\Model\ModelSalon::allSalon();
    //echo $t[0]->id;
    echo $twig->render('list.html', array('t' => $t));
})->name("join");

$app->get('/salon/:id',function ($id) use ($twig){
    /*
    $g = new \apache\Controler\ControlerGeneral();
    $g->showGame();
    */

    echo $twig->render('salon.html');
})->name("salon");

$app->run();