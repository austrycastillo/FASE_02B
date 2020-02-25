<br><br>
<?php
//Recuperar la sesión
session_start();
error_reporting(0);
if(isset($_POST['enviar'])){
	$email=$_POST['email'];
	$clave=$_POST['clave'];
	$msn=iniciarSesion($email,$clave);
	echo MostrarMensaje($msn)." <strong>".strtoupper($_SESSION["Usuario"])."</strong>";

}
?>
<div class="account_grid">
	<div class="login-right">
		<h3>INGRESO DE USUARIO</h3>
		<form action="#" method="post">
		<div>
			<span>E-Mail:</span>
			<input type="text" name="email"> 
		</div>
		<div>
			<span>Contraseña:</span>
			<input type="password" name="clave"> 
		</div>
			<input type="submit" value="Ingresar" name="enviar">
			<br>
			<a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
		</form>
	</div>	
	<div class=" login-left">
		<h3>¿NUEVO USUARIO?</h3>
		<a class="acount-btn" href="?page=registro">Crear una cuenta</a>
	</div>
	<div class="clearfix"></div>
</div>