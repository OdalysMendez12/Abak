/*header*/
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $("header").addClass("header2");
        } else {
            $("header").removeClass("header2");
        }
    });
});

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
