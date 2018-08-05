<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<h1>hola</h1>
<body>
	<?php
	try {
		//$checkvisit=$_POST["checkvisita"];
		$base = new PDO("mysql:host=localhost; dbname=dbteacher", "root", "");
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql ="SELECT * FROM CUENTA WHERE nombrec= :cuenta AND password= :contrasenia";
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
			header("location:vista.php");
		}else{
			if($numero_registro!=0){
				//echo  $checkvisit ;
				session_start();
				$_SESSION["usuario"]=$_POST["cuenta"];
				header("location:vista.php");
			}else{
				header("location:index.php");
			}
		}
	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}
	?>
</body>
</html>