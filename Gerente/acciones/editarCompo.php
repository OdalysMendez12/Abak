<?php
include('../../conec.php');
$codigo = $_POST['id'];
$nombre = $_POST['nombre_componente'];
$modelo=$_POST['modelo'];
$serie = $_POST['serie'];

$editarComponente = "UPDATE componentes SET id = '$codigo', nombre_componente = '$nombre', modelo = '$modelo', serie = '$serie'  WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarComponente);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../componentes.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>