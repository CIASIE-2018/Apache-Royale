<?php
require_once 'vendor/autoload.php';

session_start();
$app = new \Slim\Slim();

$app->get('/',function () use ($app){
    $g = new \apache\Controler\ControlerGeneral();
    $g->showIndex();
})->name('home');

$app->get('/join',function () use ($app){
    $g = new \apache\Controler\ControlerGeneral();
    $g->showList();
})->name("join");

$app->run();