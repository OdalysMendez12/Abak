<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM puesto";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombrePuesto = $_POST['nombre_puesto'];
    // Insertar el paquete con el siguiente ID
    $insertarPuesto = "INSERT INTO puesto (id, nombre_puesto) VALUES ('$siguienteId', '$nombrePuesto')";
    $resultado = mysqli_query($conexion, $insertarPuesto);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header ('Location: ../Admin/puesto.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header ('Location: ../Admin/puesto.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>