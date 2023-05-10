<?php $id=$this->session->userdata('user_id');
$obj=$this->db->query("SELECT * FROM dp_auth_users WHERE id='$id' ")->row();
 ?>
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">PERFIL</li>
            </ol>
        </nav>
    </div>
    
</div>
<!-- /breadcrumb -->
          <!-- row -->
<div class="row row-sm">
  <div class="col-lg-4">
    <div class="card mg-b-20">
      <div class="card-body">
        <div class="pl-0">
          <div class="main-profile-overview">
            <div class="main-img-user profile-user">
              <?php if($obj->imagen){ ?>
                  <img src="<?php echo base_url();?>assets/file_usuario/<?php echo $obj->imagen; ?>" alt="image"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"   data-toggle="modal" data-target="#modal-basic"></a>
              <?php }else{ ?>
                  <img src="<?php echo base_url();?>assets/alert/no-image.png" alt="image"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"   data-toggle="modal" data-target="#modal-basic"></a>
              <?php } ?>
            </div>
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="main-profile-name"><?php echo $obj->first_name.' '.$obj->last_name ?></h5>
              </div>
            </div>
            
           
            <hr class="mg-y-30">
            
          </div><!-- main-profile-overview -->
        </div>
      </div>
    </div>
    <div class="card mg-b-20">
      <div class="card-body">
        <div class="main-content-label tx-13 mg-b-25">
          Conatct
        </div>
        <div class="main-profile-contact-list">
          <div class="media">
            <a href="<?php echo base_url(Hasher::make(20))?>" class="btn btn-outline-secondary btn-block"><i class="typcn typcn-arrow-back-outline"></i> SALIR
          </a>
          </div><hr>
          <button type="button" class="btn btn-outline-secondary btn-block"  data-toggle="modal" data-target="#modal-basic">IMAGEN PERFIL</button>

          
       
        </div><!-- main-profile-contact-list -->
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="main-content-body main-content-body-profile">
      
      <div class="main-profile-body p-0">
        <div class="row row-sm">
          <div class="col-12">
            <div class="card mg-b-20">
              <div class="card-body">
                <div class="card-header">

                  <div class="media">
                      <div class="pull-left">
                          <?php if($obj->imagen){ ?>
                              <img src="<?php echo base_url();?>assets/file_usuario/<?php echo $obj->imagen; ?>" alt="image" class="img-circle">
                          <?php }else{ ?>
                              <img src="<?php echo base_url();?>assets/alert/no-image.png" alt="image" class="img-circle">
                          <?php } ?>
                      </div>
                      <div class="media-body">
                          <h4 class="media-heading">NOMBRES: <small><?php echo $obj->first_name ?></small></h4>
                          <h4 class="media-heading">APELLIDOS: <small><?php echo $obj->last_name ?></small></h4>
                          <h4 class="media-heading">CORREO: <small><?php echo $obj->email ?></small></h4>
                          
                      </div>
                  </div><br>
                  <!-- <button type="button" class="btn blue btn-outline-secondary btn-block"  data-toggle="modal" data-target="#modal-cambiar">CAMBIAR DATOS PERSONALES</button> -->
                </div>
               
                <div class="media mg-t-15 profile-footer row">
                  <div class="col-lg-12 ">
                      <div class="media-body ">
                          <form method="post" id="guardar_nuevo_usuario_pass" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
                              <fieldset class="">
                                  <legend>SEGURIDAD DEL USUARIO : </legend>  
                                  <div class="panel-body">
                                                                        

                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>.:::NUEVO USUARIO:::.</label>
                                          <input type="text" name="name" onkeyup="validar_usuario(this.value)" class="form-control" placeholder="Ingresar usuario..." required>
                                          <span id="error_u_p"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>.:::NUEVO CONTRASEÑA:::.</label>
                                          <input type="password" name="password" class="form-control" placeholder="Ingresar contraseña..." required>
                                        </div>
                                      </div>
                                  </div>
                                  <button type="submit" id="ver_boton" class="btn btn-outline-secondary btn-block">GUARDAR</button>
                              </fieldset>
                          </form>
                      </div>
                  </div>


                 
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div><!-- main-profile-body -->
    </div>
  </div>
</div>








