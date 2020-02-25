<?php
	$host="localhost";
	$db="ecommercepractica";
	$user="root";
	$pass="";

	try{
	$conexion=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
		
	}
	catch(PDOException $e){
		echo "<h1>Error no puedo conectarme con la base de datos</h1>".$e->getMessage();
	}

?>
