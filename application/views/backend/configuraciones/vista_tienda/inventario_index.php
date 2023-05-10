<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  


<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">TIENDA</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
				<li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN INVENTARIO</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" >
	<div class="col-xl-12">
		<div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
			<div class="card-header pb-0">
				<center><h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN INVENTARIO</h2></center>
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
									<th>NOMBRE</th>
									<th>STOCK</th>
									<th>PRECIO UNITARIO</th>
									<th>PRECIO UNITARIO MONEDA</th>
									<th>PRECIO VENTA</th>
									<th>PRECIO VENTA MONEDA</th>
									<th>FECHA REGISTRO</th>
									<th>FECHA MODIFICACION</th>
									<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
							<?php $cont=1; foreach ($listar_inventario as $value): ?>
								<tr>
									<th><?= $cont++; ?></th>
									<th><?= $value->tienda_inventario_nombre ?></th>
									<th><?= $value->tienda_inventario_stock; ?></th>
									<th><?= $value->tienda_inventario_precio_unitario; ?></th>
									<th><?= $value->tienda_inventario_precio_moneda; ?></th>
									<th><?= $value->tienda_inventario_precio_venta; ?></th>
									<th><?= $value->tienda_inventario_venta_moneda; ?></th>
									<th><?= $value->tienda_inventario_fecha_registro; ?></th>
									<th><?= $value->tienda_inventario_fecha_modificado; ?></th>
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
				<h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR INVENTARIO</strong></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form  id="guardar_tienda" class="col-lg-12" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group mg-b-0">
									<label class="form-label1">NOMBRE: <span class="tx-danger">*</span></label>
									<input class="form-control " id="nombre_inventario" name="nombre" placeholder="Introduzca el nombre" required="" type="text">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label1">Producto: <span class="tx-danger">*</span></label>
									<input class="form-control" onkeyup="buscar_producto(this.value)" name="stock" placeholder="Introduzca el stock" required="" type="text">
								</div>
							</div>

							<div class="row" id="mostrar_btomo"></div> 

						</div>
						
						<div class="col-lg-12 table-responsive">
							<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
								<table class="dataTable no-footer" id="basic-3">
									<thead style="background: #168eea24;">
										<tr>
											<th>#</th>
											<th>CANTIDAD</th>
											<th>PRECIO UNITARIO</th>
											<th>PRECIO MONEDA</th>
											<th>TALLA</th>
											<th>GENERO</th>
											<th>TOTAL</th>
											<th>PRECIO VENTA</th>
											<th>PRECIO MONEDA</th>
											<th>ACCION</th>
										</tr>
									</thead>
									<tbody id="listaventa">
									</tbody>
								</table>
								<div align="right">
									<button type="button" name="remove" data-row="row2" id="add-venta" class="btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                            	</div>
							</div>
						</div>

						<input class="form-control " id="fecharegistro" placeholder="Fecha registro" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<input class="form-control " id="fechamodificado" placeholder="Fecha modificado" value="<?php echo date("Y-m-d H:i:s") ?>" type="hidden">
						<div class="card"></div>
						<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
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

var count_1 = 0;

