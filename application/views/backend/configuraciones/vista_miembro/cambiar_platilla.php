
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
  $datos=$this->db->query("SELECT * FROM tech_platilla_membresia WHERE plantilla_id='$id' ")->row();
 ?>
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page" >CAMBIAR PLANTILLA</li>
            </ol>
        </nav>
    </div>
    
</div>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                   <center> <h2 class="fer_texto mg-b-0 mt-2" align="center">CAMBIAR PLANTILLA DE MEMBRESIA</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="row">
             <form  id="guardar_editar" class="col-lg-12" method="post" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">CAMBIAR PLANTILLA DE MEMBRESIA<span class="tx-danger">*</span></label> 
                        <div class="input-group mb-3 margin-bottom-15">
                             <input  type="file" name="imagen" id="nuevaFoto"
                             data-default-file="<?php echo base_url();?>assets/certificados/<?php echo $datos->plantilla_imagen?>" class="form-control dropify nuevaFoto" accept=".jpeg, .jpg" value="" >
                             <span id="error_img"></span>
                        </div>  
                    </div>    
                </div>
                <div class="card"></div>

                <input type="hidden" name="imagen_ant" value="<?php echo $datos->plantilla_imagen?>">
                <input type="hidden" name="id" value="<?php echo $datos->plantilla_id ?>">
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
  event.preventDefault();
 $('#loading').modal({backdrop: 'static', keyboard: false});
  var formData=new FormData($("#guardar_editar")[0]);
  $('#loading').modal({backdrop: 'static', keyboard: false});
  $.ajax({
      url:'<?php echo base_url(Hasher::make(103));?>',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
        setTimeout(function(){
             window.location='<?php echo base_url(Hasher::make(90)); ?>';
        },1000);
      } 
  });       
});

</script>