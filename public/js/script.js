const textAnimation = document.querySelector('#text-animation');

let textCounter = 0
textAnimation.addEventListener('animationiteration', (event) => {
    console.log('end of iteration');   
    if(textCounter===0){
        textAnimation.dataset.text="hi guys " 
        textCounter++
    }else if(textCounter===1){
        textAnimation.dataset.text="im hamad" 
        textCounter++

    }else if(textCounter===2){
        textAnimation.dataset.text="i like" 
        textCounter++

    }else if(textCounter===3){
        textAnimation.dataset.text="nothing !!" 
        textCounter++

    }else if(textCounter===4){
        textAnimation.dataset.text="end of e" 
        textCounter=0

    }
});