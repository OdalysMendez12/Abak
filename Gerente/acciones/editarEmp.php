<?php
include('../../conec.php');

// Continuar con la carga del formulario de edición
$codigo = $_POST['id'];
$nombreEmp = $_POST['nombre'];
$correo = $_POST['correo'];
$estado = $_POST['fk_estado'];
$municipio = $_POST['fk_municipio'];
$ciudad = $_POST['fk_ciudad'];
$pais = $_POST['fk_pais'];
$direccion = $_POST['direccion'];
$RFC = $_POST['RFC'];

// Resto del código de edición
$editarSuc = "UPDATE empresa SET id = '$codigo', nombre = '$nombreEmp', correo = '$correo' ,fk_estado = '$estado', fk_municipio = '$municipio', fk_ciudad = $ciudad, fk_pais = '$pais', direccion = '$direccion', RFC = '$RFC' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarSuc);

if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../empresas.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>
