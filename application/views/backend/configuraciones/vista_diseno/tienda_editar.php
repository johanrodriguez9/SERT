<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  

<link rel="stylesheet" type="text/css" href="{theme_url}css/datatables.css">

<link href="<?php echo base_url(); ?>assets/summernote_editor/summernote.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/summernote_editor/summernote.min.js"></script>

<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">TIENDA</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">INICIO</a></li>
				<li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN TIENDA</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" >
	<div class="col-xl-12">
		<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
			<div class="card-header pb-0">
				<center><h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE LA TIENDA</h2></center>
				<br>
				<div class="d-flex justify-content-between">
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
			</div>
			<div class="card-body">
				<?php $obj=$this->Modelo_tienda->id_tabla_producto($id_producto);?>
				<form id="guardar_editar" method="post" enctype="multipart/form-data">
					<div class="panel-body">
						<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $obj->producto_id ?>">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>IMAGEN PORTADA:</label>
									<input type="file" accept="image/png, .jpeg, .jpg, image/gif" name="imagen" class="form-control  nuevaFoto">
									<span id="error_img"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>VISUALIZAR:</label><br>
									<img width="80" height="100" class="visualizar" src="<?php echo base_url();?>assets/img_producto/<?php echo $obj->producto_imagen; ?>">
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group1 ">
							<label>TITULO:</label>
							<input type="text" name="titulo" class="form-control" value="<?php echo $obj->producto_titulo ?>" placeholder="Ingresar titulo..." required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group1 ">
								<label>DESCRIPCION:</label>
								<textarea class="form-control" name="descripcion" id="txt-content" data-autosave="editor-content" autofocus required rows="3" ><?php echo $obj->producto_descripcion ?></textarea>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group1 ">
								<label>NUMERO DE REFERENCIA:</label>
								<input class="form-control" name="numero" placeholder="Introduzca numero de referencia...." required type="number" ><?php echo $obj->producto_referencia ?>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group1 ">
								<label>COSTO:</label>
								<input class="form-control" name="costo" placeholder="Introduzca costo...." required type="number"><?php echo $obj->producto_costo ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group1 ">
									<br><label>FECHA DE REGISTRO:</label>
									<input type="text" name="fecha_registro" class="form-control" value="<?php echo $obj->producto_fin_fecha_registro ?>" required disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group1 ">
									<br><label>FECHA DE MODIFICACION:</label>
									<input type="text" name="fecha_modificacion" class="form-control" value="<?php echo $obj->producto_fin_fecha_modificacion ?>" required disabled>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="form-group mg-b-0">
								<label class="form-label">CATEGORIA<span class="tx-danger">*</span></label>
								<select class="form-control" name="categoria">
									<option enabled="true">Seleccione Categoria</option>
									<?php foreach ($categorias as $value): ?>
										<option value="<?php echo $value->categoria_id; ?>"><?php echo $value->categoria_nombre; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<input type="hidden" name="producto_imagen" value="<?php echo $obj->producto_imagen; ?>">
						<input class="form-control " name="fechamodificado" placeholder="Fecha modificado" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<br>
						<br>
						<div class="col-md-12">
							<div class="panel-body" style="border: #34495e 3px double;">
								<label><strong class="text-primary">CARGAR VARIAS IMAGENES DEL PRODUCTO:</strong></label>
								<input type="file" id="file" name="file[]" multiple class="btn dark btn-block"  >
								<div class="row" id="vista_previa"></div>

								<div id="respuesta"></div>
								<hr>
								<div class="row">
									<?php $mini=$this->Modelo_tienda->id_tabla_imag_mini($id_producto);
									if ($mini) {
										foreach ($mini as $value){?>
										<div class="col-lg-4">
											<button type="button" class="close1" onclick="eliminar_mini_img('<?php echo $value->galeria_id?>','<?php echo $value->galeria_imagen?>')">&times; </button>
											<img src="<?php echo base_url();?>assets/img_producto/<?php echo $value->galeria_imagen;?>" class ="img-responsive">
										</div>
									<?php } 
									} ?>
								</div> 
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn-outline-primary btn-circle m-b-10 btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS </button>
						<a href="<?php echo base_url(Hasher::make(50)); ?>" class="btn-outline-primary btn-circle m-b-10 btn-lg" data-dismiss="modal"><span class="fa fa-close"></span> SALIR</a>
					</div>
				</form>
			</div><!-- bd -->

		</div><!-- bd -->
	</div>
