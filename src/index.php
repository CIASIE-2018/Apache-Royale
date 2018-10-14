<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();
$app = new Slim/Slim();

$app->get('/',function () {
    $g = new ControlerGeneral();
    $g->showIndex();
})->name('home');