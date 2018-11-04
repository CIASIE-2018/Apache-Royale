let helico={};

helico.modules = {};

let helicos = document.getElementsByClassName("playable");

for (let index = 0; index < 3; index++) {
    helicos.item(index).onclick = function () {
        console.log(this.id);
    };
}
console.log(helicos);