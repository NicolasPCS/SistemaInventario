<?php
    require_once "../../clases/conexion.php";
    require_once "../../clases/categorias.php";
    $id = $_POST['idcategoria'];
    $obj = new categorias();
    echo $obj->eliminaCategoria($id);
?>