<?php
    session_start();
    if (isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    <div class="container">
        <h1>Articulos y Productos</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmArticulos" enctype="multipart/form-data">
                    <label>Categoria</label>
                    <select class="form-control input-sm" name="categoriaSelect" id="categoriaSelect">
                        <option value="A">Selecciona Categoria</option>
                    </select>
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                    <label>Descripcion</label>
                    <input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
                    <label>Cantidad</label>
                    <input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
                    <label>Precio</label>
                    <input type="text" class="form-control input-sm" id="precio" name="precio">
                    <label>Imagen</label>
                    <input type="file" id="imagen" name="imagen">
                    <p></p>
                    <span id="btnAgregarArticulos" class="btn btn-primary">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaArticulosLoad"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){

        $('#tablaArticulosLoad').load('articulos/tablaArticulos.php');

        $('#btnAgregarArticulos').click(function(){

            vacios = validarFormVacio('frmArticulos');

            if (vacios > 0){
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos=$('#frmArticulos').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/articulos/agregaArticulos.php",
                success:function(r){
                    if (r == 1){
                        alertify.success("Articulo agregado con exito");
                    } else {
                        alertify.error("No se pudo agregar el articulo");
                    }
                }
            });
        });
    });
</script>

<?php
    } else {
        header("location: ../index.php");
    }
?>