<h4>Vender un producto</h4>
<div class="row">
    <siv class="col-sm-4">
        <form id="frmVentas">
            <label>Selecciona cliente</label>
            <select class="form-control input-sm" name="clienteVenta" id="clienteVenta">
                <option value="A">Selecciona</option>
            </select>
            <label>Producto</label>
            <select class="form-control input-sm" name="productoVenta" id="productoVenta">
                <option value="A">Selecciona</option>
            </select>
            <label>Descripcioón</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control input-sm"></textarea>
            <label>Cantidad</label>
            <input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
            <label>Precio</label>
            <input type="text" class="form-control input-sm" id="precio" name="precio">
            <p></p>
            <span class="btn btn-primary" id="btnAgregarVenta">Agregar</span>
        </form>
    </siv>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#clienteVenta').select2();
        $('#productoVenta').select2();
    });
</script>