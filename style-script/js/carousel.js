"use strict";


var slideIndex = 0;
var timeOut = 0;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
  clearTimeout(timeOut);
}
//function moinsSlides(n)

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
      slideIndex = 1;
  }
  slides[slideIndex-1].style.display = "block";
  timeOut = setTimeout(showSlides, 4000);
} 