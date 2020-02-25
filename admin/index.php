<?php
session_start();
require_once("../funciones.php");
//validarSesion();

	if ( isset( $_GET["page"] ) ) {
		$page = $_GET["page"];
	} else {
		$page = "panel";
	}
	
	include("header.php");
?>
<section id="page">
	<?php CargarPaginaAdmin( $page ); ?>
</section>

