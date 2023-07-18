<?php
include('../../conec.php');
$codigo = $_POST['id'];
$nombrePais = $_POST['nombre'];


$editarPais = "UPDATE pais SET id = '$codigo', nombre = '$nombrePais' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarPais);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../paises.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>