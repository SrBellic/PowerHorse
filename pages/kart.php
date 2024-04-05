<?php

require_once '../config/dbConnect.php';

session_start();
// Verificar si la sesión está iniciada
if (!isset($_SESSION['usuario'])) {
    // Si la sesión no está iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location:login.php");
    exit();
    }

$bandera = false;

// Verificar si se está intentando agregar un producto al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id-producto"])) {

    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'])) 
        $_SESSION['carrito'] = array();

    $_SESSION["carrito"][] = array(
        "cantidad" => intval($_POST["cantidad-producto"]),
        "id" => $_POST["id-producto"], 
        "nombre" => $_POST["nombre-producto"],
        "descripcion" => $_POST["descripcion-producto"],
        "marca" => $_POST["marca-producto"],
        "precio" => floatval($_POST["precio-producto"]),
        "stock" => intval($_POST['stock-producto']),
        "imagen" => $_POST['imagen-producto']
    );


    //Se obtiene el nombre del producto, para poder mostrarlo en el mensaje en pantalla, al redirigir la pagina
    $nombre = $_SESSION["carrito"][count($_SESSION['carrito']) - 1]["nombre"];
    header('Location: ../index.php?nombre='.$nombre.'');
    exit(); 
}

// Función para imprimir el contenido del carrito
function imprimirCarrito() {
    $total = 0;

    if (isset($_SESSION["carrito"])) {
        $button_id_suffix = 0;

        foreach ($_SESSION["carrito"] as $producto) {
            $increment_button_id = 'increment_' . $button_id_suffix;
            $decrement_button_id = 'decrement_' . $button_id_suffix;
            $button_id_suffix++;

            echo '<div class="container px-4">'.
                    '<img src="../assets/productos/'.$producto["imagen"].'" class="rounded-top" width="180px">'.
                    '<br>'
                    .$producto["nombre"].
                    '<br>'
                    .$producto["descripcion"].
                    '<br>'.
                    'Marca: <b>'.$producto["marca"].'</b>'.
                    '<br>'.
                    'Precio: '.$producto["precio"].'$'.
                    '<br>'.
                    '</b><br>
                </div>';

            echo '<div class="d-flex flex-row-reverse my-3">
                    <div class="item_div">
                        <form action="../config/eliminarCarrito.php" method="GET">
                            <input type="hidden" name="id-producto" value="'.array_search($producto, $_SESSION["carrito"]).'">
                            <input type="submit" class="button_red fw-bold shadow mx-5 py-4" value="BORRAR">
                        </form>'./*
                        <button class="button_yellow fw-bold mx-3 shadow decrement-button" data-id="'.$decrement_button_id.'">-</button>
                        <h6 class="mx-4">1</h6>
                        <button class="button_yellow fw-bold mx-3 shadow increment-button" data-id="'.$increment_button_id.'">+</button>*/
                    '</div>
                </div>';

            echo '';

            echo '<hr>';

            $total += $producto["precio"];
        }

        if (!empty($_SESSION["carrito"])) {
            echo '<div id="total-compra-contenedor" class="container ms-3">
                    <h4 id="total-compra">Total: '.$total.'$</h4>
                  </div>

                  <br>

                  <div class="d-flex justify-content-center">
                  <button id="pagar-btn" class="my-3 button_green fw-bold shadow w-25">PAGAR</button>
                  </div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.icon">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slide.css">
    <title>Carrito</title>
    <script src="../js/metodo_pago.js"></script>
    <script src="../js/counter.js"></script>
</head>
<body class="bg-light">
    <header class="bg-color_Yellow">
        <nav class="item_div">
            <a href="../index.php"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
            <picture class="slide">
                <img src="../assets/kart.svg" width="100px">
            </picture>
        </nav>
    </header>
    <div class="item_div py-3">
        <main class="col-6 bg-white border border-2 rounded mx-5 shadow">
            <h2 class="my-2 text-center">TUS COMPRAS</h2>
            <hr class="border opacity-100">
            <section id="carrito-section" class="my-3">
                <?php

                // Mostrar contenido del carrito
                if (isset($_SESSION['carrito'])) {
                    imprimirCarrito();
                } 
                ?>
            </section>

            <?php

            // Verifica si la compra fue realizada
            if(isset($_GET["compraRealizada"]))
            {

                echo '<section id="mensaje-pago" class="my-3" style="display: block;"> <!-- Este es el contenedor del mensaje de pago -->
                            <h3>Pago realizado. ¡Gracias por su compra!</h3>
                        </section>';

            }

            ?>

            <section id="mensaje-pago" class="my-3"> <!-- Este es el contenedor del mensaje de pago -->
                <h3>Pago realizado. ¡Gracias por su compra!</h3>
            </section>
            
            <section id="metodos-pago" class="col-9 bg-white border border-2 rounded shadow m-3" style="display: none;">
                <h5 class="my-2 ms-2">MÉTODOS DE PAGO</h5>
                <hr class="border border opacity-100">
                <form action="kart.php" method="POST" class="m-3 row">
                    <label for="pago" class="form-label fw-medium">MÉTODO DE PAGO</label>
                    <select name="pago" class="form-select w-50">
                        <option value="pago_movil">Pago Móvil</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                    <input type="button" value="SELECCIONAR" class="button_green fw-bold shadow col-6" id="seleccionar-btn">
                </form>

                <form action="../config/actualizarDB.php" method="POST" class="m-3 row">
                <div id="pago_movil-info" class="ms-3 my-2 pago-info" style="display: none;">
                    <p class="fs-5">Número de teléfono: <b>0412 0000 000</b></p>
                    <p class="fs-5">J-<b>0123456789</b></p>
                    <p class="fs-5">Banco Moya</p>
                    <button name="validar-compra" class="button_green fw-bold shadow verificar-button">PAGAR AHORA</button>
                </div>
                <div id="transferencia-info" class="ms-3 my-2 pago-info" style="display: none;">
                    <p class="fs-5">Número de teléfono: <b>0412 0000 000</b></p>
                    <p class="fs-5">J-<b>0123456789</b></p>
                    <p class="fs-5">Banco Moya</p>
                    <p class="fs-5">powerhorse@moya.com</p>
                    <p class="fs-5">N° Cuenta: <b>0666 0104 0123 0123 0123</b></p>
                    <button name="validar-compra" class="button_green fw-bold shadow verificar-button">PAGAR AHORA</button>
                </div>
            </form>

            </section>
            <div id="prueba"></div>
        </main>
        <aside class="col-4 me-5 item-Top border border-2 rounded bg-white shadow d-lg-block d-md-block d-sm-block d-none">
            <h5 class="mt-2 ms-2">TASA DEL DÓLAR</h5>
            <hr class="border opacity-100">
            <section class="text-center justify-content-center py-5 my-5">
                <b><p>TASA BCV:</p></b>
                <b><p>1$ = 36,33 Bs</p></b>
            </section>
            <hr class="border opacity-100">
        </aside>
    </div>
    <footer>
        <hr>
        <p class="text-center">
            <small>Copyright by: POWERHORSE 2024</small>
        </p>
    </footer>
</body>
</html>
