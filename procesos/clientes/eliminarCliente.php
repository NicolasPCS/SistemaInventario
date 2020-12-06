<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/clientes.php";

	$obj= new clientes();

	echo $obj->eliminaCliente($_POST['idcliente']);
 ?>