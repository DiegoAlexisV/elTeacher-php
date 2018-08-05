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
		if(!isset($_SESSION["idusuario"])){
	?>
			<h1>USTED ESTA SOLO DE VISITA</h1>
			<a href="index.php" name="iniciosesion">iniciar sesion</a>
	<?php
		}
		else{
			echo "hola nro" . $_SESSION["idusuario"];
	?>
			<h1>esto es solo para los usuarios que aportan</h1>
			<a href="cierredesesion.php" name="cerrarsesion">cerrar</a>
			<h3>añadir docente</h3>
			<form action="anadir_docente.php" method="post">
				<input type="text" name="grado" placeholder="Grado......">
				<input type="text" name="nombre" placeholder="Nombre......">
				<input type="text" name="apellido" placeholder="Apellido......">
				<input type="submit" name="enviadocente" value="Registrar Docente">
			</form>
	<?php 		
		}
	?>
<h1>hola</h1>	
</body>
</html>