<?php 
//echo "hola"; 

	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




	session_start();
	$sql="INSERT INTO DOCENTE(idu,grado,nombre,apellido) VALUES (:idu,:grado,:nombre, :apellido)";
	$resultado = $base->prepare($sql);
	$idu=$_SESSION["idusuario"];
	$grado = htmlentities(addslashes($_POST["grado"]));
	$nombre=htmlentities(addslashes($_POST["nombre"]));
	$apellido=htmlentities(addslashes($_POST["apellido"]));
	$resultado->bindValue(":idu",$idu);
	$resultado->bindValue(":grado",$grado);
	$resultado->bindValue(":nombre",$nombre);
	$resultado->bindValue(":apellido",$apellido);
	$resultado->execute();

	echo "añadido a la base de datos con exito";
?>