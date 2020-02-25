<?php
				$nombre="Hola invitado";
				if(isset($_POST['nombre'])){
					$nombre=$_POST['nombre'];
					setcookie("nombre",$nombre,time()+3600);
					
				}
				elseif(isset($_COOKIE['nombre'])){
					$nombre=$_COOKIE['nombre'];
				}
			
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>
		<?php
			echo $nombre; 
		?>
	</h1>

	<form action="" method="post">
		<input type="text" name="nombre"><br>
		<input type="submit" name="enviar" value="MUESTRA MI NOMBRE">
	</form>
	
</body>
</html>