<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">

    <title>ABAK SOLUCIONES | Log in</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="hold-transition login-page">
    <header class="head">
        <nav class="nav">
            <a href="index.html" class="logo nav-link"><img src="img/logo.png"></a>
            <ul class="nav-menu">
                <li class="nav-menu-item"><a href="index.html" class="nav-menu-link nav-link active">Inicio</a></li>
            </ul>
        </nav>
    </header>
    <div class="login-box">
        <div class="login-logo">
            <a href="i_sesion.php"><b>ABAK SOLUCIONES</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>

                <form class="formulario" action="Log-In.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="correo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="contrasena">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" name="enviar" value="Iniciar Sesión" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>