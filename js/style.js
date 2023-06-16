/*header*/
const miBanner = document.querySelectorAll('.miBanner'),
dot = document.querySelectorAll('.dot');

let counter = 1;
slidefun(counter);

let timer = setInterval(autoslide, 8000);

function autoslide(){
counter += 1;
slidefun(counter);
}

function plusSlides(n){
    counter += n;
    slidefun(counter);
    resetTimer();
}

function currentSlide(n){
    counter = n;
    slidefun(counter);
    resetTimer();
}

function resetTimer(){
    clearInterval(timer);
    timer = serInterval(autoslide, 8000);
}

function slidefun(n){
    let i;
    for (i = 0; i < miBanner.length; i++){
        miBanner[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++){
        dot[i].classList.remove('active');
}

if(n > miBanner.length){
    counter = 1;
}
if(n < 1){
    counter = miBanner.length;
}
miBanner[counter - 1].style.display = "block";
dot[counter - 1].classList.add('active');
}

function slidefun(n){
}

