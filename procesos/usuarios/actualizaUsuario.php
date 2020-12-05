<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Usuario.php";

	$obj= new usuarios;

	$datos=array(
			$_POST['idUsuario'],  
		    $_POST['nombreU'] , 
		    $_POST['apellidoU'],  
		    $_POST['usuarioU']
				);  
	echo $obj->actualizaUsuario($datos);


 ?>