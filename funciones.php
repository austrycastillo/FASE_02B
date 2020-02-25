<?php
	include ('admin/conexion.php'); 
	function CargarPagina($pagina){
		include($pagina . ".php");
	}
	function CargarPaginaAdmin($pagina){
		include("admin/".$pagina . ".php");
	}
	function MostrarMensaje($error){
		switch ($error) {
			case '0AC001':
				$mensaje="<strong style='color: orange'>El campo nombre no está completo</strong>";
				break;
			case '0AC002':
				$mensaje="<strong style='color: orange'>El campo correo no está completo</strong>";
				break;
			case '0AC003':
				$mensaje="<strong style='color: orange'>El campo mensaje no está completo</strong>";
				break;
			case '0AC004':
				$mensaje="<strong style='color: orange'>El correo no puede ser enviado, intente más tarde o contacte con soporte</strong>";
				break;
			case '0AC005':
				$mensaje="<strong style='color: orange'>Correo enviado correctamente</strong>";
				break;
			case '0AC006':
				$mensaje="<strong style='color: orange'>Producto guardado correctamente</strong>";
				break;
			case '0AC007':
				$mensaje="<strong style='color: orange'>Error no se puede guardar el producto</strong>";
				break;
			case '0AC008':
				$mensaje="<strong style='color: orange'>Producto eliminado correctamente</strong>";
				break;
			case '0AC009':
				$mensaje="<strong style='color: orange'>Error no se puede eliminar el producto</strong>";
				break;
			case '0AC010':
				$mensaje="<strong style='color: orange'>Producto actualizado correctamente</strong>";
				break;
			case '0AC011':
				$mensaje="<strong style='color: orange'>Error no se puede actualizar el producto</strong>";
				break;
			case '0AC012':
				$mensaje="<strong style='color: orange'>Gracias por registrarte</strong>";
				break;
			case '0AC013':
				$mensaje="<strong style='color: orange'>Error no se puede registrar</strong>";
				break;
			case '0AC014':
				$mensaje="<strong style='color: orange'>Bienvenid@ al sistema</strong>";
				break;
			case '0AC015':
				$mensaje="<strong style='color: orange'>Error en los datos al intentar ingresar</strong>";
				break;
			case '0AC016':
				$mensaje="<strong style='color: orange'>Error usted no está autorizado para ver está web, primero debe loguearse</strong>";
				break;
			
		}
		return $mensaje;
		
	}


function borrarProducto($id){
	global $conexion;
	$sql="DELETE FROM productos WHERE id=?";
	$result=$conexion->prepare($sql);
	$result->bindParam(1,$id,PDO::PARAM_INT);
	//ejecuto
		if($result->execute()){
			return "0AC008";
			
		}
		else{
			
			return "0AC009";
		}
}

function guardarProducto($nombre,$precio,$descripcion,$stock,$imagen){
	global $conexion;
	//guardo la imagen
		move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/productos/".$_FILES['imagen']['name']);

		//creo la consulta
		$sql="INSERT INTO productos(Nombre,Precio,descripcion,Stock,imagen)  VALUES (?,?,?,?,?)";
		//preparo todo
		$result=$conexion->prepare($sql);
		//paso las variables
		$result->bindParam(1,$nombre,PDO::PARAM_STR);
		$result->bindParam(2,$precio,PDO::PARAM_STR);
		$result->bindParam(3,$descripcion,PDO::PARAM_STR);
		$result->bindParam(4,$stock,PDO::PARAM_STR);
		$result->bindParam(5,$imagen,PDO::PARAM_STR);
		//ejecuto
		if($result->execute()){
			return "0AC006";
			
		}
		else{
			
			return "0AC007";
		}
}


function editarProducto($nombre,$precio,$descripcion,$stock,$id){
	global $conexion;
	//crear sql
			$sql="UPDATE productos SET Nombre=?,Precio=?,descripcion=?,Stock=? WHERE id=?";
			//preparo todo
		$result=$conexion->prepare($sql);
		//paso las variables
		$result->bindParam(1,$nombre,PDO::PARAM_STR);
		$result->bindParam(2,$precio,PDO::PARAM_STR);
		$result->bindParam(3,$descripcion,PDO::PARAM_STR);
		$result->bindParam(4,$stock,PDO::PARAM_STR);
		$result->bindParam(5,$id,PDO::PARAM_STR);
		//ejecuto
		if($result->execute()){
			return "0AC010";
			
		}
		else{
			
			return "0AC011";
		}
}


function agregarUsuario($nombre,$apellido,$email,$hash){
	global $conexion;
	//creo la consulta
		$sql="INSERT INTO usuarios(Nombre,Apellido,Email,Pass)  VALUES (?,?,?,?)";
		//preparo todo
		$result=$conexion->prepare($sql);
		//paso las variables
		$result->bindParam(1,$nombre,PDO::PARAM_STR);
		$result->bindParam(2,$apellido,PDO::PARAM_STR);
		$result->bindParam(3,$email,PDO::PARAM_STR);
		$result->bindParam(4,$hash,PDO::PARAM_STR);
		
		//ejecuto
		if($result->execute()){
			return "0AC012";
			
		}
		else{
			
			return "0AC013";
		}
}


function iniciarSesion($email, $pass){
		global $conexion;
		
		$usuario = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
		$usuario->bindParam(1, $email, PDO::PARAM_STR);

		if ( $usuario->execute() && $usuario->rowCount() > 0 ) {

			$usuario = $usuario->fetch();

			if (password_verify($pass, $usuario["Pass"])) {
				session_start();
				$_SESSION["Usuario"] =$usuario["Nombre"];
				return "0AC014";
			}
			else{
				return "0AC015";
			}
			
		}
		
		
	}



function validarSesion($estado = false){
		if( isset( $_SESSION["Usuario"] ) == $estado ) {
			header("location: ../admin/index.php");
		}
	}


function cerrarSesion(){
		session_start();
		setcookie(session_name(), '', time() - 42000, '/'); 
		unset( $_SESSION );
		session_destroy();
		header("location: ../index.php");
	}
?>