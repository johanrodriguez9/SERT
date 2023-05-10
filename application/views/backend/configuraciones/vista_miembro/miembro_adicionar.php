
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
      $categorias=$this->Modelo_miembro->listar_categoria_activo();
      $carreras=$this->Modelo_miembro->listar_carrera_activo();
 ?>
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page" >ADICIONAR MIEMBRO</li>
            </ol>
        </nav>
    </div>
    
</div>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                   <center> <h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACION DE MIEMBROS</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="row">
            <form  id="guardar_miembro" class="col-lg-12" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">NOMBRES <span class="tx-danger">*</span></label>
                        <input class="form-control " name="nombres" placeholder="Introduzca nombres...." required="" type="text">
                    </div>
                </div>                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">APELLIDOS <span class="tx-danger">*</span></label>
                        <input class="form-control " name="apellidos" placeholder="Introduzca apellidos...." required="" type="text">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">FOTO (FORMAL) <span class="tx-danger">*</span></label> 
                        <div class="input-group mb-3 margin-bottom-15">
                             <input  type="file" name="imagen" id="nuevaFoto" class="form-control dropify nuevaFoto" accept=".jpg"  >
                             <span id="error_img"></span>
                        </div>  
                    </div>    
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">CORREO ELECTRÓNICO<span class="tx-danger">*</span></label>
                        <input class="form-control " name="correo" placeholder="Introduzca Correo electrónico ...." required="" type="gmail">
                    </div>
                </div>                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">NUMERO DE CELULAR <span class="tx-danger">*</span></label>
                        <input class="form-control " name="celular" placeholder="Introduzca el numero de celular ...." required="" type="number">
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">PAIS <span class="tx-danger">*</span></label>
                        <input class="form-control " name="pais" placeholder="Introduzca el pais...." required="" type="text">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">DEPARTAMENTO </label>
                        <input class="form-control " name="departamento" placeholder="Introduzca el departamento ...." type="text">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">CIUDAD <span class="tx-danger">*</span></label>
                        <input class="form-control " name="ciudad" placeholder="Introduzca la ciudad ...." required="" type="text">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">CARRERA: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="profesion">
                          <option></option>
                            <?php foreach ($carreras as $value): ?>
                                <option value="<?php echo $value->carrera_id; ?>"><?php echo $value->carrera_nombre; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">CATEGORIA: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="categoria">
                          <option></option>
                            <?php foreach ($categorias as $value): ?>
                                <option value="<?php echo $value->tm_id; ?>"><?php echo $value->tm_titulo; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">CURRICULUM VITAE: <span class="tx-danger">*</span></label>
                    </div>
                </div>
                <center>
                <br>
                <div class="col-md-8">
                <iframe src="" width="100%" class="visualizar" height="450px"></iframe>
                <input type="file" name="documento"  class="form-control btn-outline-primary nuevaFoto5" accept="application/pdf" required>
                </div>
                </center>


              <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
          </form>

        </div>
      </div>
  </div> 
</div> 


<script type="text/javascript">

$(".nuevaFoto5").change(function(){
  var imagen=this.files[0];
  if (imagen["type"]!="application/pdf") {
    $(".nuevaFoto5").val('');
  $("#error_img").html('<b style="color:#ff0000;">Formato invalido...</b>');
  $(".visualizar").attr("src",'<?php echo base_url();?>assets/alert/no-image.png');
  }else{
    if(imagen['size']>5000000){
      $(".nuevaFoto5").val('');
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


$("#guardar_miembro").submit(function(event) {
  event.preventDefault();
 $('#loading').modal({backdrop: 'static', keyboard: false});
  var formData=new FormData($("#guardar_miembro")[0]);
  $('#loading').modal({backdrop: 'static', keyboard: false});
  $.ajax({
      url:'<?php echo base_url(Hasher::make(92));?>',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
        setTimeout(function(){
             window.location='<?php echo base_url(Hasher::make(20)); ?>';
        },1000);
      } 
  });       
});

</script>