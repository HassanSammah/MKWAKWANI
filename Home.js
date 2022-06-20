let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += "active";
}

let slideIndexx = 0;
showSlidess();

function showSlidess() {
  let i;
  let slidess = document.getElementsByClassName("mySlidess");
  let dotss = document.getElementsByClassName("dott");
  for (i = 0; i < slidess.length; i++) {
    slidess[i].style.display = "none";  
  }
  slideIndexx++;
  if (slideIndexx > slidess.length) {slideIndexx = 1}    
  for (i = 0; i < dotss.length; i++) {
    dotss[i].className = dotss[i].className.replace(" activee", "");
  }
  slidess[slideIndexx-1].style.display = "block";  
  dotss[slideIndexx-1].className += " activee";
  setTimeout(showSlidess, 2000); // Change image every 2 seconds
}

