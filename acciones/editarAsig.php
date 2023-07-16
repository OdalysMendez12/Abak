<?php
include('../conec.php');

// Obtener los datos del formulario
$codigo = $_POST['id'];
$FechaDevuelta = $_POST['fecha_devuelta'];


// Obtener el equipo asociado a la asignación
$obtenerEquipo = "SELECT fk_clave_equipo FROM asignaciones WHERE id = '$codigo'";
$resultadoEquipo = mysqli_query($conexion, $obtenerEquipo);
$filaEquipo = mysqli_fetch_assoc($resultadoEquipo);
$equipoId = $filaEquipo['fk_clave_equipo'];

$obtenerSucursal = "SELECT fk_sucursal FROM asignaciones WHERE id = '$codigo'";
$resultadoSucursal = mysqli_query($conexion, $obtenerSucursal);
$filaSucursal = mysqli_fetch_assoc($resultadoSucursal);
$SucursalId = $filaSucursal['fk_sucursal'];


// Consulta de actualización
$editarAsignacion = "UPDATE asignaciones SET fecha_devuelta = '$FechaDevuelta' WHERE id = '$codigo'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $editarAsignacion);

if ($resultado) {
    // Incrementar el stock en la tabla "equipo"
    $incrementarStock = "UPDATE equipo SET stock = stock + 1 WHERE fk_clave_equipo = '$equipoId' AND fk_sucursal = '$SucursalId'";
    $resultadoStock = mysqli_query($conexion, $incrementarStock);

    if (!$resultadoStock) {
        echo '<script>alert("Error al incrementar el stock del equipo.")</script>';
    }
} else {
    echo '<script>alert("Error al eliminar la asignación.")</script>';
}

header('Location: ../Admin/asignaciones.php');

// Cerrar la conexión
mysqli_close($conexion);
?>
