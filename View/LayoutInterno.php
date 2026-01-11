<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CreditoController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/InicioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CreditoController.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION["nombreCompleto"]))
    {
      header("Location: ../../View/Inicio/InicioSesion.php");
      exit;
    }

    function ShowCSS()
    {
        echo
        '
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Sales Smart</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/EstilosHome.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
            <link rel="icon" href="../Images/favicon.ico">
            <link rel="stylesheet" href="../CSS/EstilosProveedor.css">
            <link rel="stylesheet" href="../CSS/EstilosProducto.css">
            <link rel="stylesheet" href="../CSS/EstilosCredito.css">
            <link rel="stylesheet" href="../CSS/EstilosVenta.css">
            <link rel="stylesheet" href="../CSS/EstilosDetalle.css">
            <link rel="stylesheet" href="../CSS/EstilosDashboard.css">
        </head>
        ';
    }

    function ShowJS()
    {
        echo
        '
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../JS/Navbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        ';
    }

    function ShowNav()
    {
      $notificaciones = ConsultarCreditosVencidos();
      $nombreCompleto = "";
      $nombreRol = "";
      if(isset($_SESSION["nombreCompleto"]))
      {
        $nombreCompleto = $_SESSION["nombreCompleto"];
        $nombreRol = $_SESSION["nombreRol"];
      }
      echo
      '
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <i class="fa-solid fa-basket-shopping gradient-icon mb-3"></i>
                <h3 class="brand-title">Sales Smart</h3>
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul class="nav-menu">
            ';
            if($nombreRol == 'Administrador(a)')
            {
                echo'
                <li class="nav-item">
                    <a href="../Dashboard/Dashboard.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Dashboard/Reportes.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reportes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Productos/Productos.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-box"></i>
                        <span>Inventario</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Categorias/Categorias.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Admin/Proveedor.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-truck"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
                ';
            }
            elseif($nombreRol == 'Empleado(a)')
            {
                echo
                '
                <li class="nav-item">
                    <a href="../Principal/Home.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Reabastecer/Reabastecer.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-truck-loading"></i>
                        <span>Reabastecer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Creditos/Creditos.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-users"></i>
                        <span>Créditos</span>
                        <span class="notification-badge">'. $notificaciones.'</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Principal/Historial.php" class="nav-link" onclick="setActive(this)">
                        <i class="fas fa-history"></i>
                        <span>Historial de Ventas</span>
                    </a>
                </li>
            </ul>
            ';
            }
        echo
        '
        </nav>

        <div class="main-content">
            <div class="top-navbar d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Bienvenido(a)</h4>
                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none text-dark" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <div class="text-center">
                            <div class="fw-bold">
                                '.$nombreCompleto.'
                            </div>
                            <small class="text-muted">
                                '.$nombreRol.'
                            </small>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end text-start shadow">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../../View/Principal/CambiarContrasenna.php">
                                <i class="fa-solid fa-key me-2"></i>
                                Cambiar Contraseña
                            </a>
                        </li>

                        <li>
                            <form action="" method="POST">
                                <button type="submit" 
                                        class="dropdown-item text-danger fw-semibold" 
                                        id="btnSalir" 
                                        name="btnSalir">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    <span class="align-middle">Cerrar Sesión</span>
                                </button>
                            </form>
                        </li>
                    </ul>

                </div>
                <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
      ';
    }
?>


<script>
  window.addEventListener("pageshow", function (event) 
  {
    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") 
    {
      window.location.reload(true);
    }
  });
</script>