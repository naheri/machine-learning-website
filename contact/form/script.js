
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