<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/stylepag.css">
</head>
<body>
	
</body>
</html>

<?php 
	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$consulta = 
	"SELECT *
	FROM materia m,docente d,usuario s,material r,descripcion de
	WHERE r.iddoc=d.iddoc
	AND r.idu=s.idu
	AND r.iddesc=de.iddesc
	AND r.sigla=m.sigla";
	$resultado=$base->prepare($consulta);
	//$group="GROUP BY m.sigla"
	//$resultado->bindValue(':seleccion',$select1);
	$resultado->execute();

	

	/*while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$sigla=$registro['sigla'];
		$iddoc=$registro['iddoc'];
		$idu=$registro['idu'];
		$nombremat=$registro['nombremat'];
		?>
		<a class="list-group-item list-group-item-action " data-toggle="list" href="#home" role="tab"><?php echo $sigla . "-" . $nombremat; ?></a>
		<?php
	}*/

	while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$sigla=$registro['sigla'];
		$nombremat=$registro['nombremat'];
		$grado=$registro['grado'];
		$nomdoc=$registro['nombre'];
		$apedoc=$registro['apellido'];
		$nomarchivo=$registro['nomarchivo'];
		$nombparamostrar=$registro['nommostrar'];
		$descri=$registro['descri'];
		$ubicacion='materiales/' . $nomarchivo;
		$extencion = $registro['extencion'];
		?>
		<a class="list-group-item list-group-item-action " href=<?php echo "'$ubicacion'" ?>>
			<h4><?php echo $sigla . " - " . $nombremat . " - " . $grado . " - " . $apedoc . " " . $nomdoc ." - "?>
			<br><br>
		 	<p style="color:blue;"><?php echo "nombre del archivo: " . $nombparamostrar ?></p>
			<?php echo "tipo de archivo: - " . $extencion . " - <br><br>Descripcion<br><p>" . $descri . "</p>"?>
			</h4>
		</a>
		<?php
	}
	$resultado->closeCursor();
?>