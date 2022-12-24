const menu = document.getElementById("menu");

Array.from(document.getElementsByClassName("menu-item"))
  .forEach((item, index) => {
    item.onmouseover = () => {
      menu.dataset.activeIndex = index;
    }
  });
  function bubbleBurstSound(){
    var snd = new Audio("../sounds/bubbleburst.mp3")
    snd.play()
  }