<?php
include ('../conec.php');

$claveMarca = $_GET['id_marca'] ?? NULL;
var_dump($claveUser);
$eliminarMarca = "DELETE FROM marca WHERE id_marca = '$claveMarca'";
$resultado = mysqli_query($conexion, $eliminarMarca);
header('Location: ../Admin/registroMarca.php');

?>