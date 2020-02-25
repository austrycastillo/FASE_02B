<?php
	
		//1) Recibir los valores desde el formulario
		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$mensaje = $_POST["mensaje"];
		
		if( empty($nombre) || strlen( $nombre ) < 3 || is_numeric( $nombre )  ) {
			//echo "Nombre invalido";
			header("location: ./?page=contacto&mensaje=0AC001");
	  //} elseif ( $email == "" || strpos($email, "@") === false &&  strpos($email, ".") === false ) {
		} elseif ( $email == "" || filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
			//echo "Email invalido";
			header("location: ./?page=contacto&mensaje=0AC002&nombre=$nombre");
		} elseif ( empty( $mensaje ) || strlen( $mensaje ) > 400 ) {
			//echo "Mensaje invalido";
			header("location: ./?page=contacto&mensaje=0AC003");
		} else {
			$cuerpo = "<h1>CDatos de contacto</h1>";
			$cuerpo.= "<p><strong>Nombre:</strong> " . $nombre . "</p>";
			$cuerpo.= "<p><strong>E-Mail:</strong> " . $email . "</p>";
			$cuerpo.= "<p><strong>Mensaje:</strong>" . $mensaje . "</p>";
			

			//3) Construir la cabecera del email
			$cabecera = "From:" . $email . "\r\n";
			$cabecera.= "MIME-Version: 1.0\r\n";
			$cabecera.= "Content-Type: text/html; charset=UTF-8\r\n";

			$destinatario = "contacto@comercioit.com";

			$asunto = "Contacto desde ComercioIT";

			//4) Enviar el email
			if ( !mail($destinatario, $asunto, $cuerpo, $cabecera)) {
				//echo "E-Mail no enviado";
				header("location: ./?page=contacto&mensaje=0AC004");
			} else {
				//echo "E-Mail  enviado";
				header("location: ./?page=contacto&mensaje=0AC005");
			}
		}

	

?>