<?php

class ControlerGeneral
{
    public function showIndex()
    {
        $i = new GlobalView();
        echo $i->render(0);
    }
}
