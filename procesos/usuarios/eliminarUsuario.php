<?php
    require_once "../../clases/conexion.php";
	require_once "../../clases/Usuario.php";

    $obj= new usuarios;

    echo $obj->eliminaUsuario($_POST['idusuario']);
?>