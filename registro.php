	<br><br>
	<?php
include("admin/conexion.php");


	if(isset($_POST['enviar'])){

		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$email=$_POST['email'];
		$clave=$_POST['clave'];
		$hash = password_hash($clave, PASSWORD_DEFAULT);
		$msn=agregarUsuario($nombre,$apellido,$email,$hash);
		echo MostrarMensaje($msn);
	}
	?>
	<div class="register">
		<div class="register-top-grid">
			<h3>NUEVO USUARIO</h3>
			<form action="#" method="post">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre"> 
					<span>Apellido: <label>*</label></span>
					<input type="text" name="apellido"> 
					<span>E-Mail: <label>*</label></span>
					<input type="text" name="email">
					<span>Contraseña: <label>*</label></span>
					<input type="password" name="clave">
					<div class="register-but">
						<input type="submit" value="Registrarme" name="enviar">
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>