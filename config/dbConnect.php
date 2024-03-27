<?php

	
	//Se conecta la pagina con la base de datos
	// Informacion  de la Base de dato
	define('DB_HOST','localhost');  //  servidor local 
	define('DB_USER','root');       //   usuario 
	define('DB_PASS','');            //  Contraseña 
	define('DB_NAME','powerhorse');  // Nombre de la Base de datos

	// Ahora, establecemos la conexión con la   base de dato y las  tablas
	try
	{

	// Ejecutamos las variables y aplicamos UTF8
	$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));    //  para el usu de caracteres

	

	}
	catch (PDOException $e)  // Mensajes de error traducidos. Desde PHP para indicarle a MySQL el idioma de los mensajes de error 
	{
	exit("Error: " . $e->getMessage());  
	}


?>