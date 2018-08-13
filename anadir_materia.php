<?php 
	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


	session_start();
	$sql="INSERT INTO MATERIA(sigla,idu,iddoc,nombremat) VALUES(:sigla,:idu,:iddoc,:nombremat)";
	$resultado=$base->prepare($sql);
	$sigla=htmlentities(addslashes($_POST["sigla"]));
	$idu=$_SESSION["idusuario"];
	$iddoc=htmlentities(addslashes($_POST["iddoc"]));
	$nombremat=htmlentities(addslashes($_POST["nombremat"]));
	$resultado->bindValue(":sigla",$sigla);
	$resultado->bindValue(":idu",$idu);
	$resultado->bindValue(":iddoc",$iddoc);
	$resultado->bindValue(":nombremat",$nombremat);
	$resultado->execute();

	echo "materia añadida a la base de datos con exito";
 ?>