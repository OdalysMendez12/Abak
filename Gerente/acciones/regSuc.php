
<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM sucursal";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreSuc = $_POST['nombre_suc'];
    $estado = $_POST['fk_estado'];
    $municipio = $_POST['fk_municipio'];
    $ciudad = $_POST['fk_ciudad'];
    $empresa = $_POST['fk_empresa'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $responsable = $_POST['fk_responsable'];

    // Insertar el paquete con el siguiente ID
    $insertarsuc = "INSERT INTO sucursal (id, nombre_suc, fk_estado, fk_municipio, fk_ciudad, fk_empresa, direccion, telefono, fk_responsable) 
    VALUES ('$siguienteId', '$nombreSuc', '$estado', '$municipio', '$ciudad', '$empresa', '$direccion', '$telefono', '$responsable')";
    $resultado = mysqli_query($conexion, $insertarsuc);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../Gerente/sucursales.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../Gerente/sucursales.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>