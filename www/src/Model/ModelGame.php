<?php
namespace apache\Model;

class ModelGame extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Game';
    protected $primaryKey = 'id';
    public $timestamps =false;

    function addPlayer() {
        if($this->p1!= null){
            if($this->p2 != null){
                throw new AlreadyTwoPlayersException();
            } 
            $this->p1 = new ModelPlayer(true);
        }
        $this->p2=new ModelPlayer(false);
    }


}