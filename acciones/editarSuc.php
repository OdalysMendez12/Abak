<?php
include('../conec.php');
$codigo = $_POST['id'];
$nombreSuc = $_POST['nombre_suc'];
$estado = $_POST['fk_estado'];
$municipio = $_POST['fk_municipio'];
$ciudad = $_POST['fk_ciudad'];
$empresa = $_POST['fk_empresa'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$responsable = $_POST['fk_responsable'];


$editarSuc = "UPDATE sucursal SET id = '$codigo', nombre_suc = '$nombreSuc', fk_estado = '$estado', fk_municipio = '$municipio', 
fk_ciudad = $ciudad, fk_empresa = '$empresa', direccion = '$direccion', telefono = '$telefono', fk_responsable = '$responsable'
WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarSuc);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/sucursales.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}