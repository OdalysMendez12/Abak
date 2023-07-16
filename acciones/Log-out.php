<?php
session_start();
include ('conec.php');
// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio o a otra página
header('Location: ../i_sesion.php');
exit;
?>
