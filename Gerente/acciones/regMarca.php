<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id_marca) AS ultimo_id FROM marca";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreMarca = $_POST['nombre'];
    // Insertar el paquete con el siguiente ID
    $insertarMarca = "INSERT INTO marca (id_marca, nombre) VALUES ('$siguienteId', '$nombreMarca')";
    $resultado = mysqli_query($conexion, $insertarMarca);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header ('Location: ../registroMarca.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header ('Location: ../registroMarca.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>