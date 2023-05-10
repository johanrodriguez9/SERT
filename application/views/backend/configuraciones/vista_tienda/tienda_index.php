<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  


<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">TIENDA</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
				<li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN TIENDA</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" >
	<div class="col-xl-12">
		<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
			<div class="card-header pb-0">
				<center><h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN DEL PRODUCTO</h2></center>
				<br>
			</div>
			<div class="card-body">
				<button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-outline-primary btn-lg" ><i class="fa fa-plus"></i> ADICIONAR </button>
				<button class="btn btn-outline-primary m-b-8 btn-lg" onclick="generar_reporte_general()" title="REPORTE"><span class="fa fa-plus"></span> REPORTE GENERAL</button>
				<br>
				<br>
				<div class="table-responsive">
					<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
						<table class="dataTable no-footer" id="basic-3">
							<thead style="background: #168eea24;">
								<tr>
									<th>#</th>
									<th>NOMBRE</th>
									<th>DESCRIPCION</th>
									<th>IMAGEN PORTADA</th>
									<th>NUMERO DE SREFERENCIA</th>
									<th>COSTO</th>
									<th>FECHA REGISTRO</th>
									<th>FECHA MODIFICACION</th>
									<th>ESTADO</th>
									<th>CATEGORIA</th>
									<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
							<?php $cont=1; foreach ($listar_pruducto as $value): ?>
								<tr>
									<th><?= $cont++; ?></th>
									<th><?= $value->producto_titulo ?></th>
									<th>
										<div class="demo-gallery">
											<ul id="lightgallery" class="list-unstyled row row-sm">
											<li class="img-responsive" style="width:100%; height:100%
											"data-responsive="<?= base_url(); ?>assets/img_producto/<?= $value->producto_imagen ?>" data-src="<?= base_url(); ?>assets/img_producto/<?= $value->producto_imagen ?>" data-sub-html="<h4>Gallery Image 1</h4>" >
											<a href="#">
												<img class="img-responsive" style="width:100%; height:100%
												"src="<?= base_url(); ?>assets/img_producto/<?= $value->producto_imagen ?>" alt="Thumb-1">
											</a>
											</li>
											</ul>
										</div>
									</th>
									<th><?= $value->producto_descripcion; ?></th>
									<th><?= $value->producto_referencia; ?></th>
									<th><?= $value->producto_costo; ?> Bs.</th>
									<th><?= $value->producto_fin_fecha_registro; ?> </th>
									<th><?= $value->producto_fin_fecha_modificacion; ?> </th>
									<th>
										<?php if($value->producto_estado=='A'){ ?>
											<div class="form-block">
												<input type="checkbox" class="iswitch iswitch-md iswitch-success" checked onclick="cambiar_estado('<?= $value->producto_id ?>','<?= $value->producto_estado?>')">
											</div> activo
											<?php } else{ ?>
												<div class="form-block">
													<input type="checkbox" class="iswitch iswitch-md iswitch-success" onclick="cambiar_estado('<?= $value->producto_id ?>','<?= $value->producto_estado ?>')">
												</div> inactivo
											<?php  } ?>
										<??>
									</th>
									<th><?= $value->categoria_id; ?></th>
									<td>
										<a class="btn btn-outline-primary" href="<?php echo base_url(Hasher::make(52,$value->producto_id))?>" >
											<i class="fa fa-edit"></i>EDITAR
										</a>
										<a class="btn btn-outline-primary" href="<?php echo base_url(Hasher::make(52,$value->producto_id))?>" >
											<i class="fa fa-plus"></i>OFERTA
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
	<div class="modal-dialog modal-xl">
		<div class="modal-content ">
			<div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
				<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR A TIENDA</strong></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form  id="guardar_tienda" class="col-lg-12" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="col-lg-12">
										<div class="form-group mg-b-0">
											<label class="form-label1">TITULO: <span class="tx-danger">*</span></label>
											<input class="form-control " name="titulo" placeholder="Introduzca el título...." required="" type="text">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label class="form-label1">DESCRIPCION: <span class="tx-danger">*</span></label>
											<textarea id="texto" name="descripcion" style="margin-top: 30px; width: 100%; height: 100px;" class="form-control" required placeholder="Ingresar descripcion..."></textarea>	   
										</div>
									</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label1">FOTO PORTADA: <span class="tx-danger">*</span></label> 
									<div class="input-group mb-3 margin-bottom-15">
										<input type="file" name="imagen" id="nuevaFoto" class="form-control dropify nuevaFoto" accept="image/png, .jpeg, .jpg" >
										<span id="error_img"></span>
									</div>  
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mg-b-0">
									<label class="form-label1">NUMERO DE REFERENCIA <span class="tx-danger">*</span></label>
									<input class="form-control" name="numero" placeholder="Introduzca numero de referencia...." required="" type="number">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-label1">COSTO <span class="tx-danger">*</span></label>
									<input class="form-control" name="costo" placeholder="Introduzca costo...." required="" type="number">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group mg-b-0">
									<label class="form-label1">CATEGORIA<span class="tx-danger">*</span></label>
									<select class="form-control" name="categoria">
										<option enabled="true">Seleccione Categoria</option>
										<?php foreach ($categorias as $value): ?>
											<option value="<?php echo $value->categoria_id; ?>"><?php echo $value->categoria_nombre; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group mg-b-0">
									<label class="form-label1">TEMPORADA<span class="tx-danger">*</span></label>
									<select class="form-control" name="temporada">
										<option enabled="true">Seleccione Temporada</option>
										<?php foreach ($temporada as $value): ?>
											<option value="<?php echo $value->temporada_id; ?>"><?php echo $value->temporada_nombre; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group mg-b-0">
									<label class="form-label1">GENERO<span class="tx-danger">*</span></label>
									<select class="form-control" name="temgenero">
										<option enabled="true">Seleccione Genero</option>
										<?php foreach ($temgenero as $value): ?>
											<option value="<?php echo $value->temporada_genero_id; ?>"><?php echo $value->temporada_genero_nombre; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						

						<div class="col-md-12">
							<div class="panel-body" style="border: #34495e 1px solid;border-radius: 10px;padding: 15px;">
								<label class="form-label1"><strong class="text-primary">CARGAR VARIAS IMAGENES DE PRODUCTO:</strong></label>
								<input class="form-control btn dark btn-block" type="file" id="file" name="file[]" multiple >
							<div class="row" id="vista_previa"></div>

							<div id="respuesta"></div>
							<hr>
							<div class="row">
							</div>
						</div>
						
						<input class="form-control " name="fecharegistro" placeholder="Fecha registro" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<input class="form-control " name="fechamodificado" placeholder="Fecha modificado" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<div class="card"></div>
						<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal-reporte"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
			<div class="modal-header" style="background: #071892;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">      
                <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><strong style="color:#fff;">MOSTRAR REPORTE</strong></h4>
            </div>

            <form id="guardartiporesolucion" method="POST" action="">      
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table id="table_mostrarr" class="table table-striped table-bordered" style="border-spacing:0px; width:100%">
                                <thead>
                                    <tr style=" background:#03ae8c;color:#fff; box-shadow: 0px 5px 10px rgb(104 104 102);text-shadow: 1px 2px 1px #4e4d4d;">
                                        <th >Nro</th>
                                        <th>Documento PDF</th>
                                    </tr>
                                </thead>
                                <tbody id="listar_documento">

                                </tbody>
                            </table>
                        </div>  
                    </div>  
                </div>
            </form>       
        </div>
    </div>
