<div class="col-md-12"><h3>DATOS PERSONALES</h3>

    <div class="alert alert-info"><strong>USUARIO :</strong> <?php echo $obj->username; ?></div>

</div>    

<form id="guardar_editar_usuario" method="post">

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label class="form-label">NOMBRE </label> 
        <input type="text" class="form-control" name="nombre1" value="<?php echo $obj->first_name; ?>" placeholder="nombre..."  >
    </div>    
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label class="form-label">APELLIDOS</label> 
        <input type="text" class="form-control" name="apellido1" value="<?php echo $obj->last_name; ?>"  placeholder="apellido..."  >
    </div>    
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label class="form-label">TIPO USUARIO</label> 
        <select name="id_tipo_usuario1" class="form-control">
            <option></option>
            <?php foreach ($this->db->get('dp_auth_groups')->result() as $value_tipo1) {
                $ver=$this->ion_auth->verificar_grupo_asignado($value_tipo1->id,$obj->id);
                if($ver){ ?>
                <option value="<?php echo $value_tipo1->id; ?>" <?php if($value_tipo1->id==$ver->group_id) echo "selected"; ?>><?php echo $value_tipo1->name; ?></option> 
            <?php }else{ ?>
                <option value="<?php echo $value_tipo1->id; ?>"><?php echo $value_tipo1->name; ?></option> 
            <?php }} ?>
        </select>  
    </div>    


    <div class="col-lg-12">
        <input type="hidden" name="id_usuario1" id="id_usuario1" value="<?php echo $obj->id ?>">
        <button type="submit" class="btn btn-outline-primary btn-circle m-b-10 btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS</button>
        <button type="button" class="btn btn-outline-primary btn-circle m-b-10 btn-lg" data-dismiss="modal"><span class="fa fa-close"></span> CANCELAR</button>
    </div>
</form>
<script>

$("#guardar_editar_usuario").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url:'<?php echo base_url();?>backend/Users/guardar_editar_usuario',
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