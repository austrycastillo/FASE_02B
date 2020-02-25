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
					<input type="text" class="textbox" placeholder="Nombre" name="nombre" value="<?php echo $_GET['nombre']; ?>" >
					<input type="text" class="textbox" placeholder="E-Mail" name="email">
					<textarea placeholder="Mensaje" name="mensaje"></textarea>
					<input type="submit" value="Enviar" name="enviar">
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>