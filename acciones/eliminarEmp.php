<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
var_dump($clave);
$eliminarEmp = "DELETE FROM empresa WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminarEmp);
header('Location: ../Admin/empresas.php');

?>