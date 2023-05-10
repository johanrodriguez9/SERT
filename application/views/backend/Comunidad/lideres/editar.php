
<?php

defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
  $tabla='tech_lideres';
  $idtabla='lideres_id';
  $datos=$this->Modelo_configuracion->tabla_row($tabla,$idtabla,$id);  
 ?>
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
                <!-- <li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url(Hasher::make(271))?>">ADMIN VIDEOS</li> -->
                <li class="breadcrumb-item active" aria-current="page" >EDITAR LIDER</li>
            </ol>
        </nav>
    </div>
    
</div>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                   <center> <h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACION DE LIDERES</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
                <div class="modal-body">
                   <form id="guardar_editar" method="post">
                          <div class="row">
                            <div class="col-lg-6 col-md-12">
                             <div class="col-md-12 col-sm-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">NOMBRE <span class="tx-danger">*</span></label>
                                    <input class="form-control " name="nombre" placeholder="Introduzca el nombre...." value="<?php echo $datos->lideres_nombre ?>" required="" type="text">
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label class="form-label">ENLACE FACEBOOK:</label> 
                                    <div class="input-group mb-3">
                                      <input type="text" required="" name="enlace"  class="form-control" value="<?php echo $datos->lideres_facebook ?>"  placeholder="Introduce link..." >
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                  <label class="form-label">IMAGEN: </label> 
                                  <div class="input-group mb-3 margin-bottom-15">
                                       <input type="file" name="image" id="nuevaFoto"  data-default-file="<?php echo base_url();?>assets/img_lideres/<?php echo $datos->lideres_foto?>" class="form-control dropify nuevaFoto" accept="image/png, .jpeg, .jpg" >
                                       <span id="error_img"></span>
                                  </div>  
                              </div>    
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label class="form-label">DESCRIPCION: </label> 
                                  <div class="input-group mb-3 margin-bottom-15">
                                    <textarea  class="form-control" name="descripcion"><?php echo $datos->lideres_descripcion ?></textarea>
                                  </div>  
                              </div>    
                          </div>

                             
                                 
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="imagen_ant" value="<?php echo $datos->lideres_foto?>">
                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>

          </form> 
         
          </div>
      </div>
  </div> 
</div> 


<script type="text/javascript">

$(".nuevaFoto").change(function(){
  var imagen=this.files[0];
  if (imagen["type"]!="image/jpeg" && 
    imagen["type"]!="image/png" && 
    imagen["type"]!="image/gif" && 
    imagen["type"]!="image/jpg") {
    $(".nuevaFoto").val('');
  $("#error_img").html('<b style="color:#ff0000;">Formato invalido...</b>');
  }else{
    if(imagen['size']>2000000){
      $(".nuevaFoto").val('');
      $("#error_img").html('<b style="color:#ff0000;">Imagen exede de 2 Mg...</b>');
    }else{
      $("#error_img").html('');
    }
  }
});


$("#guardar_editar").submit(function(event) {
   alert('holaaaa');
  event.preventDefault();
 $('#loading').modal({backdrop: 'static', keyboard: false});

  var formData=new FormData($("#guardar_editar")[0]);
  $('#loading').modal({backdrop: 'static', keyboard: false});
  $.ajax({
      url:'<?php echo base_url(Hasher::make(39));?>',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
        setTimeout(function(){
             window.location='<?php echo base_url(Hasher::make(34)); ?>';
        },1000);
      } 
  });       
});

</script>