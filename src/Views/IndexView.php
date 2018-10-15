<?php

namespace apache\Views;

$app=new \Slim\Slim;
$join = $app->urlFor('join');

class IndexView {
    public function render() {
        $return = <<<END
     <div class="bgimg w3-display-container w3-animate-opacity w3-text-white w3-myfont">
        <div class="w3-display-middle w3-center">
          <img src="http://www.gif.ovh/french-gif/H%C3%A9licopt%C3%A8re%20Gif/H%C3%A9licopt%C3%A8re%20Gif%20(5).gif"></img>
          <h1 class="w3-jumbo w3-animate-top w3-text-black w3-myfont">Apache Royale</h1>
          <hr class="w3-border-grey" style="margin:auto;width:55%">
          <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-round-xxlarge w3-padding-large w3-margin-top w3-wide w3-xlarge"
            style="width : 40%;" id="btnp">Créer</button>
          <a class="w3-btn w3-round-xxlarge w3-padding-large w3-margin-top w3-wide w3-xlarge" style="width : 40%;" id="btnp" href="$join">Rejoindre</a>
        </div>
      </div>
    
      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card w3-animate-bottom w3-round-large" style="max-width:400px">
          <header class="w3-container w3-teal round-top">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-red w3-display-topright" style="border-radius: 0 8px 0 8px">&times;</span>
            <h2>Créer votre salon</h2>
          </header>
          <div class="w3-container">
            <form style="font-size:1.5em">
              <label style="">Name</label>
              <input class="w3-input w3-border w3-round-xxlarge" style="outline: 0;" type="text">
              <label style="">Password </label><input class="w3-check" type="checkbox"><input class="w3-input w3-border w3-round-xxlarge"
                type="password" type="text" style="outline: 0; border-color: blue">
              <label style="">Salon privé ? </label><input class="w3-check" type="checkbox">
              <input type="submit" class="w3-btn" style="width:100%; font-size: 1.5em; margin: 10px 0">
            </form>
          </div>
        </div>
      </div>
END;
    return $return;
    }
}