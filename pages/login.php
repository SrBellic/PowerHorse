<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../img/favicon.icon">
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Inicia Sesión</title>
    </head>
    <body class="bg-light">
        <header class="bg-color_Yellow">
            <nav>
                <a href="../index.php"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
            </nav>
        </header>
        <main>
            <section class="container bg-white border shadow p-4 bg-body-tertiary rounded my-5 px-5 w-50">
                <div class="row">
                    <div class="item_div">
                        <div class="col-6 d-lg-block d-md-block d-none">
                            <h1>INICIA SESIÓN</h1>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-5">
                            <form action="#" method="POST">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" name="correo" class="form-control shadow bg-body-tertiary">
                                <br>
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" name="pass" class="form-control shadow bg-body-tertiary">
                                <br>
                                <input type="submit" value="INGRESAR" class="button_black shadow my-3 w-100">
                            </form>
                            <div class="text-center">
                                <p>¿No tienes un perfil?</p>
                                <p>Registrate <a href="register.php" class="link_hover">aquí</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <hr>
            <p class="text-center">
                <small>Copyright by: POWERHORSE 2024</small>
            </p>
        </footer>
    </body>
</html>