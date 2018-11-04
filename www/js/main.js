
let helicos = document.getElementsByClassName("playable");
let helicoactif;
for (let index = 0; index < helicos.length; index++) {
    helicos.item(index).onclick = function () {
        helicoactif = this.id;
        this.style.backgroundColor= ("green");
        console.log(this.id);
    };
}


switch (document.getElementById("stage").value){
    case "1" :
        let cases = document.getElementsByClassName("case");
        for (let i = 0; i <cases.length; i++) {
            cases.item(i).onclick = function () {
                document.getElementById("v"+helicoactif).value=this.id;
            };
        }
    break;

    case "2" :
    let ennemies = document.getElementsByClassName("ennemie");
    let enne;
    for (let i = 0; i <ennemies.length; i++) {
        ennemies.item(i).onclick = function () {
            enne = this.id;
        this.style.backgroundColor= ("red");
            document.getElementById("v"+helicoactif).value=this.id;
        };
    }

    break;
}