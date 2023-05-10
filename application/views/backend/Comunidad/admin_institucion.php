<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>


<!-- LIBREIAS EDITORTXT         -->

<link href="<?php echo base_url(); ?>assets/summernote_editor/summernote.min.css" rel="stylesheet">
<!-- FIN LIBREIAS EDITORTXT         -->

<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">TIENDA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">INSTITUCÍON</a></li>
                <li class="breadcrumb-item active" aria-current="page">ADMIN INSTITUCIÓN</li>
            </ol>
        </nav>
    </div>
    
</div>
<?php $obj=$this->Modelo_comunidad->listar_comunidad(); ?>

<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                   <center> <h2 class="mg-b-0 mt-2" align="center">ADMINISTRACIÓN INFORMACIÓN DE LA TIENDA</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <form id="guardar_comunidad" method="post" data-parsley-validate="">
					<label class="side">DATOS DE LA INSTITUCIÓN</label><br>
                    <div class="row row-sm">

                   <input type="hidden" name="comunidad_id" value="<?php echo $obj->comunidad_id; ?>">
                  	<input type="hidden" name="comunidad_logo" value="<?php echo $obj->comunidad_logo; ?>">
                  		
						<div class="col-md-9 col-sm-12">
							<div class="form-group mg-b-0">
								<label class="form-label">NOMBRE DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
								<input class="form-control nuevaFoto" name="nombre" placeholder="Introduzca el nombre de la comunidad...." required="" type="text" value="<?php echo $obj->comunidad_nombre?>">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label  class="form-label">LOGO DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
								<input type="file" class="dropify nuevaFoto" data-default-file="<?php echo base_url();?>assets/img_comunidad/<?php echo $obj->comunidad_logo?>" data-height="150" name="imagen" required="" accept=".jpg, .jpeg, .gif, .PNG"/>

							</div>
						</div>                                        
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label">DESCRIPCION DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
	                            <textarea id="summernote" style="margin-top: 30px; width: 100%; height: 300px; border: #34495e 6px solid;" name="descripcion" required>
			                        <?php echo $obj->comunidad_descripcion?>
			                      </textarea>
		                    </div>
	                    
	                    </div>
	                 
	                    <br>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label">MISIÓN DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
	                            <textarea id="summernote3" name="mision" style="margin-top: 30px; width: 100%; height: 300px; border: #34495e 6px solid;" class="form-control" required placeholder="Ingresar misiòn..."><?php echo $obj->comunidad_mision?></textarea>	   
	                        </div>
	                    </div>
	                    <br>
	                     <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label">VISIÓN DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
	                            <textarea id="summernote4" name="vision" style="margin-top: 30px; width: 100%; height: 300px; border: #34495e 6px solid;" class="form-control" required placeholder="Ingresar comunidad..."><?php echo $obj->comunidad_vision?></textarea>	   
	                                                
	                        </div>
	                    </div>
	                    <br>
	                
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label">OBJETIVO DE LA COMUNIDAD: <span class="tx-danger">*</span></label>
	                             <textarea id="summernote5" class="form-control"  style="margin-top: 30px; width: 100%; height: 300px; border: #34495e 6px solid;"  name="objetivo" placeholder="Ingresar objetivo de la comunidad..." required="" type="text"><?php echo $obj->comunidad_objetivo?></textarea>	                             
	                        </div>
	                    </div>
                       <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">TELEFONO 1: <span class="tx-danger">*</span></label>
                             <input class="form-control" maxlength="8" name="telefono1" placeholder="Ingresar telefono 1..." required="" type="text" value="<?php echo $obj->comunidad_telefono1?>">
                        </div>
                   		</div>
	                    <div class="col-6">
	                        <div class="form-group">
	                            <label class="form-label">TELEFONO 2: <span class="tx-danger">*</span></label>
	                             <input class="form-control"  maxlength="8" name="telefono2" placeholder="Ingresar telefono 2..." required="" type="text" value="<?php echo $obj->comunidad_telefono2?>">
	                        </div>
	                    </div>
	                    <div class="col-6">
	                        <div class="form-group">
	                            <label class="form-label">CORREO : <span class="tx-danger">*</span></label>
	                             <input type="email"  class="form-control" name="correo" placeholder="Ingresar correo 1..." required="" value="<?php echo $obj->comunidad_correo?>">
	                        </div>
	                    </div>
	                 
	                 
	                    <div class="col-4">
	                        <div class="form-group">
	                            <label class="form-label">FACEBOOK: <span class="tx-danger">*</span></label>
	                             <input class="form-control" name="facebook" placeholder="Ingresar facebook..." required="" type="text" value="<?php echo $obj->comunidad_facebook?>">
	                        </div>
	                    </div>
	                    <div class="col-4">
	                        <div class="form-group">
	                            <label class="form-label">YOUTUBE: <span class="tx-danger">*</span></label>
	                             <input class="form-control" name="youtube" placeholder="Ingresar enlace del canal youtube..." required="" type="text" value="<?php echo $obj->comunidad_youtube?>">
	                        </div>
	                    </div>
	                    <div class="col-4">
	                        <div class="form-group">
	                            <label class="form-label">TWITTER: <span class="tx-danger">*</span></label>
	                             <input class="form-control" name="twiter" placeholder="Ingresar twiter..." required="" type="text" value="<?php echo $obj->comunidad_twiter?>">
	                        </div>
	                    </div>	                   
                    						
	                    <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label">UBICACIÓN/DIRECCIÓN: <span class="tx-danger">*</span></label>
	                             <input class="form-control" name="direccion" placeholder="Enter firstname"  type="text" value="<?php echo $obj->comunidad_direccion?>" required>
	                        </div>
	                    </div>                                    
