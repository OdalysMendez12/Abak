<?php
include('../../conec.php');
$codigo = $_POST['id'];
$nombreCiu = $_POST['nombre'];
$estado = $_POST['fk_estado'];
$municipio = $_POST['fk_municipio'];
$pais = $_POST['fk_pais'];


$editarCiu = "UPDATE ciudades SET id = '$codigo', nombre = '$nombreCiu', fk_estado = '$estado', fk_municipio = '$municipio', fk_pais = '$pais' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarCiu);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../ciudades.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>