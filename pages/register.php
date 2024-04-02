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
<?php
require_once "../config/dbConnect.php"; // Verifica si la ruta es correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $id = $_POST["id"];
    $direccion = $_POST["direccion"];
    $user = $_POST["user"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];

    $error="";
    //Verifica que todos los campos esten llenos
    if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['pass']) && !empty($_POST['direccion'])
    && !empty($_POST['email']) && !empty($_POST['apellido']) && !empty($_POST['pass2']) && !empty($_POST['user'])){

        //Valida que el nombre y apellido no contenga numeros o caracteres especiales    
        if(strlen($nombre)>20 ||!is_string($nombre) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)){  
            $error = 'El nombre puede contener más de 20 caracteres, caracteres especiales o números';}

        if(strlen($apellido)>20 ||!is_string($apellido) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellido)){  
            $error = 'El apellido puede contener más de 20 caracteres, caracteres especiales o números';}
        
        //Valida la cedula
        if ($id < 0 || strlen((string)$id) > 8 || !ctype_digit($id)) {
            $error = "La cédula es incorrecta";}

        //Valida la direccion
        if (strlen($direccion) > 250 || !is_string($direccion) || !preg_match("/^[a-zA-Z0-9\s,]+$/", $direccion)) {
            $error = 'La dirección pasa el límite de caracteres (250) o contiene caracteres no permitidos';}

        //Valida el nombre del usuario
        if (strlen($user) > 30 || !is_string($user) || 
            strpos($user, ' ') !== false || !preg_match("/^[a-zA-Z0-9_]+$/", $user)){  
            $error = 'El nombre de usuario pasa el límite de caracteres (30), contiene espacios en blanco o caracteres no permitidos';}      

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || 
            strlen($email) > 255 || preg_match("/[,;\"\\s]/", $email)) {
            $error = 'El correo electronico es invalido';}

        //Valida la cantidad de caracteres de la contraseña
        if(strlen($pass)>30 ||!is_string($pass) || $pass != $pass2){  
            $error = 'La contraseña pasa el limite de caracteres (30) o no coincide con la comprobacion';}

        if(strlen($pass2)>30 ||!is_string($pass2) || $pass != $pass2){  
            $error = 'La contraseña pasa el limite de caracteres (30) o no coincide con la comprobacion';}
        
        if($error === ""){
            // Verificar si el usuario ya existe
            $query = "SELECT * FROM tabla_usuarios WHERE usuario = :user";
            $statement = $connect->prepare($query);
            $statement->execute(array(":user" => $user));
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $error = "El nombre de usuario ya existe";
            }

            // Verificar si la cédula ya existe
            $query = "SELECT * FROM tabla_usuarios WHERE cedula = :id";
            $statement = $connect->prepare($query);
            $statement->execute(array(":id" => $id));
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $error = "La cédula ya existe";
            }

            // Verificar si el correo electrónico ya existe
            $query = "SELECT * FROM tabla_usuarios WHERE correo = :email";
            $statement = $connect->prepare($query);
            $statement->execute(array(":email" => $email));
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $error = "El correo electrónico ya existe";
            }
            // Si no hay errores, proceder con la inserción del nuevo usuario
            if ($error === "") {
            
                try {
                    // Verificar si la dirección ya existe en la tabla tabla_direccion
                    $query = "SELECT id_direccion FROM tabla_direccion WHERE direccion = :direccion";
                    $statement = $connect->prepare($query);
                    $statement->execute(array(":direccion" => $direccion));
                    $row = $statement->fetch(PDO::FETCH_ASSOC);

                    // Si la dirección no existe, insertarla primero en la tabla tabla_direccion
                    if (!$row) {
                        $query = "INSERT INTO tabla_direccion (direccion) VALUES (:direccion)";
                        $statement = $connect->prepare($query);
                        $statement->execute(array(":direccion" => $direccion));

                        // Obtener el ID de la dirección recién insertada
                        $id_direccion = $connect->lastInsertId();
                    } else {
                        // Si la dirección ya existe, obtener su ID
                        $id_direccion = $row['id_direccion'];
                    }
                    
                    //Encriptacion de la contraseña con Bcrypt
                    $passEncript = password_hash($pass,PASSWORD_BCRYPT);

                    // Insertar el nuevo usuario en la tabla tabla_usuarios con tipo de usuario 'user' (ID 1)
                    $query = "INSERT INTO tabla_usuarios (nombre, apellido, cedula, id_direccion, id_tipo_usuario, usuario, correo, contraseña) VALUES (:nombre, :apellido, :id, :id_direccion, 1, :user, :email, :pass)";
                    $statement = $connect->prepare($query);
                    $result = $statement->execute(array(":nombre" => $nombre, ":apellido" => $apellido, ":id" => $id, ":id_direccion" => $id_direccion, ":user" => $user, ":email" => $email, ":pass" => $passEncript));

                    if ($result) {
                        // Registro exitoso, redirigir a la página de inicio de sesión
                        header("location: login.php");
                        exit;
                    } else {
                        // Error al registrar, mostrar mensaje de error
                        echo "Error al registrar el usuario";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage(); // Imprime el mensaje de error de PDO
                }
            }
        }
    }else{
        $error="No se han llenado todos los datos correctamente";}      
}
?>

<body class="bg-light">
    <header class="bg-color_Yellow">
        <nav class="item_div">
            <a href="../index.php"><img src="../img/logo.jpg" class="ms-3" width="190px"></a>
            <a href="login.php" class="button_black mx-5 shadow">INICIA SESIÓN</a>
        </nav>
    </header>
    <main>
        <?php
            if(isset($error)==True){
                echo $error;
            }
        ?>
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
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" class="form-control shadow">
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
