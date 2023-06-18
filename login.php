<?php
include ('conec.php');
$email = $_POST["correo"];
$password = $_POST["contrasena"];

session_start();
$consulta ="SELECT * FROM Usuarios WHERE correo = '$email' AND contrasena = '$password'";
$resultado=mysqli_query($conexion,$consulta);

$fila=mysqli_fetch_array($resultado);

if($fila ['fk_rol']==1){
    header('Location: vistas/admin.php');
}if($fila ['fk_rol'] ==2){
    header('Location: vistas/usuario.php');
}else {
    header('Location: i_session.php');
}