<?php

namespace apache\Views;

$app=new \Slim\Slim;

class ListView {
    public function render() {
        $return = <<<END
        <div class="bgimg w3-animate-opacity w3-text-white w3-myfont">
        <div class="w3-display-middle" style="display: inline-block">
            <div class="salon-container">
                    <button class="elem w3-btn btlist w3-round-large">Jill<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Eve<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                    <button class="elem w3-btn btlist w3-round-large">Adam<span class="w3-badge w3-round-xxlarge w3-right w3-margin-right">1/2</span></button>
                </div>
                <div class="w3-card select w3-round-large w3-hover-shadow">
                    <p>w3-card</p>
                </div>
        </div>
        
      </div>
END;
    return $return;
    }
}