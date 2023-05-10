	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');?>
	<div class="breadcrumb-header justify-content-between">
		<div>
			<h4 class="content-title mb-2">SISTEMA DE TIENDA</h4>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">INSTITUCÍON</a></li>
					<li class="breadcrumb-item active" aria-current="page">ADMIN PORTADA</li>
				</ol>
			</nav>
		</div>
	<?php  $obj=$this->Modelo_portada->listar_portada(); ?>  
	</div>
	<div class="row row-sm" >
		<div class="col-xl-12">
			<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
				<div class="card-header pb-0">
					<center> <h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN PORTADA</h2></center>
					<div class="d-flex justify-content-between">
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
				</div>
				<div class="card-body">
					<form id="guardar_portada" method="post" data-parsley-validate="">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<tr>
											<?php $cont=0;foreach ($obj as $value): ?>
												<?php if ($value->portada_id == 1 || $value->portada_id == 3 || $value->portada_id == 5): ?>
												<div class="row ">
												<?php endif ?>
												<?php $cont++; ?>
												<div class="col-sm-12 col-md-6">
													<div class="form-group mg-b-0">
													<label class="form-label"> TÍTULO <?php echo $cont; ?><span class="tx-danger">*</span></label>
													<input class="form-control" name="titulo[]" maxlength="80" placeholder="Introduzca el título a esta portada...." required="" type="text" value="<?php echo $value->portada_titulo?>">
													</div>
													<div class="form-group mg-b-0">
													<label class="form-label">SUB-TÍTULO <?php echo $cont; ?><span class="tx-danger">*</span></label>
													<input class="form-control" name="subtituloo[]" maxlength="137" placeholder="Introduzca un subtítulo a esta portada...."  required="" type="text" value="<?php echo $value->portada_subtitulo?>">
													</div>
													<input type="file" name="file[]"  class="dropify nuevaFoto1" data-height="300" accept="image/png, .jpeg, .jpg, image/gif" data-default-file="<?php echo base_url();?>assets/img_portada/<?php echo $value->portada_imagen?>"/>
													<span id="error_img"></span>
													<br>
												</div>
												<?php if ($value->portada_id == 2|| $value->portada_id == 4): ?>
												</div>
												<?php endif ?>
											<?php endforeach ?>
										</tr>
										<br>
										<br>
										<br>
										<div class="col-md-12">
											<button type="submit" class="btn  btn-outline-primary btn-circle  btn-lg btn-block"  style="border-radius: 50px;"><span class="fa fa-save"> </span> GUARDAR</button>                      
										</div>
									</div>
									
									


								</div>
							</div>
						</div>
					<!-- row closed -->
				</form>
							
				</div>

			</div>
		</div>
	</div>
	<script>
	$("#guardar_portada").submit(function(event) {
	event.preventDefault();
	$('#loading').modal({backdrop: 'static', keyboard: false});
	var formData=new FormData($("#guardar_portada")[0]);
	$.ajax({
		url:'<?php echo base_url(Hasher::make(41));?>',
		type:'POST',
		data:formData,
		cache:false,
		processData:false,
		contentType:false,
		success:function(){ 
			swal("NOTA!", "EXITOSAMENTE MODIFICADO EL ESTADO", "success");
			setTimeout(function(){
				window.location='';
			},1000); 
		}
	});
	});
	</script>