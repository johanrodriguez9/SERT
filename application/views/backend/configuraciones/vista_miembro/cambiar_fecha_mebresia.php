<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" id="guardar_fecha" enctype="multipart/form-data">
<input type="hidden" name="id_miembro" value="<?php echo $obj->miembro_id; ?>">
      	<div class="col-md-12">
        	<div class="form-group1 ">
            	<label>.::: FECHA INICIO DE MEMBRESIA :::.</label>
              	<input type="date" name="fecha_inicio" class="form-control" value="<?php echo $obj->miembro_fecha_inicio_membresia; ?>" placeholder="Ingresar..." required>
          	</div>
      	</div>
        <div class="col-md-12">
          <div class="form-group1 ">
              <label>.:::FECHA FINAL DE MEMBRESIA :::.</label>
                <input type="date" name="fecha_final" class="form-control" value="<?php echo $obj->miembro_fecha_final_membresia; ?>" placeholder="Ingresar..." required>
            </div>
        </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue btn-outline m-b-10 btn-lg">GUARDAR DATOS</button>
        <button type="button" class="btn red btn-outline m-b-10 btn-lg" data-dismiss="modal">CANCELAR</button>
    </div>
</form>
<script>
	$("#guardar_fecha").submit(function(event) {
    event.preventDefault();
    var formData=new FormData($("#guardar_fecha")[0]);
    $('#loading').modal({backdrop: 'static', keyboard: false});
    $.ajax({
        url:'<?php echo base_url(Hasher::make(105));?>',
        type:'POST',
        data:formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function(){ 
          swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
          setTimeout(function(){
               window.location='';
          },1000);
        } 
    });       
});
</script>