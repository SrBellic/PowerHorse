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
    </head>
    <body class="bg-light">
        <header class="bg-color_Yellow">
            <nav class="item_div">
                <a href="../index.html"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
                <picture class="slide">
                    <img src="../assets/kart.svg" width="100px">
                </picture>
            </nav>
        </header>
        <div class="item_div py-3">
            <main class="col-9 bg-white border border-2 rounded w-50 mx-5 shadow">
                <h2 class="my-2 ms-2">TUS COMPRAS</h2>
                <hr class="border opacity-100">
                <section class="my-3">

                    <!aqui se escribe el script lógico de llenado de carrito>
                    <script src="../config/counter.js"></script>
                    <button id="decrement">-</button>
                    <button id="increment">+</button>
                    <div class="d-flex justify-content-center">
                        <button class="button_green shadow w-25">PAGAR</button>
                    </div>
                </section>

                <!el section de la linea 36 al linea 57 debe ser impreso si y solo si el usuario presionó el botón PAGAR>

                <section class="col-7 bg-white border border-2 rounded shadow m-3">
                    <h5 class="my-2 ms-2">MÉTODOS DE PAGO</h5>
                    <hr class="border border opacity-100">
                    <form action="#" method="POST" class="m-3 row">
                        <label for="pago" class="form-label fw-medium">MÉTODO DE PAGO</label>
                        <select name="pago" class="form-select w-50">
                            <option value="pago_movil">Pago Móvil</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="deposito">Depósito</option>
                        </select>
                        <input type="submit" value="SELECCIONAR" class="button_green col-6">
                    </form>
                    <!
                        Aquí irá la caja de datos referentes al pago, ya sea pago movil,
                        transferencia o depósito. Lo haré una vez se tenga listo el cálculo
                        lógico.

                        De igual manera debe aparecer una caja de mensaje que aparecerá una vez
                        se haya confirmado el pago. Cuando se confirme el pago todo el carrito debe 
                        ser eliminado y sustituido por este mensaje
                    >
                </section>
            </main>
            <aside class="col-3 me-5 border border-2 border-black rounded bg-color_GreenLight shadow">
                <h5 class="mt-2 ms-2">TASA DEL DOLAR</h5>
                <hr class="border border-black opacity-100">
                <section class="text-center justify-content-center">
                    <b><p>TASA BCV:</p></b>
                    <b><p>1$ = 36,33 Bs</p></b>
                </section>
                <hr class="border border-black opacity-100">
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