<?php
include('../conec.php');
$codigo = $_POST['id'];
$nombreMun = $_POST['nombre'];
$estado = $_POST['fk_estado'];


$editarPais = "UPDATE municipio SET id = '$codigo', nombre = '$nombreMun', fk_estado = '$estado' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarPais);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/municipios.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>