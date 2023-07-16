<?php
include ('../conec.php');

$claveUser = $_GET['clave_usuario'] ?? NULL;
var_dump($claveUser);
$eliminarUsuario = "DELETE FROM usuario WHERE clave_usuario = '$claveUser'";
$resultado = mysqli_query($conexion, $eliminarUsuario);
header('Location: ../Admin/admin.php');

?>