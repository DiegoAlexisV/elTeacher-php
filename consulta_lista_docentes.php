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
	$select1="*";
	$select1="m.sigla,d.nombre,s.nick,r.nommostrar,de.descri";
	$resultado->bindValue(':seleccion',$select1);
	$resultado->execute();

	while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$sigla=$registro['sigla'];
		$iddoc=$registro['iddoc'];
		$idu=$registro['idu'];
		$nombremat=$registro['nombremat'];
		?>
		<a class="list-group-item list-group-item-action " data-toggle="list" href="#home" role="tab"><?php echo $sigla . "-" . $nombremat; ?></a>
		<?php
	}
	$resultado->closeCursor();
?>