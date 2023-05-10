	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$i          = 1;
	$nbr_groups = ($count_groups > 0) ? ' <span class="badge badge-info">' . $count_groups . '</span>' : NULL;

	?>
	
	<div class="breadcrumb-header justify-content-between">
		<div>
			<h4 class="content-title mb-2">TIENDA</h4>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
					<li class="breadcrumb-item active"><a href="">GRUPO</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="row row-sm" >
		<div class="col-xl-12">
			<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
				<div class="card-header pb-0">
					<h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACION DE USUARIOS</h2>
				</div>
				<div class="card-body">
					<button type="button" data-toggle="modal" data-target="#modal-basic" class="btn btn-outline-primary btn-lg"><i class="fa fa-plus"></i> ASIGNAR USUARIO</button>
					<br>
					<br>
					<div class="table-responsive">
						<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
							<table class="dataTable no-footer" id="basic-3">
								<thead style="background: #168eea24;">
								<tr>
									<th>#</th>
									<th>{lang_name}</th>
									<th>{lang_color}</th>
									<th>{lang_description}</th>
									<th>{lang_actions}</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach ($groups as $group): ?>
									<tr>
										<th scope="row"><?php echo $i++; ?></th>
										<td><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></td>
										<td>-</td>
										<td><?php echo htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8'); ?></td>
										<td>
										<button type="button" onclick="editar_grupo('<?php echo $group->id; ?>')" class="btn dark btn-outline btn-circle m-b-10 btn-sm"> <span class="fa fa-pencil"></span> Editar</button>							
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
					<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h4 class="modal-title text-center"><strong style="color:#fff;">AGREGAR NUEVOS GRUPO</strong> </h4>
				</div>
				<form method="post" id="guardar_nuevo_grupo" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="panel-body">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-label">NOMBRE GRUPO:<span class="tx-danger">*</span></label>
									<input type="text" name="group_name" class="form-control" placeholder="Ingresar nombre" required>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="form-label">DESCRIPCION:<span class="tx-danger">*</span></label>
									<input type="text" name="description" class="form-control" placeholder="Ingresar descripcion" >
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn dark btn-outline btn-circle m-b-10 btn-lg">GUARDAR DATOS</button>
						<button type="button" class="btn dark btn-outline btn-circle m-b-10 btn-lg" data-dismiss="modal">CANCELAR</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal" id="modal-editar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header modal_fer" >
				<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title text-center"><strong style="color:#fff;">AGREGAR MODIFICAR GRUPO</strong> </h4>
			</div>
				<div class="modal-body" id="contenido_editar">
				
				</div>
			</div>
		</div>
	</div>
	<script>
	$("#guardar_nuevo_grupo").submit(function(event) {
		event.preventDefault();
		var formData=new FormData($("#guardar_nuevo_grupo")[0]);
		
		$('#loading').modal({backdrop: 'static', keyboard: false});
		$.ajax({
			url:'<?php echo base_url(); ?>backend/groups/add',
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
	function editar_grupo(id){
		$("#modal-editar").modal('show');
		$.post('<?php echo base_url(); ?>backend/groups/editar_grupo', {id}, function(data) {
		$("#contenido_editar").html(data)
		});
	}
	</script>