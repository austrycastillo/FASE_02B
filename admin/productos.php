<?php
include("conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

	<div class="register">
		<div class="register-top-grid">
			<?php

if($_GET['action']=='add'){

	if(isset($_POST['enviar'])){
		
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];
		$stock=$_POST['stock'];
		$imagen=$_FILES['imagen']['name'];
		//$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//llamar a la función
		$msn=guardarProducto($nombre,$precio,$descripcion,$stock,$imagen);
		echo MostrarMensaje($msn);
		
	}
	else {
?>
			<h3>NUEVO PRODUCTO</h3>
<?php
	}
?>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre"> 
					<span>Precio: <label>*</label></span>
					<input type="text" name="precio"> 
					<span>Descripción: <label>*</label></span>
					<input type="text" name="descripcion">
					<span>Stock: <label>*</label></span>
					<input type="text" name="stock">
					<span>Imagen:</span>
					<input type="file" name="imagen">
					<div class="register-but">
						<input type="submit" value="Guardar producto" name="enviar">
					</div>
				</div>
			</form>
<?php
	}
	if($_GET['action']=='update'){
		if(isset($_POST['actualizar'])){
			$nombre=$_POST['nombre'];
			$precio=$_POST['precio'];
			$descripcion=$_POST['descripcion'];
			$stock=$_POST['stock'];
			$id=$_POST['id'];
			$msn=editarProducto($nombre,$precio,$descripcion,$stock,$id);
			echo MostrarMensaje($msn);
		}
		$sql="select *from productos WHERE id=".$_GET['id'];
		$conexion->prepare($sql);
		foreach($conexion->query($sql) as $row){
?>
			<h3>EDITAR PRODUCTO</h3>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre" value="<?php echo $row['Nombre']; ?>"> 
					<span>Precio: <label>*</label></span>
					<input type="text" name="precio" value="<?php echo $row['Precio']; ?>"> 
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					<span>Descripción: <label>*</label></span>
					<input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">
					<span>Stock: <label>*</label></span>
					<input type="text" name="stock" value="<?php echo $row['Stock']; ?>">
					
					<div class="register-but">
						<input type="submit" value="Actualizar producto" name="actualizar">
					</div>
				</div>
			</form>
	<?php
		}
	}
?>
		</div>
		<div class="clearfix"></div>
	</div>

</body>
</html>
