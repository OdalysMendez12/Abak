<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM so";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreSO = $_POST['nombre_so'];

    // Insertar el paquete con el siguiente ID
    $insertarso = "INSERT INTO so (id, nombre_so) VALUES ('$siguienteId', '$nombreSO')";
    $resultado = mysqli_query($conexion, $insertarso);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../Admin/sistemaOp.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../Admin/sistemaOp.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