$('#add-venta').click(function(){
        count_1=count_1 + 1;
        var html_code='';
		
        html_code +="<tr id='row"+count_1+"'>";
        html_code +="<td contenteditable='false' class='item_carrera_count'>"+count_1+"</td>";
        html_code +="<td contenteditable='false' class='item_cantidad'>"+
						"<input placeholder='Cantidad' style='border: 1px solid #1172bc!important;' class='form-control' type='number' >"+
                    "</td>"+
                  	"<td contenteditable='false' class='item_precio_unitario'>"+
                        "<input placeholder='Precio Unitario' style='border: 1px solid #1172bc!important;' class='form-control' type='text' >"+
                    "</td>"+
					"<td contenteditable='false' class='item_moneda_preciou'>"+
						"<select class='form-select' style='border: 1px solid #1172bc!important;' name='venta_moneda' >"+
							"<option style='color: #c4bfbf;' disabled='' selected=''>Moneda</option>"+
							"<option value='Bolivianos'>Bolivianos</option>"+
							"<option value='Dolares'>Dolares</option>"+
						"</select>"+
					"</td>"+
					"<td contenteditable='false' class='item_talla'>"+
						"<select class='form-select' style='border: 1px solid #1172bc!important;' name='venta_moneda' >"+
							"<option style='color: #c4bfbf;' disabled='' selected=''>Talla</option>"+
							"<option value='S'>S</option>"+
							"<option value='M'>M</option>"+
							"<option value='L'>L</option>"+
							"<option value='XL'>XL</option>"+
						"</select>"+
					"</td>"+
					"<td contenteditable='false' class='item_genero'>"+
						"<select class='form-select' style='border: 1px solid #1172bc!important;' name='venta_moneda' >"+
							"<option style='color: #c4bfbf;' disabled='' selected=''>Genero</option>"+
							"<option value='Masculino'>Masculino</option>"+
							"<option value='Femenino'>Femenino</option>"+
						"</select>"+
					"</td>"+
					"<td contenteditable='false' class='item_total'>"+
                        "<input placeholder='Total' style='border: 1px solid #1172bc!important;' class='form-control' type='text' >"+
                    "</td>"+
					"<td contenteditable='false' class='item_precio_venta'>"+
                        "<input placeholder='Precio Venta' style='border: 1px solid #1172bc!important;' class='form-control' type='text' >"+
                    "</td>"+
					"<td contenteditable='false' class='item_moneda_preciov'>"+
					"<select class='form-select' style='border: 1px solid #1172bc!important;' name='venta_moneda' >"+
							"<option style='color: #c4bfbf;' disabled='' selected=''>Seleccionar tipo moneda</option>"+
							"<option value='Bolivianos'>Bolivianos</option>"+
							"<option value='Dolares'>Dolares</option>"+
						"</select>"+
                    "</td>";
        html_code +="<td><button type='button' name='remove' data-row='row"+count_1+"' class='btn btn-danger btn-xs remove-add-nuevogrupocarrera_1'><span class='fa fa-times'></span></button></td>";
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

		var nombrei=$('#nombre_inventario').val();
		
		var idp=$('#idproducto').val();
		
		var item_cantidad_1=[];
		var item_precio_unitario_1=[];
		var item_moneda_preciou_1=[];
		var item_talla_1=[];
		var item_genero_1=[];
		var item_precio_venta_1=[];
		var item_moneda_preciov_1=[];

        $('.item_cantidad input').each(function(){ 
            item_cantidad_1.push(this.value);
        });

        $('.item_precio_unitario input').each(function(){ 
            item_precio_unitario_1.push(this.value);
        });

		$('.item_moneda_preciou option:selected').each(function(){ 
            item_moneda_preciou_1.push(this.value);
        });

		$('.item_talla option:selected').each(function(){ 
            item_talla_1.push(this.value);
        });

		$('.item_genero option:selected').each(function(){ 
            item_genero_1.push(this.value);
        });
		
		$('.item_precio_venta input').each(function(){ 
            item_precio_venta_1.push(this.value);
        });
		
		$('.item_moneda_preciov option:selected').each(function(){ 
            item_moneda_preciov_1.push(this.value);
        });


		console.log(idp);

		console.log(item_cantidad_1);
		console.log(item_precio_unitario_1);
		console.log(item_moneda_preciou_1);
		console.log(item_talla_1);
		console.log(item_genero_1);
		console.log(item_precio_venta_1);
		console.log(item_moneda_preciov_1);

		var fecharegistro  = $('#fecharegistro').val();
        var fechamodificado  = $('#fechamodificado').val();

		$.ajax({
			type : "post",
			url  : '<?php echo base_url(Hasher::make(66))?>',
			dataType : "json",
			data : {
                nombreiin : nombrei,
                idpin : idp,
                cantidadin : item_cantidad_1,
                precio_unitarioin : item_precio_unitario_1,
                moneda_preciouin : item_moneda_preciou_1,
                tallain : item_talla_1,
                generoin: item_genero_1,
                precio_ventain : item_precio_venta_1,
                moneda_preciovin : item_moneda_preciov_1,
                fecharegistroin : fecharegistro,
                fechamodificadoin : fechamodificado


            },
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

    function buscar_producto(tomo){
        $.post('<?php echo base_url();?>backend/configuraciones/Controller_tienda/buscar_inventario', {tomo}, function(data) {
            $("#mostrar_btomo").html(data);
        });
    }


</script>