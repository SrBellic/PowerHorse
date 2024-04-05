<?php 
require_once "config/dbConnect.php";
include 'config/catalogo.php';

// Iniciar sesión si no está iniciada
if (!isset($_SESSION)) 
    session_start();

// Verificar si la sesión está activa
$sesionActiva = isset($_SESSION['usuario']);

//Cerrar sesión si se hace clic en el botón de cerrar sesión
if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Filtro por marca
$filtroMarca = isset($_GET['marca']) ? $_GET['marca'] : null;

// Filtro por búsqueda
$filtroBusqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>PowerHorse</title>
</head>
<body>
    <header class="bg-color_Yellow">
        <nav class="item_div">
            <a href="index.php"><img src="img/logo.jpg" class="ms-3" width="190px"></a>
            <div class="item_div marginSpace-x">
                <form action="#" method="POST" class="marginSpace-x">
                    <input type="search" class="form-control form-control-lg shadow" name="busqueda" placeholder="Buscar">
                </form>
                <?php if ($sesionActiva): ?>
                    <!-- Si la sesión está activa, mostrar botón de cierre de sesión -->
                    <a class="button_red fw-bold shadow marginSpace-x" href="index.php?cerrar_sesion=true">CERRAR SESIÓN</a>
                <?php else: ?>
                    <!-- Si la sesión no está activa, mostrar botón de inicio de sesión -->
                    <a class="button_black fw-bold shadow marginSpace-x" href="pages/login.php">INICIAR SESIÓN</a>
                <?php endif; ?>
                <a class="button_black fw-bold shadow marginSpace-x" href="pages/kart.php">CARRITO</a>
            </div>
        </nav>
    </header>
    <div class="item_div">
        <aside class="col-3 container d-none d-md-none d-lg-block">
            <ul class="fs-4 my-4 item_top bg-light col-2 shadow rounded mx-3">
                <div class="container row">
                    <li><br></li>
                    <!-- Agregar enlaces de marcas -->
                    <li class="marginSpace-y link_hover"><a href="index.php?marca=Toyota" class="w-100">Toyota</a></li>
                    <li class="marginSpace-y link_hover"><a href="index.php?marca=Ford" class="w-100">Ford</a></li>
                    <li class="marginSpace-y link_hover"><a href="index.php?marca=Chevrolet" class="w-100">Chevrolet</a></li>
                    <li class="marginSpace-y link_hover"><a href="index.php?marca=Volkswagen" class="w-100">Volkswagen</a></li>
                </div>
                <br>
                <a href="index.php" class="button_yellow fw-bold fs-5 shadow">BORRAR FILTROS</a>
            </ul>
        </aside>
        <main class="container shadow p-4 bg-light">
            <section class="item_grid grid_center mt-4 ms-3"> 

                <?php mostrarCarrito($connect, $filtroMarca, $filtroBusqueda); ?>

            </section>
        </main>
    </div>
    <footer>
        <hr>
        <p class="text-center">
            <small>Copyright by: POWERHORSE 2024</small>
        </p>
    </footer>
</body>
</html>
