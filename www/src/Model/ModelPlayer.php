<?php
namespace apache\Model;

class ModelPlayer extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Player';
    protected $primaryKey = 'id';
    public $timestamps =false;

    function createPlayer($isPlayer1) {
        if(isset($_COOKIE['PHPSESSID'])){
            $this->id=$_COOKIE['PHPSESSID'];
        }    
        //si joueur 1 helico initialise en bas, sinon en haut du plateau
        if($isPlayer1){
            
            $h1= new ModelHelicoptere;
            $h1->createHelicoptere(2,0,0);
            $h2 = new ModelHelicoptere;
            $h2->createHelicoptere(5,0,0);
            $h3 = new ModelHelicoptere;
            $h3->createHelicoptere(9,0,0);
            $this->H1=$h1->id;
            $this->H2=$h2->id;
            $this->H3=$h3->id;
        }else{
            $h1= new ModelHelicoptere;
            $h1->createHelicoptere(2,11,180);
            $h2 = new ModelHelicoptere;
            $h2->createHelicoptere(5,11,180);
            $h3 = new ModelHelicoptere;
            $h3->createHelicoptere(9,11,180);
            $this->H1=$h1->id;
            $this->H2=$h2->id;
            $this->H3=$h3->id;
         
        }
        $this->save();  
    }
    function changeDirectionHelicopters($angleH1,$angleH2,$angleH3){
        if($angleH1>90 || $angleH2>90 || $angleH3>90 ||$angleH1<-90 || $angleH2<-90 || $angleH3<-90){
            throw new TooLargeAngleException();
        }
        $h1 = ModelHelicoptere::getHelicoptere($this->H1);
        $h2 = ModelHelicoptere::getHelicoptere($this->H2);
        $h3 = ModelHelicoptere::getHelicoptere($this->H3);

        $h1->changeDirection($angleH1);
        $h2->changeDirection($angleH2);
        $h3->changeDirection($angleH3);

    }

    function moveHelicopters($distanceH1,$distanceH2,$distanceH3){
        if($distanceH1>3 || $distanceH2>3 || $distanceH3>3 ||$distanceH1<0 || $distanceH2<0 || $distanceH3<0){
            throw new InvalidDistanceException();
        }

        $h1 = ModelHelicoptere::getHelicoptere($this->H1);
        $h2 = ModelHelicoptere::getHelicoptere($this->H2);
        $h3 = ModelHelicoptere::getHelicoptere($this->H3);

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
        return ModelPlayer::where('id', '=', $id)->first();
    }

    function getHelico()
    {
        $helico1 = ModelHelicoptere::where('id', '=', $this->H1)->first();
        $helico2 = ModelHelicoptere::where('id', '=', $this->H2)->first();
        $helico3 = ModelHelicoptere::where('id', '=', $this->H3)->first();
        return array($helico1, $helico2, $helico3);
    }
}