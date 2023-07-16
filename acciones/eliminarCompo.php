<?php
include ('../conec.php');

$claveComponente = $_GET['id'] ?? NULL;
$eliminarComponente = "DELETE FROM componentes WHERE id = '$claveComponente'";
$resultado = mysqli_query($conexion, $eliminarComponente);
header('Location: ../Admin/componentes.php');

?>