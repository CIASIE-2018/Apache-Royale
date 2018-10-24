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
            
            $this->h1 = new ModelHelicoptere(5,0,0);
            $this->h2 = new ModelHelicoptere(10,0,0);
            $this->h3 = new ModelHelicoptere(15,0,0);
        }else{
            $this->h1 = new ModelHelicoptere(5,12,180);
            $this->h2 = new ModelHelicoptere(10,12,180);
            $this->h3 = new ModelHelicoptere(15,12,180);
        }
        $this->save();
    }
    function changeDirectionHelicopters($angleH1,$angleH2,$angleH3){
        if($angleH1>90 || $angleH2>90 || $angleH3>90 ||$angleH1<-90 || $angleH2<-90 || $angleH3<-90){
            throw new TooLargeAngleException();
        }
        $h1 = ModelHelicoptere::getHelicoptere($this->h1);
        $h2 = ModelHelicoptere::getHelicoptere($this->h2);
        $h3 = ModelHelicoptere::getHelicoptere($this->h3);

        $h1->changeDirection($angleH1);
        $h2->changeDirection($angleH2);
        $h3->changeDirection($angleH3);

    }

    function moveHelicopters($distanceH1,$distanceH2,$distanceH3){
        if($distanceH1>3 || $distanceH2>3 || $distanceH3>3 ||$distanceH1<0 || $distanceH2<0 || $distanceH3<0){
            throw new InvalidDistanceException();
        }

        $h1 = ModelHelicoptere::getHelicoptere($this->h1);
        $h2 = ModelHelicoptere::getHelicoptere($this->h2);
        $h3 = ModelHelicoptere::getHelicoptere($this->h3);

        $h1->move($distanceH1);
        $h2->move($distanceH2);
        $h3->move($distanceH3);
       
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