<?php
require_once "../config/dbConnect.php";

session_start();
// Verificar si la sesión está iniciada
if (isset($_SESSION['usuario'])) {
    header("Location:../index.php");
    exit();
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];

    //verifica que no esten vacios los campos
    if(!empty($_POST['correo']) && !empty($_POST['pass'])){

        //verifica que el correo sea valido
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL) || 
        strlen($correo) > 255 || preg_match("/[,;'´` \"\\s]/", $correo)){
            $error_message = "Correo electrónico tiene caracteres invalidos";
        
        //verifica que la contraseña sea valida
        }elseif(strlen($pass)< 6 || strlen($pass)>20 ||!is_string($pass)
         || !preg_match("/^[a-zA-Z0-9_]+$/", $pass)){
            $error_message = "La contaseña tiene caracteres invalidos o sobrepasa el limite de caracteres (20)";

        }else{
            // Realizar la consulta SQL para obtener el hash de la contraseña del usuario
            $query = "SELECT contraseña FROM tabla_usuarios WHERE correo = :correo";
            $statement = $connect->prepare($query);
            $statement->execute(array(":correo" => $correo));
            $result = $statement->fetch();

            if ($result){
                // Verificar la contraseña proporcionada con el hash almacenado en la base de datos
                if (password_verify($pass, $result['contraseña'])) {
                    // Las credenciales son válidas, iniciar sesión
                    session_start();
                    $_SESSION['usuario'] = $correo; // Puedes guardar más datos del usuario si lo deseas
                    header("location: ../index.php");
                    exit;
                } else {
                    // Las credenciales son inválidas, mostrar un mensaje de error
                    $error_message = "Correo electrónico o contraseña incorrectos";
                }
            } else {
                // El usuario no existe
                $error_message = "Correo electrónico o contraseña incorrectos";
            }
        }
    }else{
        //campos vacios
        $error_message = "Debe llenar los campos antes de enviarlo";
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
        <title>Inicia Sesión</title>
    </head>
    <body class="bg-light">
        <header class="bg-color_Yellow">
            <nav>
                <a href="../index.php"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
            </nav>
        </header>
        <main>
            <section class="container bg-white border shadow p-4 bg-body-tertiary rounded my-4 px-5 w-50">
                <div class="row">
                    <div class="item_div">
                        <div class="col-6 d-lg-block d-md-block d-none">
                            <h1>INICIA SESIÓN</h1>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-5 ms-3">
                            <form action="#" method="POST">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" name="correo" class="form-control mb-3 shadow bg-body-tertiary"
                                requiered maxlength="255">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" name="pass" class="form-control mb-3 shadow bg-body-tertiary"
                                required minlength="6" maxlength="20">
                                <?php
                                    if (isset($error_message)) {
                                        // Mostrar mensaje de error si las credenciales son inválidas
                                        echo '<div class="card bg-light text-danger border border-danger mb-3 shadow">
                                                <div class="card-body">
                                                    ' . $error_message . '
                                                </div>
                                            </div>';
                                    }
                                ?>
                                <input type="submit" value="INGRESAR" class="button_yellow shadow my-3 w-100">
                            </form>
                            <div class="text-center">
                                <p>¿No tienes un perfil?</p>
                                <p>Regístrate <a href="register.php" class="link_hover">aquí</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <small class="text-center">Nota: Recuerde iniciar sesión antes de entrar al carrito</small>
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