<!-- 	                    <div class="col-12">
	                        <div class="form-group">
	                            <label class="form-label main-content-label mg-b-5">API GOOGLE MAP: <span class="tx-danger">*</span></label>
	                             <input class="form-control" name="api_map" placeholder="api google map" required="" type="text" value="<?php echo $obj->comunidad_api_google_map?>">
	                             <iframe src="<?php echo $obj->comunidad_api_google_map?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" name="visualizar"></iframe>
	                        </div>
	                    </div> -->
						<div class="col-md-12">
						  <button type="submit" class="btn  btn-outline-primary btn-circle  btn-lg btn-block"  style="border-radius: 50px;"><span class="fa fa-save"> </span> GUARDAR</button>                      
                   		</div>
					</div>
				</form>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
</div> 

<script src="<?php echo base_url(); ?>assets/summernote_editor/summernote.min.js"></script>

<script src="<?php echo base_url();?>assets/admin/assets/js/validar.js"></script>
<!-- editor -->
<script type="text/javascript">
  $(document).ready(function() {
  $('#summernote').summernote();
  $('#summernote2').summernote();
  $('#summernote3').summernote();
  $('#summernote4').summernote();
  $('#summernote5').summernote();
})
</script>
<!-- fin editor -->
<script>          
// VISUALIZAR
$(".nuevaFoto").change(function(){
  var imagen=this.files[0];
  if (imagen["type"]!="image/jpeg" && 
    imagen["type"]!="image/png" && 
    imagen["type"]!="image/gif" && 
    imagen["type"]!="image/jpg") {
    $(".nuevaFoto").val('');
  $("#error_img").html('<b style="color:#ff0000;">Formato invalido...</b>');
  $(".visualizar").attr("src",'<?php echo base_url();?>assets/img_comunidad/<?php echo $obj->comunidad_logo?>');
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

$("#guardar_comunidad").submit(function(event) {
  event.preventDefault();
  $('#loading').modal({backdrop: 'static', keyboard: false});
  var formData=new FormData($("#guardar_comunidad")[0]);
  $.ajax({
      url:'<?php echo base_url(Hasher::make(32));?>',
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

