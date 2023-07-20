    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class="navbar-nav" style="margin-left: auto;">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-"></i> Hola, <?php echo $_SESSION['nombre'] ?>!
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-link">
                        <a href="admin.php">Inicio</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="../acciones/Log-out.php">Logout</a>
                    </li>
                </ul>
            </li>
    </ul>
</div>
</nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="" class="brand-link">
                        <i class="fas fa-font" style="display: flex; justify-content: center;"></i>
                        <span class="brand-text font-weight-light" style="display: flex; justify-content: center;">ABAK SOLUCIONES</span>
                    </a>
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="usuarios.php" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Usuarios
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            Help Desk
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="nuevoTicket.php" class="nav-link">
                                            <i class="fas fa-ticket-alt"></i>
                                                <p>Nuevo ticket</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ticket.php" class="nav-link">
                                            <i class="fas fa-eye"></i>
                                                <p>Ver tickets</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="kardex.php" class="nav-link">
                                            <i class="fas fa-book-open"></i>
                                                <p>Detalle tickets</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-laptop"></i>
                                        <p>
                                            Equipos
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                            <a href="catalogoEqui.php" class="nav-link">
                                            <i class="fas fa-desktop"></i>
                                                <p>Catalogo de equipos</p>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="asignaciones.php" class="nav-link">
                                            <i class="far fa-address-book"></i>
                                                <p>Asignaciones</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-plus"></i>
                                            <p>
                                                Extras
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="puesto.php" class="nav-link">
                                            <i class="fa fa-gavel"></i>
                                                <p>Puesto</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sistemaOp.php" class="nav-link">
                                            <i class="nav-icon fas fa-desktop"></i>
                                                <p>Sistemas operativos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="paqueteria.php" class="nav-link">
                                            <i class="nav-icon far fa-file-pdf"></i>
                                                <p>Paqueteria</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="registroMarca.php" class="nav-link">
                                            <i class="fab fa-github"></i>
                                                <p>Marcas</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="componentes.php" class="nav-link">
                                            <i class='fas fa-sd-card'></i>
                                            <p>Componentes</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="departamentos.php" class="nav-link">
                                            <i class="fas fa-store"></i>
                                                <p>Departamentos</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-map"></i>
                                        <p>
                                            Lugares
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="paises.php" class="nav-link">
                                            <i class="far fa-map"></i>
                                                <p>Paises</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="estados.php" class="nav-link">
                                            <i class="fas fa-map-marked"></i>
                                                <p>Estados</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="municipios.php" class="nav-link">
                                            <i class="fas fa-map-marked-alt"></i>
                                                <p>Municipios</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ciudades.php" class="nav-link">
                                            <i class="fas fa-map-marker-alt"></i>
                                                <p>Ciudades</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">Empresas</li>
                                <li class="nav-item">
                                    <a href="empresas.php" class="nav-link">
                                        <i class="nav-icon far fa-building"></i>
                                        <p>
                                            Empresas
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sucursales.php" class="nav-link">
                                        <i class="nav-icon fas fa-warehouse"></i>
                                        <p>
                                            Sucursales
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../acciones/Log-out.php" class="nav-link">
                                        <i class="nav-icon fas fa-power-off"></i>
                                        <p>
                                            Cerrar Sesión
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside>