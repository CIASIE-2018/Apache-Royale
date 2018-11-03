<?php
namespace apache\Model;

class ModelGame extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Game';
    protected $primaryKey = 'id';
    public $timestamps =false;

    function addPlayer() {
        if($this->p2 != null){
            throw new AlreadyTwoPlayersException();
        } 
        if($this->p1== null){
            $p1= new ModelPlayer();
            $p1->createPlayer(true);
            
            $this->p1 = $p1->id;
        }else{
            $p2=new ModelPlayer();
            $p2->createPlayer(false);
            $this->p2= $p2->id;
        }
        
        $this->save();
    }

    function getP1()
    {
        return $this->p1;
    }

    function getP2()
    {
        return $this->p2;
    }

}