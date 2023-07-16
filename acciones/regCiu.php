<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM ciudades";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreCiu = $_POST['nombre'];
    $estado = $_POST['fk_estado'];
    $municipio = $_POST['fk_municipio'];
    $pais = $_POST['fk_pais'];
    // Insertar el paquete con el siguiente ID
    $insertarCiu = "INSERT INTO ciudades (id, nombre, fk_estado, fk_municipio, fk_pais) VALUES ('$siguienteId', '$nombreCiu', '$estado','$municipio','$pais')";
    $resultado = mysqli_query($conexion, $insertarCiu);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header ('Location: ../Admin/ciudades.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header ('Location: ../Admin/ciudades.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>