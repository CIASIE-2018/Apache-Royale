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
        $game = new ModelGame();
        $game->addPlayer();
        $room->game= $game->id;
        $room->player1 = $_COOKIE["PHPSESSID"];
        $room->save();
        if($name == null){
            $room->name = "Room-".$room->id;
        }
        $room->save();  
       return $room->id;
    }
    
    static function getSalon($id){
        return ModelSalon::where('id', '=', $id)->first();
    }

    static function JoinSalon($id){
        $room = ModelSalon::getSalon($id);
        if ($_COOKIE["PHPSESSID"]!=$room->player1 && $room->player2 == null){
            $room->player2=$_COOKIE["PHPSESSID"];
            $game=ModelGame::where('id', '=', $room->game)->first();
            $game->addPlayer();
        }
        $room->save();
    }

    static function allSalon()
    {
        $salons=ModelSalon::all();
        return $salons;
    }
}