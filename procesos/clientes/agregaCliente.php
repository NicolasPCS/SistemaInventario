<?php
    session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/clientes.php";

    $obj = new clientes();


    $datos = array(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['direccion'],
        $_POST['email'],
        $_POST['telefono'],
        $_POST['rfc']
    );

    echo $obj->agregaCliente($datos);

?>