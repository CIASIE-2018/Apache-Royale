<?php

namespace apache\Controler;

class ControlerGeneral
{
    public function showIndex()
    {
        $i = new \apache\Views\GlobalView();
        echo $i->render(0);
    }

    public function showList()
    {
        $i = new \apache\Views\GlobalView();
        echo $i->render(1);
    }

    public function showGame()
    {
        $i = new \apache\Views\GlobalView();
        echo $i->render(2);
    }
}