</div> 

<div class="modal" id="modal-editar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background: #071892;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
				<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title text-center"><strong style="color:#fff;">EDITAR TIENDA</strong> </h4>
			</div>
			<div class="modal-body" id="contenido_editar">			
			</div>
		</div>
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



$("#guardar_tienda").submit(function(event) {
	event.preventDefault();
	$('#loading').modal({backdrop: 'static', keyboard: false});
	var formData=new FormData($("#guardar_tienda")[0]);
	$.ajax({
		url:'<?php echo base_url(Hasher::make(51));?>',
		type:'POST',
		data:formData,
		cache:false,
		processData:false,
		contentType:false,
		success:function(){ 
		swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
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

	function cambiar_estado(id,estado){
        $.post('<?php echo base_url(Hasher::make(54)); ?>', {id,estado}, function() {
            swal({
              title: 'NOTA',
              text: 'EXITOSAMENTE MODIFICADO EL ESTADO',
              type: 'success',
              confirmButtonColor: '#57a94f'
            })
            setTimeout(function(){
               window.location='<?php echo base_url(Hasher::make(50)); ?>';
               location.reload(true);
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

$(function(){   
	$("#file3d").on("change", function(){
	/* Limpiar vista previa */
	$("#vista_previa_3d").html('');
	var archivos = document.getElementById('file3d').files;
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
			$("#vista_previa3d").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 1MB</p>");
		}
		else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
		{
			$("#respuesta3d").append("<p class='alert alert-danger' style='color:#fff'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
		}
		else
		{
			var objeto_url = navegador.createObjectURL(archivos[x]);
			$("#vista_previa3d").append("<div class='col-lg-4 col-md-4 col-sm-4'><img style='width:50%!important' src="+objeto_url+" class='img-thumbnail'></div>");
		}
	}
	});   
});

function eliminar_mini_img(galeria_imagen){
alertify.confirm("<p>NOTA<br>Esta seguro que desea eliminar<br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
	if (e) {
		alertify.success("Has pulsado ok ");
		$('#loading').modal({backdrop: 'static', keyboard: false});
			swal.fire("NOTA!", "EXITOSAMENTE ELIMINADO :)", "success");
			setTimeout(function(){
				window.location='';
			},1000); 
		} else { 
			alertify.error("Has pulsado cancelar:(");
		}
	}); 
	return false
}

function generar_reporte_general(){
        
        $('#modal-reporte').modal('show');
		console.log("hola");
        // $.ajax({
        //     type : "post",
        //     url  : '<?php echo base_url(Hasher::make(110))?>',
        //     dataType : "json", 
        //     data : {
        //     },
        //     success: function(data1){    
        //         var html = '';
        //         var i;
        //         for(i=0; i<data1.length; i++){
        //             html += '<tr id_ubicacion_sede="'+data1[i].id_documento+'">'+
        //                         '<td>'+(i+1)+'</td>'+
        //                         '<td><a class="generar_reporte_doc_pdf" target="_black" href="<?php echo base_url(); ?>/'+data1[i].nombre+'">VER DOCUMENTO</a></td>'+
        //                     '</tr>';
        //         }
        //         $('#listar_documento').html(html);
        //     }
        // });


    }

</script>