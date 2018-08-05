<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>


	<?php
		session_start();
		if(!isset($_SESSION["usuario"])){
	?>
	<h1>USTED ESTA SOLO DE VISITA</h1>
	<?php
		}
		else{
	?>
	<h1>esto es solo para los que aportan</h1>
	<a href="cierredesesion.php" name="cerrarsesion">cerrar</a>
	<?php 		
		}
	?>
	
	
<h1>hola</h1>	
</body>
</html>