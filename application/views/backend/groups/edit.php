<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" id="guardar_editar_grupo" enctype="multipart/form-data">
<input type="hidden" name="id_grupo" value="<?php echo $obj->id; ?>">
    <div class="panel-body">
      	<div class="col-md-12">
        	<div class="form-group1 ">
            	<label>.:::NOMBRE GRUPO :::.</label>
              	<input type="text" name="group_name1" class="form-control" value="<?php echo $obj->name; ?>" placeholder="Ingresar..." required>
          	</div>
      	</div>

      	<div class="col-md-12">
        	<div class="form-group1 ">
            	<label>.:::DESCRIPCION:::.</label>
             	<input type="text" name="description1" class="form-control" value="<?php echo $obj->description; ?>" placeholder="Ingresar..." >
          	</div>
      	</div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn dark btn-outline btn-circle m-b-10 btn-lg">GUARDAR DATOS</button>
        <button type="button" class="btn dark btn-outline btn-circle m-b-10 btn-lg" data-dismiss="modal">CANCELAR</button>
    </div>
</form>
<script>
	$("#guardar_editar_grupo").submit(function(event) {
    event.preventDefault();
    var formData=new FormData($("#guardar_editar_grupo")[0]);
    
    $('#loading').modal({backdrop: 'static', keyboard: false});
    $.ajax({
        url:'<?php echo base_url(); ?>backend/groups/guardar_editar_grupo',
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