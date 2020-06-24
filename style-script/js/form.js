"use strict";


//Créer un évènement "addEventListener onclick" plutôt que d'appeler la fonction dans HTML.
function hideAndShow(id, display) {
  let elem = document.getElementById(id);
  
  if (elem.style.display === "none") {
    elem.style.display = display;
  } else {
    elem.style.display = "none";
  }
} 

/*
function hideAndShow() {
  var elem = document.getElementById("formModif_hide_show");
  
  if (elem.style.display === "none") {
    elem.style.display = "block";
  } else {
    elem.style.display = "none";
  }
} 
*/

