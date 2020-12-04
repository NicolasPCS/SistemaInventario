<?php
    require_once "clases/conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql = "select * from usuarios where email='admin'";
    $result = mysqli_query($conexion,$sql);
    $validar = 0;
    if (mysqli_num_rows($result) > 0){
        $validar = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body style="background-color: gray">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">Sistemas de ventas y almacen</div>
                        <div class="panel panel-body">
                            <p>
                                <img src="img/logo.png" height="167px" alt="logo">
                            </p>
                            <form id="frmLogin">
                                <label>Usuario</label>
                                <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                                <label>Contraseña</label>
                                <input type="password" class="form-control input-sm" name="password" id="password">
                                <p></p>
                                <span class="btn btn-primary btn-sm" id="entrarSistema">Ingresar</span>
                                <?php if(!$validar): ?>
                                <a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div> 
                </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#entrarSistema').click(function(){

            vacios = validarFormVacio('frmLogin');

            if (vacios > 0){
                alert("Debes llenar todos los campos!!");
                return false;
            }

        datos=$('#frmLogin').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/regLogin/login.php",
                success:function(r){
                    if (r == 1){
                        window.location = "vistas/inicio.php";
                    } else {
                        alert("No se puede acceder");
                    }
                }
            });
        });
    });
</script>