<?php

namespace apache\Model;

class ModelSalon extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Salon';
    protected $primaryKey = 'id';
    public $timestamps =false;

    static function createRoom($name,$pass,$private){
        $room = new ModelSalon;
        $room->name = $name;   
        $room->pass = $pass;
        $room->private = $private;
        $room->player1 = $_COOKIE["PHPSESSID"];
        $room->save();
        if($name == null){
            $room->name = "Room-".$room->id;
        }
        $room->save();  
       return $room->id;
    }
    
    static function getSalon($id){
        $salons=ModelSalon::get();
        foreach($salons as $salon){
            if($salon->id == $id)
                $arr = $salon;
        }
        return $arr;
    }

    static function allSalon()
    {
        $salons=ModelSalon::all();
        return $salons;
    }
}