<!DOCTYPE html>
<html>
	<head>
	<title>ComercioIT | Tu E-Shop en PHP</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--fonts
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>-->
	<!--//fonts-->
	<script src="../js/jquery.min.js"></script>
	<!--script-->
	</head>
	<body> 
<div class="main"> 
<?php
error_reporting(0);
	if (isset( $_GET["mensaje"]) ) {
		echo MostrarMensaje($_GET["mensaje"]);
	}
?>
	<div class="reservation_top">
		<div class=" contact_right">
			<h3>Contacto</h3>
			<div class="contact-form">
				<form action="enviar.php" method="post">
					<input type="text" class="textbox" placeholder="Nombre" name="nombre" value="" >
					<input type="text" class="textbox" placeholder="E-Mail" name="email">
					<input type="text" class="textbox" placeholder="Teléfono" name="telefono">
					<input type="text" class="textbox" placeholder="Asunto" name="asunto">
					<textarea placeholder="Mensaje" name="mensaje"></textarea>
					<input type="submit" value="Enviar" name="enviar">
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>