</div> 



<script src="<?php echo base_url();?>assets/admin/assets/js/validar.js"></script>
<!-- editor -->
<script type="text/javascript">
	$(document).ready(function() {
	$('#texto').summernote();
	})
</script>
<script type="text/javascript">

$(".nuevaFoto").change(function(){
	var imagen=this.files[0];
	if (imagen["type"]!="image/jpeg" && 
		imagen["type"]!="image/png" && 
		imagen["type"]!="image/gif" && 
		imagen["type"]!="image/jpg") {
		$(".nuevaFoto").val('');
		$("#error_img").html('<b style="color:#ff0000;">Formato invalido...</b>');
		$(".visualizar").attr("src",'<?php echo base_url();?>assets/alert/no-image.png');
	}else{
		if(imagen['size']>5000000){
			$(".nuevaFoto").val('');
			$("#error_img").html('<b style="color:#ff0000;">Imagen exede de 5 Mg...</b>');
		}else{
			$("#error_img").html('');
			var datosImagen=new FileReader;
			datosImagen.readAsDataURL(imagen);
			$(datosImagen).on("load",function(event){
				var rutaImagen=event.target.result;
				$(".visualizar").attr("src",rutaImagen);
			});
		}
	}
});



$("#guardar_editar").submit(function(event) {

	event.preventDefault();
	$('#loading').modal({backdrop: 'static', keyboard: false});
	var formData=new FormData($("#guardar_editar")[0]);
	$('#loading').modal({backdrop: 'static', keyboard: false});
	$.ajax({
		url:'<?php echo base_url(Hasher::make(53));?>',
		type:'POST',
		data:formData,
		cache:false,
		processData:false,
		contentType:false,
		success:function(){ 
		swal("NOTA!", "EXITOSAMENTE MODIFICADO LOS DATOS", "success");
		setTimeout(function(){
			window.location='<?php echo base_url(Hasher::make(50)); ?>';
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

//editar tienda

function editar_tienda(id){
$("#modal-editar").modal('show');
	$.post('<?php echo base_url(Hasher::make(85)); ?>', {id}, function(data) {
	$("#contenido_editar").html(data)
	});
}
//CAMBIAR ESTADO

function cambiar_estado_tienda(id,estado){
	$.post('<?php echo base_url(Hasher::make(84)); ?>', {id,estado}, function() {
		swal({
		title: 'NOTA',
		text: 'EXITOSAMENTE MODIFICADO EL ESTADO',
		type: 'success',
		confirmButtonColor: '#57a94f'
		})
		setTimeout(function(){
			window.location='';
		},1000);  
	});
}

$(function(){   
	$("#file").on("change", function(){
	/* Limpiar vista previa */
	$("#vista_previa").html('');
	var archivos = document.getElementById('file').files;
	var navegador = window.URL || window.webkitURL;
	/* Recorrer los archivos */
	for(x=0; x<archivos.length; x++)
	{
		/* Validar tamaño y tipo de archivo */
		var size = archivos[x].size;
		var type = archivos[x].type;
		var name = archivos[x].name;
		if (size > 5000000)
		{
			$("#vista_previa").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 1MB</p>");
		}
		else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
		{
			$("#respuesta").append("<p class='alert alert-danger' style='color:#fff'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
		}
		else
		{
			var objeto_url = navegador.createObjectURL(archivos[x]);
			$("#vista_previa").append("<div class='col-md-4'><img  src="+objeto_url+" class='img-thumbnail'></div>");
		}
	}
	});   
});

function eliminar_mini_img(galeria_id,galeria_imagen){
	alertify.confirm("<p>NOTA<br>Esta seguro que desea eliminar<br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
		if (e) {
			alertify.success("Has pulsado ok");
			$('#loading').modal({backdrop: 'static', keyboard: false});
			$.post('<?php echo base_url();?>backend/configuraciones/Controller_tienda/eliminar_mini_img', {galeria_id,galeria_imagen}, function() {
				swal("NOTA!", "EXITOSAMENTE ELIMINADO :)", "success");
				setTimeout(function(){
				window.location='<?php echo base_url(Hasher::make(52,$id_producto)); ?>';
				},1000); 
			});
		} else { alertify.error("Has pulsado cancelar:(");}
		return true
	}); 
}



</script>