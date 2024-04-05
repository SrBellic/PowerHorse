<?php

	// Se conecta la pagina a la base de datos
	require_once 'dbConnect.php';
	
	// Iniciar sesión si no está iniciada
	if (!isset($_SESSION)) 
	    session_start();

	// Se genera la consulta
	$sql = ' ';
	
    //Se crea un bucle para la recorrer el carrito, y crear la consulta
    foreach ($_SESSION["carrito"] as $producto) {
        
        $sql .= 'UPDATE
                    `tabla_producto`
                SET
                    `stock_producto` = `stock_producto` - '.$producto["cantidad"].'
                WHERE
                    `id_producto` = '.$producto["id"].'; ';

    }

	
	// Se envia la consulta
    $connect->query($sql);

	// Se borra la informacion del carrito
	unset($_SESSION["carrito"]);

	// Se regresa a la pagina carrito
	header('Location: ../pages/kart.php?compraRealizada=true');

?>