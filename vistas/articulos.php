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
    <?php require_once "../clases/conexion.php"; 
          $c = new conectar();
          $conexion = $c->conexion();
          $sql = "select id_categoria, nombreCategoria from categorias";
          $result = mysqli_query($conexion,$sql);  
    ?>
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
                        <?php while($ver = mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0]; ?>">
                            <?php echo $ver[1]; ?>
                        </option>
                        <?php endwhile; ?>
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

    <!-- Modal -->
    <div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar articulo</h4>
        </div>
        <div class="modal-body">
            <form id="frmArticulosU" enctype="multipart/form-data">
                <input type="text" hidden="" id="idArticulo" name="idArticulo">
                <label>Categoria</label>
                <select class="form-control input-sm" name="categoriaSelectU" id="categoriaSelectU">
                    <option value="A">Selecciona Categoria</option>
                    <?php
                        $sql = "select id_categoria, nombreCategoria from categorias";
                        $result = mysqli_query($conexion,$sql);  
                    ?>
                    <?php while($ver = mysqli_fetch_row($result)): ?>
                    <option value="<?php echo $ver[0]; ?>">
                        <?php echo $ver[1]; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                <label>Nombre</label>
                <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                <label>Descripcion</label>
                <input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
                <label>Cantidad</label>
                <input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
                <label>Precio</label>
                <input type="text" class="form-control input-sm" id="precioU" name="precioU">
                <p></p>
            </form>
        </div>
        <div class="modal-footer">
            <button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>

<script type="text/javascript">
    function agregaDatosArticulo(idarticulo){
        $.ajax({
			type:"POST",
			data:"idart="+idarticulo,
			url:"../procesos/articulos/obtenDatosArticulo.php",
			success:function(r){
                dato = jQuery.parseJSON(r);
                $('#idArticulo').val(dato['id_producto']);
                $('#categoriaSelectU').val(dato['id_categoria']);
                $('#nombreU').val(dato['nombre']);
                $('#descripcionU').val(dato['descripcion']);
                $('#cantidadU').val(dato['cantidad']);
                $('#precioU').val(dato['precio']);
			}
		});
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnActualizaarticulo').click(function(){

            datos=$('#frmArticulosU').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/articulos/actualizaArticulos.php",
                success:function(r){
                    if (r == 1){
                        $('#tablaArticulosLoad').load('articulos/tablaArticulos.php');
                        alertify.success("Actualizado con exito");
                    } else {
                        alertify.error("Error al actualizar");
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#tablaArticulosLoad').load('articulos/tablaArticulos.php');

        $('#btnAgregarArticulos').click(function(){

            vacios = validarFormVacio('frmArticulos');

            if (vacios > 0){
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            var formData = new FormData(document.getElementById("frmArticulos"));
            $.ajax({
                url: "../procesos/articulos/insertaArticulos.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(r){
                    if(r == 1){
                        $('#frmArticulos')[0].reset();
                        $('#tablaArticulosLoad').load('articulos/tablaArticulos.php');
                        alertify.success("Agregado con exito");
                    }else{
                        alertify.error("Fallo al subir el archivo");
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