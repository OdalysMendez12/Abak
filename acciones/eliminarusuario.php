<?php
include ('../conec.php');

$claveUser = $_GET['clave_usuario'] ?? NULL;
$razon = $_GET['razon'] ?? '';

if (!empty($claveUser)) {
    // Puedes usar la variable $razon para guardar la razón de la eliminación en la base de datos si lo deseas.
    // Por ejemplo, podrías agregar un campo "razon_eliminacion" en la tabla "usuario" y guardarlo aquí.

    // En lugar de eliminar el usuario, actualizamos su estado a "inactivo" (0)
    $actualizarEstado = "UPDATE usuario SET razon = '$razon' ,activo = 0 WHERE clave_usuario = '$claveUser'";
    $resultado = mysqli_query($conexion, $actualizarEstado);
    
    if ($resultado) {
        // Redireccionar a la página de administración
        header('Location: ../Admin/admin.php');
    } else {
        // Manejo de errores, redireccionar a una página de error o mostrar un mensaje de error.
        // Aquí puedes personalizar la respuesta según tus necesidades.
        echo 'Error al actualizar el estado del usuario.';
    }
} else {
    // Manejo del error o caso donde no se proporciona la clave del usuario
    // Por ejemplo, redireccionar a una página de error o mostrar un mensaje de error.
    // Aquí puedes personalizar la respuesta según tus necesidades.
}
?>

