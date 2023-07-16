<?php
include('../conec.php');
$codigo = $_POST['id_marca'];
$nombreMarca = $_POST['nombre'];


$editarUsuario = "UPDATE marca SET id_marca = '$codigo', nombre = '$nombreMarca' WHERE id_marca = '$codigo'";
$resultado = mysqli_query($conexion, $editarUsuario);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/registroMarca.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>