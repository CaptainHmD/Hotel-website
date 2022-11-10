const textAnimation = document.querySelector('#text-animation');

let textCounter = 0
const prettyPhrases = ['Deluxe Suite~',"Double Room~","Single Room~"]
textAnimation.addEventListener('animationiteration', () => {
    if(prettyPhrases.length===textCounter)
    textCounter=0
    
    textAnimation.dataset.text  = prettyPhrases[textCounter]
    textCounter++
});



// When the user scrolls down 20px from the top of the document, slide down the navbar and change alpha to 1
// When the user scrolls to the top of the page, slide up the navbar (default = 10%) and return alpha to 0.7

window.onscroll = function() {scrollFunction()};
const navbar = document.getElementById("navbar");
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.background = "black";
    navbar.style.height="10%"
  } else {
    document.getElementById("navbar").style.background = "rgb(0, 0, 0, 0.7)";
    navbar.style.height="13%"

  }
}



// bootstrap modal
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})