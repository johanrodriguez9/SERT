<div class="col-md-12"><h3>DATOS PERSONALES</h3>

    <div class="alert alert-info"><strong>NOMBRE Y AP. :</strong> <?php echo $obj->first_name.' '.$obj->last_name; ?></div>
<?php 
$nombre=mb_strtoupper($obj->first_name,'utf-8');
$a=explode(" ", $nombre); 
$usuario=$a[0].'_'.$obj->id.'#';
?>

</div>    

<form id="guardar_reset_usuario" method="post">
    <input type="hidden" name="id_usuario" value="<?php echo $obj->id ?>">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="form-label">NUEVO USUARIO</label> 
            <!-- <input type="text" class="form-control" value="<?php echo $usuario; ?>" readonly > -->
            <input type="text" class="form-control" name="usuario" value="<?php echo $usuario; ?>" required >

        </div>    
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="form-label">NUEVA CONTRASEÑA</label> 
            <!-- <input type="text" class="form-control" value="<?php echo $usuario; ?>" readonly > -->
            <input type="text" class="form-control" name="pass" value="<?php echo $usuario; ?>" required >

        </div>    
    </div>

    <div class="col-lg-12">
        <button type="submit" class="btn btn-outline-primary btn-circle m-b-10 btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS</button>
        <button type="button" class="btn btn-outline-primary btn-circle m-b-10 btn-lg" data-dismiss="modal"><span class="fa fa-close"></span> CANCELAR</button>
    </div>
</form>
<script>
$("#guardar_reset_usuario").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url:'<?php echo base_url();?>backend/Users/guardar_reset_usuario',
        type:'POST',
        data:$("form").serialize(),
        success:function(){
            swal("NOTA!", "EXITOSAMENTE MODIFICADOS LOS DATOS", "success");
            setTimeout(function(){
                    window.location='<?php echo base_url(Hasher::make(21)); ?>';
                },500);
        }
    });
});
</script>