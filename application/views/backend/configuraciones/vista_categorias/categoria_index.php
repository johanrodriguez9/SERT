<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">TIENDA</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
				<li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN CATEGORIA</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" >
	<div class="col-xl-12">
		<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
			<div class="card-header pb-0">
				<center><h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE CATEGORIA</h2></center>
				<br>
			</div>
			<div class="card-body">
				<button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-outline-primary btn-lg" ><i class="fa fa-plus"></i> ADICIONAR </button>
				<br>
				<br>
				<div class="table-responsive">
					<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
						<table class="dataTable no-footer" id="basic-3">
							<thead>
								<tr>
									<th>#</th>
									<th>NOMBRE</th>
									<th>DESCRIPCION</th>
									<th>ACCION</th>
								</tr>
							</thead>
							<tbody id="listarcategoria">
							<?php $cont=1; foreach ($listar_categoria as $value): ?>
								<tr>
									<th><?= $cont++; ?></th>
									<th><?= $value->categoria_nombre ?></th>
									<th><?= $value->categoria_descripcion ?></th>

									<td>
										<a class="btn btn-outline-primary editarcategoria" href="javascript:void(0);"
													data-idcategoria="<?= $value->categoria_id ?>" 
                                                    data-nombre="<?= $value->categoria_nombre ?>" 
                                                    data-descripcion="<?= $value->categoria_descripcion ?>"
													>
											<i class="fa fa-edit"></i>EDITAR
										</a>
									</td>
								</tr>
							<?php endforeach ?> 
								
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- bd -->
		</div><!-- bd -->
	</div>
</div> 
	
<!-- MODAL ADICIONAR -->

<div class="modal" id="modal-add"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content ">
		<div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
			<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
			<h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR CATEGORIA</strong></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<form  id="guardar_tienda" class="col-lg-12" method="post" enctype="multipart/form-data">
					<div class="col-md-12 col-sm-12">
						<div class="form-group mg-b-0">
							<label class="form-label">NOMBRE <span class="tx-danger">*</span></label>
							<input class="form-control " name="nombre" placeholder="Introduzca el nombre categoria" required="" type="text">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label class="form-label">DESCRIPCION: </label> 
							<div class="input-group mb-3 margin-bottom-15">
								<textarea  type="text" class="form-control" placeholder="Introduzca la descripción" name="descripcion"></textarea>
							</div>  
						</div>    
					</div>
					<div class="card"></div>

				<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="modal" id="modal-edit"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content ">
		<div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
			<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
			<h4 class="modal-title"><strong style="color:#fff;"> MODIFICAR CATEGORIA</strong></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<form  id="editar_tienda" class="col-lg-12" method="post" enctype="multipart/form-data">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input class="form-control " name="idcategoriaedit" id="idcategoriaedit" required="" type="hidden" readonly>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group mg-b-0">
							<label class="form-label">NOMBRE <span class="tx-danger">*</span></label>
							<input class="form-control " id="nombre" name="nombre" placeholder="Introduzca el nombre...." required="" type="text">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label class="form-label">DESCRIPCION: </label> 
							<div class="input-group mb-3 margin-bottom-15">
							<textarea  type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
							</div>  
						</div>    
					</div>
					<div class="card"></div>

				<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	$('#listarcategoria').on('click','.editarcategoria',function(){
        $('#modal-edit').modal('show');
		$("#idcategoriaedit").val($(this).data('idcategoria'));
		$("#nombre").val($(this).data('nombre'));
		$("#descripcion").val($(this).data('descripcion'));

    });
	
	$("#guardar_tienda").submit(function(event) {
		event.preventDefault();
		$('#loading').modal({backdrop: 'static', keyboard: false});		
		var formData=new FormData($("#guardar_tienda")[0]);
		$('#loading').modal({backdrop: 'static', keyboard: false});
		$.ajax({
			url:'<?php echo base_url(Hasher::make(87));?>',
			type:'POST',
			data:formData,
			cache:false,
			processData:false,
			contentType:false,
			success:function(){ 
			swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
			setTimeout(function(){
				window.location='<?php echo base_url(Hasher::make(86)); ?>';
			},1000);
			} 
		});       
	});

	$("#editar_tienda").submit(function(event) {
		event.preventDefault();
		$('#loading').modal({backdrop: 'static', keyboard: false});		
		var formData=new FormData($("#editar_tienda")[0]);
		$('#loading').modal({backdrop: 'static', keyboard: false});
		$.ajax({
			url:'<?php echo base_url(Hasher::make(88));?>',
			type:'POST',
			data:formData,
			cache:false,
			processData:false,
			contentType:false,
			success:function(){ 
			swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
			setTimeout(function(){
				window.location='<?php echo base_url(Hasher::make(86)); ?>';
			},1000);
			} 
		});       
	});

	//eliminar
	function eliminar(id,imagen){
	// alert(id+' '+imagen);
		$.post('<?php echo base_url(Hasher::make(37)); ?>', {id,imagen}, function() {
			swal({
			title: 'NOTA',
			text: 'EXITOSAMENTE ELIMINADO',
			type: 'success',
			confirmButtonColor: '#57a94f'
			})
			setTimeout(function(){
				window.location='';
			},1000);  
		});
	}

</script>