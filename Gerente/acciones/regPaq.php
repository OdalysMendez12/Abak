<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM paqueteria";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombrePaq = $_POST['nombre'];
    $codigo = $_POST['codigo'];

    // Insertar el paquete con el siguiente ID
    $insertarPaq = "INSERT INTO paqueteria (id, nombre, codigo) VALUES ('$siguienteId', '$nombrePaq', '$codigo')";
    $resultado = mysqli_query($conexion, $insertarPaq);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../paqueteria.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../paqueteria.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
