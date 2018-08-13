<?php
    session_start();
?>
	<?php
	try {
	    
		//$checkvisit=$_POST["checkvisita"];
		include('conexion.php');
		$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql ="SELECT c.idcuenta,u.idu,c.nombrec FROM cuenta c, usuario u WHERE c.nombrec= :cuenta AND c.passwor=:contrasenia AND c.idu=u.idu";
		$resultado = $base->prepare($sql);
		$cuenta = htmlentities(addslashes($_POST["cuenta"]));
		$contrasenia = htmlentities(addslashes($_POST["contrasenia"]));
		$resultado->bindValue(":cuenta",$cuenta);
		$resultado->bindValue(":contrasenia",$contrasenia);
		$resultado->execute();
		$numero_registro=$resultado->rowCount();
		//echo $checkvisit;
		if(isset($_POST["checkvisita"]))// pregunta si es que el checkbox esta encendido 
		{
			//echo "estas como visitante we";
			
			session_destroy();
			?>
			<script type="text/javascript">window.location="vista.php"</script>
			<?php
		}else{
			if($numero_registro!=0){
				//echo  $checkvisit ;
				$registro=$resultado->fetch(PDO::FETCH_ASSOC);
				//echo $registro["nombrec"];
				$_SESSION["idusuario"]=$registro["idu"];
				$resultado->closeCursor();
				?>
			    <script type="text/javascript">window.location="vista.php"</script>
			    <?php
			}else{
				?>
			    <script type="text/javascript">window.location="index.php"</script>
			    <?php
			}
		}
	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}
	?>
	

