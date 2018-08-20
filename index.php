<?php
    session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/stylepag.css">
</head>
<body>
	<?php
		if(!isset($_SESSION["idusuario"])){
	?>
			<h1>USTED ESTA SOLO DE VISITA</h1>
			<!--<a href="index.php" name="iniciosesion">iniciar sesion</a>-->
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
			<h3>añadir materia</h3>
			<form action="anadir_materia.php" method="post">
				<input type="text" name="sigla" placeholder="sigla......">
				<input type="text" name="iddoc" placeholder="id del docente...">
				<input type="text" name="nombremat" placeholder="nombre de la materia">
				<input type="submit" value="Registrar Materia">
			</form>
			<h3>añadir material</h3>
			<form action="anadir_descripcion.php" method="post">
				<input type="text" name="descri" placeholder="escriba una descripcion">
				<input type="submit" value="Registrar Descripcion">
			</form>

			<h3>añadir material</h3>
			<!--este enctype es para que se pueda trabajar el formulario con la base de datos-->
			<form action="anadir_material.php" enctype="multipart/form-data" method="post">
				<input type="text" name="sigla" placeholder="sigla de la materia">
				<input type="text" name="iddesc" placeholder="id de descripcion">
				<input type="file" name="archivo">
				<input type="text" name="extencion" placeholder="extencion del archivo">
				<input type="submit" value="Registrar Material">
			</form>
	<?php 		
		}
	?>
	<!--<div class="container" >
		<section class="main row">
			<div class="col-xs-6">
				<h4>SERVIDOR</h2>
			<?php
				//include('consulta_archivos_servidor.php'); 
			 ?>
			</div>
			<div class="col-xs-6">
				<h4>BASE DE DATOS</h4>
			<?php
				//include('consulta_archivos_bd.php'); 
			 ?>	
			</div>	
		</section>
		
	</div>-->


<div>
		<div class="container">
			<?php include('consulta_lista_docentes.php');  ?>
		</div>
		<div class="tab-content">
		  <div class="tab-pane active" id="home" role="tabpanel"></div>
		</div>
	</div>

<script type="text/javascript" src="prueba.js">
  
</script>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/objetos.js"></script>
</body>
</html>