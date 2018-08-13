<?php 	
	//try {
		
	
	session_start();
	include('conexion.php');
	$base = new PDO("mysql:host=$host; dbname=$db_nombre",$usuario,$password);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


	//con libreria mysqli
	/*$conexion=mysqli_connect("localhost","root","");
	if (mysqli_connect_errno()) {
		echo "fallo conexion con bd";
	}
	mysqli_select_db($conexion,"dbteacher") or die("no se encuetra la bd");
	mysqli_set_charset($conexion,"utf-8");*/
	//
	$idu = $_SESSION["idusuario"];
	$sigla = htmlentities(addslashes($_POST["sigla"]));
	$iddesc =htmlentities(addslashes($_POST["iddesc"]));
	//$archivo =file_get_contents($_FILES["archivo"]["tmp_name"]); esto es solo para archivos pequeño 

	// este codigo serivira para todo tipo de archivos----------------------------//
	$nombre_archivo=$_FILES["archivo"]["name"];
	$tipo_archivo=$_FILES["archivo"]["type"];
	$tamanio_archivo=$_FILES["archivo"]["size"];
	if ($tamanio_archivo<=20000000) {
		//ruta de la carpeta destino donde se almacenara los materiales
		$carpeta_destino="materiales/";
		// movemos la imagen del directorio temporal al directorio donde quiero que se almacene la imagen
		move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo);
	}
	else{
		echo "el tamaño del archivo es demasido grande";
	}

	$archivo_abrir=fopen($carpeta_destino . $nombre_archivo, "r");//r=read de solo lectura
	$archivo=fread($archivo_abrir,$tamanio_archivo);
	fclose($archivo_abrir);
	//$archivo=readfile($carpeta_destino . $nombre_archivo);
	//----------------------------------------------------------------------------//

	$extencion = htmlentities(addslashes($_FILES["archivo"]["type"]));
	$nomarchivo=htmlentities(addslashes($_FILES["archivo"]["name"]));
	$sql="INSERT INTO MATERIAL(idu,sigla,iddesc,archivo,extencion,nomarchivo) VALUES (:idu,:sigla,:iddesc,:archivo,:extencion,:nomarchivo)";
	//$resultado=mysqli_query($conexion,$sql);
	//mysqli_close($conexion);
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":idu",$idu);
	$resultado->bindValue(":sigla",$sigla);
	$resultado->bindValue(":iddesc",$iddesc);
	$resultado->bindValue(":archivo",$archivo);
	$resultado->bindValue(":extencion",$extencion);
	$resultado->bindValue(":nomarchivo",$nomarchivo);
	echo "hasta aqui";
	$resultado->execute();

	echo "material añadido al server de datos con exito";
	/*} catch (Exception $e) {
		echo "linea del error " . $e->getLine();
	}finally{
		$base=null;
	}*/
 ?>