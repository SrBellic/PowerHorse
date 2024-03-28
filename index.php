<?php 
    //Se conecta la pagina con la base de datos
    require_once "config/dbConnect.php";

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
                <img src="img/logo.jpg" class="ms-3" width="190px">
                <div class="item_div marginSpace-x">
                    <form action="#" method="GET" class="marginSpace-x">
                        <input type="search" class="form-control form-control-lg shadow" name="barra" placeholder="Buscar">
                    </form>
                    <div class="marginSpace-x">
                        <!
                            El boton de inicio de sesión debe desaparecer si la sesión está iniciada. Se pueden crear (se copian
                            y se pegan) 2 navs y que cada uno responda según la condición, es decir, Si no está iniciado se muestra
                            el boton, si está iniciado entonces no se muestra.
                        >
                        <a class="button_black shadow marginSpace-x" href="pages/login.php">INICIAR SESIÓN</a>
                        <a class="button_black shadow marginSpace-x" href="pages/kart.php">CARRITO</a>
                    </div>
                <div>
            </nav>
        </header>
        <div class="item_div">
            <aside class="col-3 container d-none d-md-none d-lg-block">
                <ul class="fs-4 my-4 item_top bg-color_CustomWhite col-2 shadow rounded mx-3">
                    <div class="container row">
                        <li><br></li>
                        <li class="marginSpace-y link_hover"><a href="#" class="w-100">Toyota</a></li>
                        <li class="marginSpace-y link_hover"><a href="#" class="w-100">Ford</a></li>
                        <li class="marginSpace-y link_hover"><a href="#" class="w-100">Chevrolet</a></li>
                        <li class="marginSpace-y link_hover"><a href="#" class="w-100">Volkswagen</a></li>
                    </div>
                </ul>
            </aside>
            <main class="container shadow p-4 bg-light">
                <section class="item_grid grid_center mt-4"> 
                    <!Inicio del primer cuadro>
                    <picture class="border rounded bg-white shadow">
                        <!
                            Esta primera caja de producto será la referencia para colocar los productos.
                            Solo se debe copiar y pegar la estructura semántica de HTML, reemplazar los datos
                            del producto por lo agregado por la lógica y de forma que se llene con el foreach 
                            como la versión pasada y se mantenga el contenido estetico de este diseño. 

                            Las imagenes aun no son redimensionadas (tanto dimensiones de tamaño como orientación), 
                            el momento que lo sean sea añadirá la actualización. De igual forma se pueden usar 
                            las imagenes de la vez anterior por si alguien quiere ir adelantando por ese ámbito.

                            En la etiqueta p se añadirán los detalles del producto (precio, nombre y marca), no más 
                            de lo necesario para evitar saturación de información y desorganización estética.

                            Solo basta con añadir la lógica para que se muestren los productos y los botones de comprar envien
                            la información al código y a la base de datos para llenar el carrito y comprar los productos.

                            *MANTENER CLASES Y ETIQUETAS*

                            //El resto de  cuadros que no sean el primero pueden ser eliminados con tranquilidad.
                        >
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <form action="#" method="POST">
                                <!
                                    Si el usuario no está logeado este botón de comprar debe redirigir a la
                                    pantalla de inicio de sesión, además debe llenar el carrito con el producto seleccionado 
                                    una vez logeado
                                >
                                <input type="button" value="COMPRAR" class="button_yellow fw-bold shadow mx-5">
                            </form>
                        </article>
                        <!Final del primer cuadro>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
                    <picture class="border rounded bg-white shadow">
                        <img src="img/logo.jpg" class="rounded-top" width="200px">
                        <article class="mb-3">
                            <p class="mt-2 ms-2">Producto</p>
                            <button class="button_yellow shadow mx-5"><b>COMPRAR</b></button>
                        </article>
                    </picture>
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