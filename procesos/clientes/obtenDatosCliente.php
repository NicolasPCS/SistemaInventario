<?php
    require_once "../../clases/conexion.php";
    require_once "../../clases/clientes.php";

    $obj = new clientes();

    echo json_encode($obj->obtenDatosCliente($_POST['idcliente']));
?>