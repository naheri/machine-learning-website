
// joue un son et ajoute une clasee quand on clique sur le bouton
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


// change la couleur de fond des sections
const switchColor = function(){
  let items = document.querySelectorAll('section');
  for(const section of document.querySelectorAll('section')){
    section.style.background = randomColor({luminosity: 'newColorScheme'});
  }
}

// change la couleur du texte
const switchColorText = function(){
  let items = document.querySelectorAll('p');
  for(const p of document.querySelectorAll('p')){
    p.classList.add('dark-mode-text');
  }
}
const switchColorText_black = function(){
  let items = document.querySelectorAll('p');
  for(const p of document.querySelectorAll('p')){
    p.classList.add('dark-mode-text');
  } 
}
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
  const newColorScheme = event.matches ? "dark" : "light";
});
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  // dark mode
  switchColorText_black();
} else {
  // light mode
  switchColor();
  switchColorText();
}

/* sons */
function tongueSound(){
	var snd = new Audio("../sounds/Tongue-clicking-sound.mp3")
	snd.play()
}
function plantedSound(){
	var snd = new Audio("../sounds/TOONTwang_Plantedcartoon.mp3")
	snd.play()
}
function bubbleBurstSound(){
	var snd = new Audio("../sounds/bubbleburst.mp3")
	snd.play()
}
// DIV DRAGGABLE
dragElement(document.getElementById('titre'));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
// ÉLÉMENT CACHÉ APRÈS QUELQUES SECONDES
setTimeout(() => {
	const box = document.getElementById('conseil');
	box.style.display = 'none';
  }, 5000); // 👈️ time in milliseconds