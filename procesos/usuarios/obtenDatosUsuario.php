<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Usuario.php";

	$obj= new usuarios;

	echo json_encode($obj->obtenDatosUsuario($_POST['idusuario']));

 ?>