<?php

namespace apache\Views;

class GameView
{
    public function render()
    {
        $r = "";
        for ($i=0; $i < 11; $i++) { 
            for ($j=0; $j < 11; $j++) { 
                $r += '<div class="w3-col">case</div>';
            }
        }
        return <<<E
        <div class="bgimg w3-animate-opacity w3-text-white w3-myfont" style="display: flex;">
            <div class="w3-row" style="width: 50%">
                $r
            </div>
            <div class="nav" style="flex-direction: columns; vertical-align: middle">
            <button class="prev">&uarr;</button>
            <br>
            <span class="nb">
            3
            </span>
            <br>
            <button class="next">&darr;</button>
        </div>
E;
    }
}
