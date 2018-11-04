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
    $t->rejoindreSalon($id);
    if ((\apache\Model\ModelSalon::getSalon($id))->player2 == null) {
        header("Refresh:5");
    }
    $p1 = \apache\Model\ModelPlayer::getPlayer(\apache\Model\ModelSalon::getSalon($id)->player1);
    $p2 = \apache\Model\ModelPlayer::getPlayer(\apache\Model\ModelSalon::getSalon($id)->player2);
    if ($p1->stage != $p2->stage) {
        header("Refresh:5");
    }
    echo $twig->render('salon.html', array('games' => CtrlSalon::getGame($id)));
})->name("salon");

$app->post('/salon/:id', function($id) use ($twig) {
    $arr = array($_POST['h1']=>$_POST['valeur1'], $_POST['h2']=>$_POST['valeur2'], $_POST['h3']=>$_POST['valeur3']);
    CtrlSalon::moveHelico($arr, $_POST['stage']);
    $p1 = \apache\Model\ModelPlayer::getPlayer(\apache\Model\ModelSalon::getSalon($id)->player1);
    $p2 = \apache\Model\ModelPlayer::getPlayer(\apache\Model\ModelSalon::getSalon($id)->player2);
    if ($p1->stage != $p2->stage) {
        header("Refresh:5");
    }
    echo $twig->render('salon.html', array('games' => CtrlSalon::getGame($id)));
});

$app->run();