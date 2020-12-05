<?php
    // session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/categorias.php";
    
    $_POST['idcategoria'];
    $_POST['categoriaU'];

    $datos = array(
        $_POST['idcategoria'],
        $_POST['categoriaU']
    );

    $obj = new categorias();

    echo $obj->actualizaCategoria($datos);
?>