<?php 
	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$consulta="SELECT m.archivo,m.nomarchivo FROM MATERIAL m";
	$resultado = $base->prepare($consulta);

	$resultado->execute();

	while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$archivo=$registro["archivo"];
		$nomarchivo=$registro["nomarchivo"];
		$tipo="application/pdf";
		//echo "<a href='data:application/pdf; base64," . base64_encode($archivo) . "'>" . $nomarchivo . "</a>";
		
 ?>
  <object data="data:<?php echo $tipo ?>;base64,<?php echo base64_encode($archivo) ?>" type="<?php echo $tipo ?>" style="height:600px;width:60%"></object><br>
 <?php
	}
	$resultado->closeCursor();
 ?>