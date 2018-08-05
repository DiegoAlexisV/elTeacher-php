<?php 
	$base= new PDO("mysql:host=localhost; dbname=dbteacher","root","");
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	session_start();

	$sql = "INSERT INTO DESCRIPCION(descri) VALUES(:descri)";
	$resultado=$base->prepare($sql);
	$descri=htmlentities(addslashes($_POST["descri"]));
	$resultado->bindValue(":descri",$descri);
	$resultado->execute();

	echo "descripcion añadida a la base de datos con exito";
 ?>