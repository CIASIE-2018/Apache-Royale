<?php
require_once 'vendor/autoload.php';

session_start();
$app = new \Slim\Slim();

$app->get('/',function () {
    $g = new \apache\Controller\ControllerGeneral();
    $g->showIndex();
})->name('home');

$app->post('/',function () {
    
})->name('homeP');

$app->get('/join',function () {
    $g = new \apache\Controller\ControllerGeneral();
    $g->showList();
})->name("join");

$app->get('/salon',function(){
    $g = new \apache\Controller\ControllerSalon();
    $g->creerSalon($_POST["name"],$_POST["pass"],false);
})->name("salon");

$app->run();