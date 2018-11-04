<?php
namespace apache\Controller;
use apache\Views\SalonView;
$app = new \Slim\Slim();

class ControllerSalon{

    private $salon;
    function creerSalon($name,$pass,$private){
        $app = \Slim\Slim::getInstance();
        if($private==null) $private = false;
        else $private = true;
        
     $this->salon=\apache\Model\ModelSalon::CreateRoom($name,$pass,$private);
     $app->redirect($app->urlFor('salon', array('id'=>$this->salon)));

    }

    function rejoindreSalon($id){
        $this->salon=\apache\Model\ModelSalon::JoinSalon($id);
    }

    static function setGame($position,$game){
        
    }

    static function getGame($id) {
        $g = new \apache\Model\ModelGame();
        $g = \apache\Model\ModelGame::where('id', '=', $id)->first();

        $game = [$g->p1, $g->p2];
        $h = \apache\Model\ModelPlayer::where('id', '=', $g->p1)->first();
        $helicoP1 = $h->getHelico();
        if ($g->p2 != null) {
            $helicoP2 = (\apache\Model\ModelPlayer::getPlayer($g->p2))->getHelico();
        }
        $sess=$_COOKIE['PHPSESSID'];
        return array($game, $helicoP1, $helicoP2, $sess);
    }

    
    static function moveHelico(array $move, $stage)
    {
        foreach ($move as $key => $value) {
            $h = \apache\Model\ModelHelicoptere::getHelicoptere($key);
            if ($value != 0) {
                switch ($stage) {
                    case 1:
                        
                        break;
                    case 2:
                        $h->move2($value);
                        break;
                    case 3:
                        $cible = \apache\Model\ModelHelicoptere::getHelicoptere($value);
                        if($h->attack($cible)) {
                            $cible->takeDamage();
                        }
                        break;
                }
            }
            
        }
    }
}