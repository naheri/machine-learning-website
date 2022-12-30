// son + ajout d'une classe au clic
const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".nav-links")
    function bubbleBurstSound(){
        var snd = new Audio("../sounds/bubbleburst.mp3")
        snd.play()
    }
    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    bubbleBurstSound();
    })
// défilement automatique des images
var index = 0;
var slides = document.querySelectorAll(".slides");

function changeSlide(){
  if(index<0){
    index = slides.length-1;
  }
  if(index>slides.length-1){
    index = 0;
  }
  for(let i=0;i<slides.length;i++){
    slides[i].style.display = "none";
  }
  slides[index].style.display= "block";
  index++;
  setTimeout(changeSlide,2000); // 2 secondes
  
}

changeSlide();
// éléments FAQ qui "s'éffondrent"
var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for(i = 0; i < coll.length; i++){
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        } 
      });
    }