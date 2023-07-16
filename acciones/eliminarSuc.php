<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
var_dump($clave);
$eliminarSistema = "DELETE FROM sucursal WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminarSistema);
header('Location: ../Admin/sucursales.php');

?>