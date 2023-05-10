<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  


<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">TIENDA</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
				<li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN PRODUCTOS ADQUIRIDOS</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" >
	<div class="col-xl-12">
		<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
			<div class="card-header pb-0">
				<center><h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN PRODUCTOS ADQUIRIDOS</h2></center>
				<br>
			</div>
			<div class="card-body">
				<button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-outline-primary btn-lg" ><i class="fa fa-plus"></i> ADICIONAR </button>
				<br>
				<br>
				<div class="table-responsive">
					<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
						<table class="dataTable no-footer" id="basic-3">
							<thead style="background: #168eea24;">
								<tr>
									<th>#</th>
									<th>CANTIDAD</th>
									<th>PRECIO</th>
									<th>PRECIO MONEDA</th>
									<th>OFERTA</th>
									<th>FECHA REGISTRO</th>
									<th>FECHA MODIFICACION</th>
									<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
							<?php $cont=1; foreach ($listar_productos_adquiridos as $value): ?>
								<tr>
									<th><?= $cont++; ?></th>
									<th><?= $value->tienda_producto_adquirido_cantidad ?></th>
									<th><?= $value->tienda_producto_adquirido_precio; ?></th>
									<th><?= $value->tienda_producto_adquirido_moneda; ?></th>
									<th><?= $value->tienda_producto_adquirido_oferta; ?></th>
									<th><?= $value->tienda_producto_adquirido_fecha_registro; ?></th>
									<th><?= $value->tienda_producto_adquirido_fecha_modificado; ?> </th>
									<td>
										<a class="btn btn-outline-primary" href="<?php echo base_url(Hasher::make(52,$value->producto_id))?>" >
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
<div class="modal-dialog modal-xl">
	<div class="modal-content ">
	<div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
		<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
		<h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR VENTA</strong></h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<form  id="guardar_tienda" class="col-lg-12" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12" style="display: flex; align-content: flex-start;">
						<div class="col-lg-12 table-responsive">
							<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
								<table class="dataTable no-footer" id="basic-3">
									<thead style="background: #168eea24;">
										<tr>
											<th>#</th>
											<th>CANTIDAD</th>
											<th>PRECIO</th>
											<th>PRECIO MONEDA</th>
											<th>OFERTA</th>
											<th>PRODUCTO</th>
											<th>PRECIO CON DESCUENTO</th>
											<th>ACCION</th>
										</tr>
									</thead>
									<tbody id="listaventa">
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="row no-margin col-lg-4 col-md-12 col-sm-12" >
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label class="form-label1">CANTIDAD: <span class="tx-danger">*</span></label>
								<input class="form-control " name="cantidad" id="cantidad" placeholder="Introduzca la cantidad" required="" type="number">
							</div>
						<div class="form-group col-lg-6 col-md-6 col-sm-12" id="app-oferta">
							<label class="form-label1">DESCUENTO:<span class="tx-danger">*</span></label>
							<input class="form-control" name="precio_oferta" id="precio_oferta"  placeholder="% Ofera" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label class="form-label1">PRECIO:<span class="tx-danger">*</span></label>
							<input class="form-control" name="precio_venta" id="precio_venta" placeholder="Introduzca precio venta" required="" type="number">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label class="form-label1">VENTA MONEDA:<span class="tx-danger">*</span></label>
							<select class="form-select" name="venta_moneda" id="venta_moneda">
								<option style="color: #c4bfbf;" disabled="" selected="">Seleccionar tipo moneda</option>
								<option value="Bolivianos">Bolivianos</option>
								<option value="Dolares">Dolares</option>
							</select>
						</div>

						<input class="form-control " name="fecharegistro" placeholder="Fecha registro" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<input class="form-control " name="fechamodificado" placeholder="Fecha modificado" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						
						<div class="form-group col-lg-12 col-md-12 col-sm-12">
							<h5 class="app-frentes-habilitados">Productos</h5>
							<div style="display: flex;flex-wrap: nowrap;overflow-x: auto;">
								<?php $cont=1; foreach ($listar_pruducto as $value): ?>
									<div class="frb frb-danger col-lg-4 col-md-6 col-sm-12 col-xs-12" style="flex: 0 0 auto;width:50%;margin-right: 10px;">
										<input type="radio" id="radio-button-<?= $value->producto_id?>" name="radio_button" value="<?= $value->producto_id?>" required onchange="plan_producto(this.value)">
										<label for="radio-button-<?= $value->producto_id?>" style="padding: 20px 10px;">
											<figure class="m-imagen">
												<img class="m-previsualizarimagen" id="txtnombrecandidato" src="<?php echo base_url();?>assets/img_producto/<?php echo $value->producto_imagen?>" alt="">
											</figure>
											<span class="frb-title"><?= $value->producto_titulo?></span>
											<!-- <span class="frb-description"></span> -->
										</label>
									</div>
								<?php endforeach ?> 
							</div>
							<br>
							<button type="button" name="add-venta" id="add-venta" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-plus"></span> ADICIONAR VENTA</button>
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
				</div>
			</form>
		</div>
	</div>
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

	function plan_producto(idproducto){
		console.log("das"+idproducto);
        $.post('<?php echo base_url(); ?>backend/configuraciones/Controller_tienda/ofertaproducto', {idproducto}, function(data) { 
            $("#app-oferta").html(data);
        });

    }

	var count_1 = 0;

    $('#add-venta').click(function(){
        count_1=count_1 + 1;
        var html_code='';
		cantidad = $('#cantidad').val();        
		preciooferta = $('#precio_oferta').val();
		precioventa = $('#precio_venta').val();
		ventamoneda = $('#venta_moneda').val();
		
        html_code +="<tr id='row"+count_1+"'>";
        html_code +="<td contenteditable='false' class='item_carrera_count'>"+count_1+"</td>";
        html_code +="<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+cantidad+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>"+
                  	"<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+precioventa+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>"+
					"<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+ventamoneda+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>"+
					"<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+preciooferta+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>"+
					"<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+precioventa+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>"+
					"<td contenteditable='false' class='item_carrera_nombre'>"+
                        "<input class='form-control' value="+precioventa+" type='text' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan"+count_1+"' readonly>"+
                    "</td>";
					
        html_code +="<td><button type='button' name='remove' data-row='row"+count_1+"' class='btn btn-danger btn-xs remove-add-nuevogrupocarrera_1'><span class='fa fa-times'></span></td>";
        html_code +="</tr>";

        $('#listaventa').append(html_code);
    });

	$(document).on('click','.remove-add-nuevogrupocarrera_1',function(){
        var delete_row = $(this).data("row");
        $('#'+delete_row).remove(); 
    });

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
	// alert('holaaaa');
	event.preventDefault();
	$('#loading').modal({backdrop: 'static', keyboard: false});
	var formData=new FormData($("#guardar_tienda")[0]);
	$('#loading').modal({backdrop: 'static', keyboard: false});
	$.ajax({
		url:'<?php echo base_url(Hasher::make(66));?>',
		type:'POST',
		data:formData,
		cache:false,
		processData:false,
		contentType:false,
		success:function(){ 
		swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
		setTimeout(function(){
			window.location='<?php echo base_url(Hasher::make(65)); ?>';
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

</script>



<style>

    .app-frentes-habilitados{
        width: 100%;
        background: #168eea;
        color: white;
        text-align: center;
        border-radius: 5px 5px 0 0;
        padding: 10px; 
        white-space: normal!important;   
    }

    .frb-group {
        margin: 15px 0;
    }

    /* .frb ~ .frb {
        margin-top: 15px;
    } */

    .frb input[type="radio"]:empty,
    .frb input[type="checkbox"]:empty {
        display: none;
    }

    figure.m-imagen img{
        /* border-radius: 62%; */
        /* border: 2px dashed black; */
        border: 2px solid white;
        height: 100%;
        width: 120px;
        margin: 0 auto;
    }

    .frb input[type="radio"] ~ label:before,
    .frb input[type="checkbox"] ~ label:before {
        font-family: FontAwesome;
        content: '\f096';
        position: initial;
        top: 50%;
        margin-top: 2em;
        left: 50%;
        font-size: 3em;
    }

    .frb input[type="radio"]:checked ~ label:before,
    .frb input[type="checkbox"]:checked ~ label:before {
        content: '\f046';
    }

    .frb input[type="radio"] ~ label,
    .frb input[type="checkbox"] ~ label {
        position: relative;
        cursor: pointer;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f2f2f2;
        text-align:center;
    }

    .frb input[type="radio"] ~ label:focus,
    .frb input[type="radio"] ~ label:hover,
    .frb input[type="checkbox"] ~ label:focus,
    .frb input[type="checkbox"] ~ label:hover {
        box-shadow: 0px 0px 3px #333;
    }

    .frb input[type="radio"]:checked ~ label,
    .frb input[type="checkbox"]:checked ~ label {
        color: #fafafa;
    }

    .frb input[type="radio"]:checked ~ label,
    .frb input[type="checkbox"]:checked ~ label {
        background-color: #f2f2f2;
    }

    .frb.frb-default input[type="radio"]:checked ~ label,
    .frb.frb-default input[type="checkbox"]:checked ~ label {
        color: #333;
    }

    .frb.frb-primary input[type="radio"]:checked ~ label,
    .frb.frb-primary input[type="checkbox"]:checked ~ label {
        background-color: #337ab7;
    }

    .frb.frb-success input[type="radio"]:checked ~ label,
    .frb.frb-success input[type="checkbox"]:checked ~ label {
        background-color: #5cb85c;
    }

    .frb.frb-info input[type="radio"]:checked ~ label,
    .frb.frb-info input[type="checkbox"]:checked ~ label {
        background-color: #5bc0de;
    }

    .frb.frb-warning input[type="radio"]:checked ~ label,
    .frb.frb-warning input[type="checkbox"]:checked ~ label {
        background-color: #f0ad4e;
    }

    .frb.frb-danger input[type="radio"]:checked ~ label,
    .frb.frb-danger input[type="checkbox"]:checked ~ label {
        background-color: #168eea;
        
    }

    .frb input[type="radio"]:empty ~ label span,
    .frb input[type="checkbox"]:empty ~ label span {
        display: inline-block;
    }

    .frb input[type="radio"]:empty ~ label span.frb-title,
    .frb input[type="checkbox"]:empty ~ label span.frb-title {
        font-size: 16px;
        font-weight: 700;
        margin: 0 auto;
        width:100%;
        margin-top:10px;
    }

    .frb input[type="radio"]:empty ~ label span.frb-description,
    .frb input[type="checkbox"]:empty ~ label span.frb-description {
        font-weight: normal;
        font-style: italic;
        color: #999;
        margin: 0 auto;
        margin: 10px 0;
    }

    .frb input[type="radio"]:empty:checked ~ label span.frb-description,
    .frb input[type="checkbox"]:empty:checked ~ label span.frb-description {
        color: #fafafa;
    }

    .frb.frb-default input[type="radio"]:empty:checked ~ label span.frb-description,
    .frb.frb-default input[type="checkbox"]:empty:checked ~ label span.frb-description {
        color: #999;
    }
</style>