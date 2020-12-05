<?php
    class categorias{
        public function agregaCategoria($datos){
            $c = new conectar();
            $conexion = $c->conexion();

            $sql = "insert into categorias (
                id_usuario,
                nombreCategoria,
                fechaCaptura ) values (
                '$datos[0]',
                '$datos[1]',
                '$datos[2]')";
            return mysqli_query($conexion,$sql);
        }
    }
?>