// change la couleur de fond des sections
const switchColor = function(){
    let items = document.querySelectorAll('section');
    for(const section of document.querySelectorAll('section')){
      section.style.background = randomColor({luminosity: 'newColorScheme'});
    }
  }
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
    const newColorScheme = event.matches ? "dark" : "light";
  });
  if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  } else {
    // light mode
    switchColor();

  }

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
/* sons */
function tongueSound(){
	var snd = new Audio("../sounds/Tongue-clicking-sound.mp3")
	snd.play()
}
function plantedSound(){
	var snd = new Audio("../sounds/TOONTwang_Plantedcartoon.mp3")
	snd.play()
}