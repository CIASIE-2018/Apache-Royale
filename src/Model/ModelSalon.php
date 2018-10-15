<?php

namespace apache\Model;

class ModelSalon extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Salon';
    protected $primaryKey = 'id';
    public $timestamps =false;

    static function createRoom($name,$mdp,$private){
        $room = new ModelSalon();
        $room->name = $name;
        $room->pass = $mdp;
        $room->private = $private;

        $room->save();
    }
}