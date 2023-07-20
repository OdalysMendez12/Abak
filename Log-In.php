<?php
session_start();
include('conec.php');

$email = $_POST['correo'];
$pass = $_POST['contrasena'];

$consultaEmail = "SELECT COUNT(*) as contador FROM abak.usuario WHERE correo = '$email' AND contrasena = '$pass'";
$validacion = mysqli_query($conexion, $consultaEmail);
$validacionEmail = mysqli_fetch_array($validacion);

$consulta = "SELECT * FROM usuario WHERE correo LIKE '$email'";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);

// Verificar si el correo y la contraseña coinciden
if ($validacionEmail['contador'] != 0) {
    // Verificar si el usuario está activo (activo = 1)
    if ($fila['activo'] == 1) {
        // Usuario válido y activo, permitir el acceso
        $rolUsuario = $fila["fk_rol"];
        $nombre_usuario = $fila["nombre"];
        $clave_usuario = $fila["clave_usuario"];
        $Amaterno = $fila["Amaterno"];
        $Apaterno = $fila["Apaterno"];

        $_SESSION['correo'] = $email;
        $_SESSION['fk_rol'] = $rolUsuario;
        $_SESSION['nombre'] = $nombre_usuario;
        $_SESSION['Amaterno'] = $Amaterno;
        $_SESSION['Apaterno'] = $Apaterno;
        $_SESSION['contrasena'] = $pass;
        $_SESSION['clave_usuario'] = $clave_usuario;

        switch ($rolUsuario) {
            case 1:
                header('Location:  Admin/admin.php');
                break;
            case 2:
                header('Location: Usuario/usuario.php');
                break;
            case 3:
                header('Location: Tecnico/ticket.php');
                break;
            case 4:
                header('Location: Gerente/usuarios.php');
                break;
            default:
                // Redireccionar a una página por defecto si el rol no está definido
                header('Location: PaginaPorDefecto.php');
                break;
        }
    } else {
        // El usuario está inactivo (activo = 0)
        $respuesta = "El usuario está inactivo. No se permite el acceso.";
        echo "<script>alert('$respuesta');
        window.location.href = 'i_sesion.php';</script>";
    }
} else {
    // Correo y contraseña incorrectos
    $respuesta = "Verifica los datos ingresados";
    echo "<script>alert('$respuesta');
    window.location.href = 'i_sesion.php';</script>";
}

?>
