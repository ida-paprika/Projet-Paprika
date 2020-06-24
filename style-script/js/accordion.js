"use strict";

let acc = document.getElementsByClassName("accordion");
let i;



for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.style.border = "2px dashed #ABA590";
        this.style.borderBottom = "2px solid transparent";
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
            this.style.border = "2px solid transparent";
        } else {
            panel.style.display = "block";
            panel.style.border = "2px dashed #ABA590";
        }
    });
    let panel = acc[i].nextElementSibling;
    console.log(panel);
    if(panel.style.display === "block"){
        console.log("bla");
        window.onclick = function(event) {
            if(event.target !== panel){
                console.log("blabla");
                panel.style.display = "none";
            }
        };
    }
    
 /*   if(panel.style.display === "block"){
        window.onclick = function(event) {
            if(event.target !== acc){
                console.log("blabla");
                panel.style.display = "none";
            }
        };
    }*/
    
}
/*

console.log(panel[0].style);
panel[0].style.display = "block";
    if(panel.style.display === "none"){
        console.log("blabla");
        window.onclick = function() {
            panel.style.display = "none";
        };
    }

let panel = document.getElementsByClassName("panel");

        for(i = 0; i < panel.length; i++ ){
            if(panel[i].style.display === "block"){
                window.onclick = function(event) {
    if(event.target !== acc){
                console.log("blabla");
                panel[i].style.display = "none";
            }
        };
    }
}
 */