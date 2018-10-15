<?php 
namespace apache\Views;
use apache\Model\ModelSalon;

class SalonView{
    private $salon;

    public function __construct($i,$nom,$mdp,$private){
        if ($i === 0){
            $this->salon=ModelSalon::CreateRoom($nom,$mdp,$private);
        }else{
            $this->salon=ModelSalon::getSalon($i);
        }
    }

    public function render(){
        
    }
}
