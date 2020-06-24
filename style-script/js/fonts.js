"use strict";

let page = document.getElementById("pageArticle_livre");
let font = document.getElementById("font-titre").innerHTML;
let titre = document.getElementsByClassName("titre-art");

console.log(titre);

titre.style.fontFamily = font;