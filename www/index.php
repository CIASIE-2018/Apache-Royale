<?php
require_once 'vendor/autoload.php';

use apache\Controller\ControllerSalon as CtrlSalon;
use apache\Classes\Player as Player;
session_start();

$app = new \Slim\Slim();

\apache\Service\ConnectionFactory::connectORM();
$loader = new Twig_Loader_Filesystem('src/Twig');
$twig = new Twig_Environment($loader, array(
));

$app->get('/',function () use ($twig, $app){
    if (!isset($_COOKIE['PHPSESSID'])) {
        $app->redirect($app->urlFor('home'));
    }
    /*
    $g = new \apache\Controler\ControlerGeneral();
    $g->showIndex();
    */
    echo $_COOKIE["PHPSESSID"];
    echo $twig->render('index.html', array('join' => $app->urlFor('join')));
})->name('home');

$app->post('/',function () use ($app){
    if (!isset($_COOKIE['PHPSESSID'])) {
        $app->redirect($app->urlFor('home'));
    }
    $g = new \apache\Controller\ControllerSalon();
    $g->creerSalon($_POST["name"],$_POST["pass"],$_POST["private"]);
    var_dump($g);
})->name('homeP');


$app->get('/join',function () use ($twig){
    if (!isset($_COOKIE['PHPSESSID'])) {
        $app->redirect($app->urlFor('home'));
    }
    /*
    $g = new \apache\Controler\ControlerGeneral();

    $g->showList();
    */
    $t = \apache\Model\ModelSalon::allSalon();
    //echo $t[0]->id;
    echo $twig->render('list.html', array('t' => $t));
})->name("join");

$app->get('/salon/:id',function ($id) use ($twig){
    if (!isset($_COOKIE['PHPSESSID'])) {
        $app->redirect($app->urlFor('home'));
    }
    $t = new \apache\Controller\ControllerSalon();
    new \apache\Model\ModelGame();
    $t->rejoindreSalon($id);
    echo $twig->render('salon.html', array('games' => CtrlSalon::getGame($id)));
})->name("salon");

$app->run();