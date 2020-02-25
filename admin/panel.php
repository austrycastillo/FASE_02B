<?php
//@session_start();
error_reporting(0);
if(isset($_POST['enviar'])){
	$email=$_POST['email'];
	$clave=$_POST['clave'];
	$msn=iniciarSesion($email,$clave);

	echo "<br><br>".MostrarMensaje($msn)." <strong>".strtoupper($_SESSION["Usuario"])."</strong>";

}
//validarSesion();
include("conexion.php");
if(isset( $_SESSION["Usuario"] )){

	?>

	<br><br>
	<?php
		
			//echo borrarProducto($_GET['id']);
	if(@$_GET['action']=='delete'){
			
			$msn=borrarProducto($_GET['id']);
			echo MostrarMensaje($msn);
	}
	?>
	<p>
		<a href="?page=productos&action=add"> Crear Nuevo producto</a>
	</p>
	<table cellpadding="10">
		<tr style="background-color:gray">
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Imagen</th>
			<th>Acciones</th>
		</tr>
		<?php
		$sql="select *from productos";
		$conexion->prepare($sql);
		foreach($conexion->query($sql) as $row){
		?>
		<tr style="background-color:pink">
			<td ><?php echo $row['Nombre']; ?></td>
			<td><?php echo $row['descripcion']; ?></td>
			<td><?php echo $row['Precio']; ?></td>
			<td><?php echo $row['Stock']; ?></td>
			<td><img src="../images/productos/<?php echo $row['imagen']; ?>" style="width: 50px"></td>
			<td>
				<a href="?page=productos&action=update&id=<?php echo $row['id']; ?>">
			Modificar</a> - 
			<a href="?action=delete&id=<?php echo $row['id']; ?>">
		Eliminar</a>
	
	</td>
		</tr>
		<?php
		}
		?>

	</table>
	<br>
	<a href="cerrar.php"> Cerrar sessión</a>
<?php
}else{
	$msn='0AC016';
	echo '<br><br>';
	echo MostrarMensaje($msn);
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
			
		</form>
	</div>	
	
	<div class="clearfix"></div>
</div>
<?php
}
?>
</body>
</html>