<div class="modal" id="modal-basic" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content ">
      <div class="modal-header modal_fer" >
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;">NUEVO IMAGEN</strong></h4>
      </div>
      <form method="post" id="guardar_imagen_usuario" enctype="multipart/form-data">
            
        <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <label class="form-label">NUEVO IMAGEN PERFIL</label> 
                  <input type="file" name="imagen" class="form-control nuevaFoto" accept="image/png, .jpeg, .jpg, image/gif" required>
                  <span id="error_img"></span>
                  
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="form-label">VISUALIZAR</label> <br>
                    <?php if($obj->imagen){ ?>
                        <img class="visualizar" style="width: 100%" src="<?php echo base_url();?>assets/file_usuario/<?php echo $obj->imagen; ?>">
                    <?php }else{ ?>
                        <img class="visualizar" style="width: 100%" src="<?php echo base_url();?>assets/alert/no-image.png" >
                    <?php } ?>
                </div>
            </div>
            <input type="hidden" name="imagen_a" value="<?php echo $obj->imagen; ?>">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
        </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-outline-secondary btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
      </div>
      </form><hr>
    </div>
  </div>
</div>


<!-- <div class="modal" id="modal-cambiar" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header modal_fer" >
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;">CAMBIAR DATOS PERSONALES</strong></h4>
      </div>
      <form method="post" id="guardar_datos" enctype="multipart/form-data">
            
        <div class="modal-body">

        <div class="col-md-12">
          <div class="form-group">
            <label>.::: NOMBRES :::.</label>
            <input type="text" name="nombres" class="form-control" value="<?php echo $obj->first_name; ?>"  placeholder="Ingresar nombres..." required>
          </div>
        </div>                                      
        <div class="col-md-12">
          <div class="form-group">
            <label>.::: APELLIDOS :::.</label>
            <input type="text" name="apellidos" value="<?php echo $obj->last_name; ?>" class="form-control" placeholder="Ingresar apellidos..." required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>.::: CORREO :::.</label>
            <input type="gmail" name="correo" value="<?php echo $obj->email; ?>" class="form-control" placeholder="Ingresar correo..." required>
          </div>
        </div>
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
        </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-outline-secondary btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
      </div>
      </form><hr>
    </div>
  </div>
</div> -->

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
            $("#error_img").html('<b style="color:#ff0000;">Imagen exede de 5 mg...</b>');
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
$("#guardar_imagen_usuario").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardar_imagen_usuario")[0]);
  $.ajax({
      url:'<?php echo base_url();?>backend/Dashboard/guardar_imagen_usuario',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal('EXITOSAMENTE GUARDADO LOS DATOS')
          setTimeout(function(){
               window.location='';
          },1000);
      }
  });
});

$("#guardar_datos").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardar_datos")[0]);
  $.ajax({
      url:'<?php echo base_url();?>backend/Dashboard/guardar_nuevo_datos',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal('EXITOSAMENTE GUARDADO LOS DATOS')
          setTimeout(function(){
               window.location='';
          },1000);
      }
  });
});


function validar_usuario(usu){
$.post('<?php echo base_url();?>backend/Dashboard/validar_usuario', {usu}, function(data) {
    var valores = eval(data);
    if (valores[0]===0) {
        document.getElementById('ver_boton').disabled=false;
        $("#error_u_p").html("<b style='color: #008000;'>Usuario no existe</b>");
    }else{
        document.getElementById('ver_boton').disabled=true;
        $("#error_u_p").html("<b style='color: #ff0000;'>Usuario ya existe</b>");
    }
});
}
$("#guardar_nuevo_usuario_pass").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardar_nuevo_usuario_pass")[0]);
  $.ajax({
      url:'<?php echo base_url();?>backend/Dashboard/guardar_nuevo_usuario_pass',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal({
          title: 'NOTA',
          text: 'SEÑOR USUARIO SE REINICIARA EL SISTEMA, PARA CERRAR TODAS LAS SESIONES HABIERTAS DEL SISTEMA',
          type: 'success',
          confirmButtonColor: '#57a94f'
        })
        
        setTimeout(function(){
               window.location='<?php echo base_url(Hasher::make(1))?>';
        },1000);
      }
  });
});
</script>