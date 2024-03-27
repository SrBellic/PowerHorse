<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../img/favicon.icon">
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Registro</title>
    </head>
    <body class="bg-light">
        <header class="bg-color_Yellow">
            <nav class="item_div">
                <a href="../index.html"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
                <a href="login.html" class="button_black mx-5 shadow">INICIA SESIÓN</a>
            </nav>
        </header>
        <main>
            <div class="container bg-white text-black my-4 pb-3 rounded border border-2 w-50 shadow">
                <h1 class="py-2 my-2">REGISTRO</h1>
                <hr class="border opacity-100">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control shadow">
                            <br>
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control shadow">
                            <br>
                            <label for="id" class="form-label">Cedula</label>
                            <input type="number" name="id" class="form-control shadow">
                            <br>
                            <label for="adress" class="form-label">Dirección</label>
                            <input type="text" name="adress" class="form-control shadow">
                            <br>
                        </div>
                        <div class="col-6">
                            <label for="user" class="form-label">Usuario</label>
                            <input type="text" name="user" class="form-control shadow">
                            <br>
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="text" name="email" class="form-control shadow">
                            <br>
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="password" name="pass" class="form-control shadow">
                            <br>
                            <label for="pass2" class="form-label">Confirmar contraseña</label>
                            <input type="password" name="pass2" class="form-control shadow">
                            <br>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="REGISTRAR" class="button_yellow w-50 shadow">
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <hr>
            <p class="text-center">
                <small>Copyright by: POWERHORSE 2024</small>
            </p>
        </footer>
    </body>
</html>