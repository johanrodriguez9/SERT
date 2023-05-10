<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="row">
	<div class="col-12">
		<?php echo form_open(current_url()); ?>
		<div class="form-group row">
			<div class="col-12 col-md-12">
					
				<center>
				<h4 style="color: #7b8087;">Cambio de contraseña personal de usuario.</h4>
				<div class=" col-md-6 alert alert-warning alert-with-icon" data-notify="container">
					<i class="material-icons" data-notify="icon">notifications</i>
					<span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
					<span data-notify="message">Todo cambio esta sujeto bajo su Responsabilidad.<i style="color: white" class="material-icons">warning</i></span>
				</div>
				</center>
			</div>
		</div>
		
		<div class="form-group has-warning row">
			<div class="col-12 col-md-6">
				<?php echo form_label('Nuevo Password', 'password'); ?>
				<?php echo form_input($password); ?>
				<div class="form-control-feedback">{lang_password_if_change}</div>
			</div>
			<div class="col-12 col-md-6">
				<?php echo form_label('Confirmar Password', 'password_confirm'); ?>
				<?php echo form_input($password_confirm); ?>
				<div class="form-control-feedback">{lang_password_if_change}</div>
			</div>
		</div>

	
		<div class="form-group">
			<?php
			echo form_hidden('id', $user_id);
			// echo form_hidden($csrf);
			echo form_submit('submit', '{lang_save}', array('class' => 'btn btn-primary'));
			// echo anchor('backend/users', '{lang_cancel}', array('class' => 'btn btn-primary'));
			?>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		{message}
	</div>
</div>
 