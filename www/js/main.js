
let helicos = document.getElementsByClassName("playable");
let helicoactif;
for (let index = 0; index < 3; index++) {
    helicos.item(index).onclick = function () {
        helicoactif = this.id;
        this.style.backgroundColor= ("green");
        console.log(this.id);
    };
}

let cases = document.getElementsByClassName("case");
for (let i = 0; i <cases.length; i++) {
    cases.item(i).onclick = function () {
        document.getElementById("v"+helicoactif).value=this.id;
    };
}

