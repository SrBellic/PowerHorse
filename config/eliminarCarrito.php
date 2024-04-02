<?php
	
	//Se inicia la sesion
	if (!isset($_SESSION)) 
	{
        
        session_start();

		//Se captura el INDICE del arreglo que se va a eliminar
		$idProducto = $_GET["id-producto"];

		echo $idProducto;

		//Se elimina el producto del carrito
		unset($_SESSION['carrito'][$idProducto]);
		
		//Se regresa a la pagina del carrito
		header("Location: ../pages/kart.php");

	}	



?>