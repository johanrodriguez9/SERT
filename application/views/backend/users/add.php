<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


<script type="text/javascript">
	
/*$(document).ready(function(){
        $('#ci_persona').keyup(function(){
            limpiarCampos();
            if($('#ci_persona').val().length>4){
                callFindUser();
            }
        });
        function callFindUser(){
            var cont = $('#ci_persona').val();
            alert(cont);
            $('#usuario_kardista').val("kardista."+cont);
            $('#contenido_kardex').load('/QlfmSDlHL7',{ci_kardex:cont});
        }
        
        //function limpiarCampos(){
          //  $('#contenido_kardex').empty();
            //$('#usuario_kardista').val("");
        //}
       
    });*/



    function buscarusuario()
    {

    	ci= $('#ci_persona').val();


    	if(ci.length>4){


    		url ='<?=base_url(Hasher::make(340))?>';


    		$('#last_name').val(ci);

    		$.post(url,{ci_usuario:ci}, function (data) {
    			datos= JSON.parse(data);
    			if(typeof datos.ci!= 'undefined'){

    				var cadena = (datos.nombre);
    				var fecha = (datos.fecha_nac);

    				$('#first_name').val(datos.nombre);
    				$('#last_name').val(datos.paterno +' '+datos.materno);
    				$('#persona_id').val(datos.persona_id);
    				$('#identity').val(cadena.split(' ')[0]+'_'+datos.ci);     
    				$('#company').val('archidoc');     
    				$('#email').val(cadena.split(' ')[0]+'_'+datos.ci+'@archidoc.bo');
    				$('#phone').val(datos.telefono);
    				$('#password').val(fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1'));          
    				$('#password_confirm').val(fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1'));

    			}else{

    				$('#first_name').val('Error .....');
    				$('#last_name').val('NO HAY LA PERSONA');
    			}

    		});

    	}

    }
    function limpiar()
    {

    }
</script>


<div class="row">
	<div class="col-12">
		<?php echo form_open(current_url()); ?>


		<div class="row">
			<label class="col-sm-2 col-form-label">Buscar por Nr. Ci</label>
			<div class="col-sm-4">
				<div class="form-group has-success">
					<label for="exampleInput2" class="bmd-label-floating">Nr.  Ci</label>
					<input type="text" class="form-control" autocomplete="" id="ci_persona" name="ci_persona" onkeyup="buscarusuario()">
					<input type="hidden" class="form-control"  id="persona_id" name="persona_id" value="">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_first_name}', 'first_name'); ?>
				<?php echo form_input($first_name); ?>
			</div>
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_last_name}', 'last_name'); ?>
				<?php echo form_input($last_name); ?>
			</div>
		</div>

		<?php
		if ($identity_column !== 'email')
		{
			echo '<p>';
			echo lang('create_user_identity_label', 'identity');
			echo '<br />';
			echo form_error('identity');
			echo form_input($identity);
			echo '</p>';
		}
		?>
		
		<div class="form-group">
			<?php echo form_label('{lang_company_name}', 'company'); ?>
			<?php echo form_input($company); ?>
		</div>

		<div class="form-group row">
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_email}', 'email'); ?>
				<?php echo form_input($email); ?>
			</div>
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_phone}', 'phone'); ?>
				<?php echo form_input($phone); ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_password}', 'password'); ?>
				<?php echo form_input($password); ?>
			</div>
			<div class="col-12 col-md-6">
				<?php echo form_label('{lang_password_confirm}', 'password_confirm'); ?>
				<?php echo form_input($password_confirm); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo form_submit('submit', '{lang_create}', array('class' => 'btn btn-primary')); ?>
			<?php echo anchor('backend/users', '{lang_cancel}', array('class' => 'btn btn-primary')); ?>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		{message}
	</div>
</div>
