/*header*/
const myslide = document.querySelectorAll('.myslide'),
	  dot = document.querySelectorAll('.dot');
let counter = 1;
slidefun(counter);


let timer = setInterval(autoSlide, 8000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}
function plusSlides(n) {
	counter += n;
	slidefun(counter);
	resetTimer();
}
function currentSlide(n) {
	counter = n;
	slidefun(counter);
	resetTimer();
}
function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 8000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	for(i = 0;i<dot.length;i++) {
		dot[i].className = dot[i].className.replace(' active', '');
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
	dot[counter - 1].className += " active";
}
/*
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
<<<<<<< Updated upstream

=======
*/

/*login*/
function login() {
    var user, password;
    user = document.getElementById("user").value;
    password = document.getElementById("password").value;
    if (user == "prueba" && password == "12345") {
        window.location = "perfilUsuario.html";
    } else {
        alert("Los datos ingresados son incorrectos, favor de verificar.");
    }
}
>>>>>>> Stashed changes
