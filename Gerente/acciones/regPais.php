<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM pais";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombrePais = $_POST['nombre'];

    // Insertar el paquete con el siguiente ID
    $insertarPaq = "INSERT INTO pais (id, nombre) VALUES ('$siguienteId', '$nombrePais')";
    $resultado = mysqli_query($conexion, $insertarPaq);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../paises.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../paises.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>