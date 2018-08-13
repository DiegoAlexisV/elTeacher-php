<?php 
	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$consulta="SELECT m.nomarchivo FROM material m ";

	$resultado=$base->prepare($consulta);

	$resultado->execute();
	
	while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$ubicacion='materiales/' . $registro['nomarchivo'];
		echo "<a href='$ubicacion' >" . $registro['nomarchivo'] . "</a><br>";
	}
	$resultado->closeCursor();  
 ?>