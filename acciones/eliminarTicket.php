<?php
include ('../conec.php');

$clave = $_GET['clave_ticket'] ?? NULL;
var_dump($clave);
$eliminarSistema = "DELETE FROM tickets WHERE clave_ticket = '$clave'";
$resultado = mysqli_query($conexion, $eliminarSistema);
header('Location: ../Admin/ticket.php');

?>