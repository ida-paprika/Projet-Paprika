"use strict";

let modal;
let btn;
let span;

let btnModal = document.getElementsByClassName("btnModal");
let spanClose = document.getElementsByClassName("close");

for(let i = 0; i < btnModal.length; i++){
    btnModal[i].addEventListener('click', () => {
        document.getElementById("modal-display"+(i+1)).style.display = 'block';
    });
    spanClose[i].addEventListener('click', () => {
        document.getElementById("modal-display"+(i+1)).style.display = 'none';
    });
    window.addEventListener('click', () => {
        if (event.target === document.getElementById("modal-display"+(i+1))) {
            document.getElementById("modal-display"+(i+1)).style.display = 'none';
        }
    });
};

