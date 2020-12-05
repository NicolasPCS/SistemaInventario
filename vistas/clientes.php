<?php
    session_start();
    if (isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container">
		<h1>Clientes</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmClientes">
					<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="nombre">
					<label>Apellido</label>
					<input type="text" class="form-control input-sm" id="apellidos" name="apellidos">
					<label>Direccion</label>
					<input type="text" class="form-control input-sm" id="direccion" name="direccion">
					<label>Email</label>
					<input type="text" class="form-control input-sm" id="email" name="email">
					<label>Telefono</label>
					<input type="text" class="form-control input-sm" id="telefono" name="telefono">
					<label>RFC</label>
					<input type="text" class="form-control input-sm" id="rfc" name="rfc">
					<p></p>
					<span class="btn btn-primary" id="btnAgregarCliente">Agregar</span>
				</form>
			</div>
			<div class="col-sm-8">
				<div id="tablaClientesLoad"></div>
			</div>
		</div>
	</div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function(){

        $('#tablaClientesLoad').load('clientes/tablaClientes.php');

        $('#btnAgregarCliente').click(function(){

            vacios = validarFormVacio('frmClientes');

            if (vacios > 0){
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos=$('#frmClientes').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/clientes/agregaCliente.php",
                success:function(r){
                    if (r == 1){
                        $('#frmClientes')[0].reset();
						$('#tablaClientesLoad').load('clientes/tablaClientes.php');
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