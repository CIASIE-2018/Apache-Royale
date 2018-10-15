<?php
require_once 'vendor/autoload.php';

session_start();
$app = new \Slim\Slim();

$app->get('/',function () {
    $g = new \apache\Controler\ControlerGeneral();
    $g->showIndex();
})->name('home');

$app->post('/',function () {
    
})->name('homeP');

$app->get('/join',function () {
    $g = new \apache\Controler\ControlerGeneral();
    $g->showList();
})->name("join");

$app->run();