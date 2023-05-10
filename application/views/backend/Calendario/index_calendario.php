<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Mi Calendario:: Ing. Urian Viera</title>
		<link rel="stylesheet" href="">
		<link href='<?= base_url();?>assets/tech/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
		<link href="<?= base_url();?>assets/tech/fullcalendar/home.css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');?>  


	<div class="mt-5"></div>

	<div class="container">
		<div class="row">
			<div class="col msjs">
			<?php
				// include('msjs.php');
			?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center" id="title">Calendario de Eventos</h3>
			</div>
		</div>
	</div>



	<div id="calendar"></div>

	<div class="modal" id="modalUpdateEvento"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header" style="background: #071892;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
					<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h4 class="modal-title"><strong style="color:#fff;"> MODIFICAR EVENTO</strong></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<form name="formEventoUpdate" action='<?= base_url();?>backend/calendario/Controller_calendario/modificarevento' id="formEventoUpdate" class="col-lg-12" method="post" enctype="multipart/form-data">
							<input type="hidden" class="form-control" name="idEvento" id="idEvento">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
									<input type="text" class="form-control" name="evento" id="evento" placeholder="Nombre del Evento" required/>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
									<input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label for="fecha_fin" class="col-sm-12 control-label">Fecha Final</label>
									<input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
								</div>
							</div>

							<div class="col-md-12 activado">
								<input type="radio" name="color_evento" id="orangeUpd" value="#FF5722" checked>
								<label for="orangeUpd" class="circu" style="background-color: #FF5722;"> </label>

								<input type="radio" name="color_evento" id="amberUpd" value="#FFC107">  
								<label for="amberUpd" class="circu" style="background-color: #FFC107;"> </label>

								<input type="radio" name="color_evento" id="limeUpd" value="#8BC34A">  
								<label for="limeUpd" class="circu" style="background-color: #8BC34A;"> </label>

								<input type="radio" name="color_evento" id="tealUpd" value="#009688">  
								<label for="tealUpd" class="circu" style="background-color: #009688;"> </label>

								<input type="radio" name="color_evento" id="blueUpd" value="#2196F3">  
								<label for="blueUpd" class="circu" style="background-color: #2196F3;"> </label>

								<input type="radio" name="color_evento" id="indigoUpd" value="#9c27b0">  
								<label for="indigoUpd" class="circu" style="background-color: #9c27b0;"> </label>
							</div>
							
							<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> MODIFICAR DATOS</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="exampleModal"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header" style="background: #071892;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
					<button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR EVENTO</strong></h4>
				</div>
				<div class="modal-body">
	                <div class="row">
						<form id="formEvento" action='<?= base_url();?>backend/calendario/Controller_calendario/guardarevento' class="col-lg-12" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-md-12 col-sm-12">
									<label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
									<input type="text" class="form-control" name="evento" id="evento" placeholder="Nombre del Evento" required/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-sm-12">
									<label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
									<input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-sm-12">
									<label for="fecha_fin" class="col-sm-12 control-label">Fecha Final</label>
									<input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
								</div>
							</div>
							
							<div class="col-md-12" id="grupoRadio">
								
								<input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
								<label for="orange" class="circu" style="background-color: #FF5722;"> </label>
								
								<input type="radio" name="color_evento" id="amber" value="#FFC107">  
								<label for="amber" class="circu" style="background-color: #FFC107;"> </label>
								
								<input type="radio" name="color_evento" id="lime" value="#8BC34A">  
								<label for="lime" class="circu" style="background-color: #8BC34A;"> </label>
								
								<input type="radio" name="color_evento" id="teal" value="#009688">  
								<label for="teal" class="circu" style="background-color: #009688;"> </label>
								
								<input type="radio" name="color_evento" id="blue" value="#2196F3">  
								<label for="blue" class="circu" style="background-color: #2196F3;"> </label>
								
								<input type="radio" name="color_evento" id="indigo" value="#9c27b0">  
								<label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>
							</div>
							<button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR EVENTO</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src='<?= base_url();?>assets/tech/fullcalendar/popper.min.js'></script>
	<script src='<?= base_url();?>assets/tech/fullcalendar/lib/moment.min.js'></script>
	<script src='<?= base_url();?>assets/tech/fullcalendar/lib/jquery.min.js'></script>
	<script src='<?= base_url();?>assets/tech/fullcalendar/fullcalendar.min.js'></script>
	<script src='<?= base_url();?>assets/tech/fullcalendar/locale/es.js'></script>

	<script type="text/javascript">

		// $("#formevento").submit(function(event) {
		// 	var formData=new FormData($("#formevento")[0]);
		// 	$.ajax({
		// 		url:'<?php echo base_url(Hasher::make(201));?>',
		// 		type:'POST',
		// 		data:formData,
		// 		cache:false,
		// 		processData:false,
		// 		contentType:false,
		// 		success:function(){ 
		// 			swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
		// 			// setTimeout(function(){
		// 			// 	window.location='<?php echo base_url(Hasher::make(200)); ?>';
		// 			// 	location.reload(true);
		// 			// },1000);
		// 		} 
		// 	});       
		// 	return false;
		// });

		$(document).ready(function() {
			$("#calendar").fullCalendar({
				header: {
				left: "prev,next today",
				center: "title",
				right: "month,agendaWeek,agendaDay"
				},

				locale: 'es',
				defaultView: "month",
				navLinks: true, 
				editable: true,
				eventLimit: true, 
				selectable: true,
				selectHelper: false,

				//Nuevo Evento
				select: function(start, end){
					$("#exampleModal").modal();
					$("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
					
					var valorFechaFin = end.format("DD-MM-YYYY");
					var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
					$('input[name=fecha_fin]').val(F_final);  

				},
				
				events: [
					<?php 
						foreach($listar_calendario as $dataEvento):?>
							{
							_id: '<?= $dataEvento->id ?>',
							title: '<?= $dataEvento->evento ?>',
							start: '<?= $dataEvento->fecha_inicio ?>',
							end:   '<?= $dataEvento->fecha_fin ?>',
							color: '<?= $dataEvento->color_evento ?>'
							},
						   
						  <?php endforeach; ?>

					],


				//Eliminar Evento
				eventRender: function(event, element) {
					element
						.find(".fc-content")
						.prepend("<span id='btnCerrar' class='closeon fa fa-times'></span>");
					
					//Eliminar evento
					element.find(".closeon").on("click", function() {

						var pregunta = confirm("Deseas Borrar este Evento?");   
						if (pregunta) {

						$("#calendar").fullCalendar("removeEvents", event._id);

						$.ajax({
							type: "POST",
							url: '<?php echo base_url()?>backend/calendario/Controller_calendario/deleteEvento',
							data: {id:event._id},
							success: function(datos){
								$(".alert-danger").show();

								setTimeout(function () {
								$(".alert-danger").slideUp(500);
								}, 3000); 

							}
						});
						}
					});
				},

				//Moviendo Evento Drag - Drop
				eventDrop: function (event, delta) {
					var idEvento = event._id;
					var start = (event.start.format('DD-MM-YYYY'));
					var end = (event.end.format("DD-MM-YYYY"));

					$.ajax({
						type: "POST",
						url : '<?php echo base_url()?>backend/calendario/Controller_calendario/drag_drop_evento',
						data : {
							start : start, 
							end : end, 
							idEvento : idEvento,
						},
						success: function (datos) {
							$(".alert-danger").show();
							setTimeout(function () {
							$(".alert-danger").slideUp(500);
							}, 3000); 
						}
					});
				},

				//Modificar Evento del Calendario 
				eventClick:function(event){
					var idEvento = event._id;
					$('input[name=idEvento]').val(idEvento);
					$('input[name=evento]').val(event.title);
					$('input[name=fecha_inicio]').val(event.start.format('DD-MM-YYYY'));
					// $('input[name=color_evento]').val(event.color);
					
					var valorFechaFin = event.end.format("DD-MM-YYYY");
					var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
					$('input[name=fecha_fin]').val(F_final);  

					$("#modalUpdateEvento").modal();
				},
			});

			//Oculta mensajes de Notificacion
			setTimeout(function () {
				$(".alert").slideUp(300);
			}, 3000); 

		});


		
	</script>



</body>
</html>
