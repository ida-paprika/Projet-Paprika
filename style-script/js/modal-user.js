"use strict";

let modalUser = document.getElementById("modal-displayUser");
let btnUser = document.getElementById("btn-modalUser");
let spanUser = document.getElementsByClassName("closeUser")[0];

btnUser.onclick = function() {
  modalUser.style.display = "block";
};

spanUser.onclick = function() {
  modalUser.style.display = "none";
};

window.onclick = function(event) {
  if (event.target === modalUser) {
    modalUser.style.display = "none";
  }
};
