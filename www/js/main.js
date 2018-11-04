
let helicos = document.getElementsByClassName("playable");
let helicoactif;
for (let index = 0; index < 3; index++) {
    helicos.item(index).onclick = function () {
        helicoactif = document.getElementById(this.id);
        helicoactif.style.backgroundColor= ("green");
        console.log(this.id);
    };
}

let cases = document.getElementsByClassName("case");
for (let i = 0; i <cases.length; i++) {
    cases.item(i).onclick = function () {
        
    };
}

