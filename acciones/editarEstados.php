<?php
include('../conec.php');
$codigo = $_POST['id'];
$nombreEstado = $_POST['nombre'];


$editarUsuario = "UPDATE estados SET id = '$codigo', nombre = '$nombreEstado' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarUsuario);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/estados.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>