"use strict";


function message(){
    let msg = document.getElementById("message");
    if( msg != null){
        msg.classList.toggle('hide');
    }
}

function chrono(){
    setTimeout(message, 5000);
}

document.addEventListener("DOMContentLoaded", chrono);