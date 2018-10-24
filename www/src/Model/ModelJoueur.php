<?php
namespace apache\Model;

class ModelJoueur extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Joueur';
    protected $primaryKey = 'id';
    public $timestamps =false;

    function __construct($game,$id) {
        $this->game=$game;
        $this->id=$id;
        $this->game->addPlayer($this);
        //si joueur 1 helico initialise en bas, sinon en haut du plateau
        if($this->game->isPlayer1($this)){
            $this->helicopteres=[new Helicoptere(5,0,0),new Helicoptere(10,0,0),new Helicoptere(15,0,0)];
        }else{
            $this->helicopteres=[new Helicoptere(5,12,180),new Helicoptere(10,12,180),new Helicoptere(15,12,180)];
        }
        $this->save();
    }
    function changeDirectionHelicopters($id,$angleH1,$angleH2,$angleH3){
        $player = ModelJoueur::getPlayer($id);
        if($angleH1>90 || $angleH2>90 || $angleH3>90 ||$angleH1<-90 || $angleH2<-90 || $angleH3<-90){
            throw new TooLargeAngleException();
        }
        $player->helicopteres[0]->changeDirection($angleH1);
        $player->helicopteres[1]->changeDirection($angleH2);
        $player->helicopteres[2]->changeDirection($angleH3);
    }

    function moveHelicopters($distanceH1,$distanceH2,$distanceH3){
        if($distanceH1>3 || $distanceH2>3 || $distanceH3>3 ||$distanceH1<0 || $distanceH2<0 || $distanceH3<0){
            throw new InvalidDistanceException();
        }
        $this->helicopteres[0]->move($distanceH1);
        $this->helicopteres[1]->move($distanceH2);
        $this->helicopteres[2]->move($distanceH3);
    }

    function chooseTargets($targetH1,$targetH2,$targetH3){
        if(false){
            throw new TargetNotInRangeException();
        }
    }

    static function getPlayer($id){
        $player=ModelJoueur::get();
        foreach($play as $player){
            if($player->id == $id)
                $arr = $player;
        }
        return $arr;
    }
}