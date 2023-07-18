<?php
include('../../conec.php');
$codigo = $_POST['clave_usuario'];
$nombreUser = $_POST['nombre'];
$apellidoPaterno = $_POST['Apaterno'];
$apellidoMaterno = $_POST['Amaterno'];
$telefono = $_POST['telefono'];
$correoElec = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$departamento = $_POST['fk_departamento'];
$rol = $_POST['fk_rol'];
$puesto = $_POST['fk_puesto'];
$sexo = $_POST['sexo'];
$sucursal = $_POST['fk_sucursal'];

$editarUsuario = "UPDATE usuario SET clave_usuario = '$codigo', nombre = '$nombreUser', Apaterno = '$apellidoPaterno',
Amaterno = '$apellidoMaterno', telefono = '$telefono', correo = '$correoElec',
contrasena = '$contrasena', fk_departamento = '$departamento', fk_rol = '$rol', 
fk_puesto = '$puesto', sexo = '$sexo', fk_sucursal = '$sucursal' WHERE clave_usuario = '$codigo'";
$resultado = mysqli_query($conexion, $editarUsuario);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../usuarios.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>
