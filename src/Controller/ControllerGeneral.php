<?php

namespace apache\Controller;

class ControllerGeneral
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
}
