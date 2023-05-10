<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN CARRERA MIEMBRO</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <center><h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE CARRERA MIEMBRO TECH LAB BOLIVIA</h2></center>
                <br>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-outline-primary btn-lg" ><i class="fa fa-plus"></i> ADICIONAR </button>
                <br>
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr class="thead_fer" >
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $cont=1; foreach ($listar_miembro_carrera as $value): ?>
                              <tr>
                                <th><?= $cont++; ?></th>
                                <th><?= $value->carrera_nombre ?></th>
                                <th><?php if($value->carrera_estado=='1'){ ?>
                                    <div class="form-block">
                                        <input type="checkbox" class="iswitch iswitch-md iswitch-success" checked onclick="cambiar_estado_miembro_carrera('<?= $value->carrera_id ?>','<?= $value->carrera_estado?>')">
                                    </div> Activo
                                <?php }else{ ?>
                                    <div class="form-block">
                                        <input type="checkbox" class="iswitch iswitch-md iswitch-success" onclick="cambiar_estado_miembro_carrera('<?= $value->carrera_id ?>','<?= $value->carrera_estado ?>')">
                                    </div> Inactivo
                                <?php  } ?></th>
                                <th></th>
                             </tr>
                          <?php endforeach ?> 
                             
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
</div> 
    
<!-- MODAL ADICIONAR -->
<div class="modal" id="modal-add"  data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header" style="background: #071892;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR A CATEGORIA MIEMBRO</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
             <form  id="guardar_carrera_miembro" class="col-lg-12" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mg-b-0">
                        <label class="form-label">NOMBRE <span class="tx-danger">*</span></label>
                        <input class="form-control" name="nombre_carrera" placeholder="Introduzca el nombre...." required="" type="text">
                    </div>
                </div>
                <div class="card"></div>

              <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  


<script type="text/javascript">
  $("#guardar_carrera_miembro").submit(function(event) {

    event.preventDefault();
   $('#loading').modal({backdrop: 'static', keyboard: false});
    
    var formData=new FormData($("#guardar_carrera_miembro")[0]);
    $('#loading').modal({backdrop: 'static', keyboard: false});
    $.ajax({
        url:'<?php echo base_url(Hasher::make(95));?>',
        type:'POST',
        data:formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function(){ 
          swal("NOTA!", "EXITOSAMENTE GUARDADO LOS DATOS", "success");
          setTimeout(function(){
               window.location='';
          },1000);
        } 
    });       
  });
        //CAMBIAR ESTADO
    function cambiar_estado_miembro_carrera(id,estado){
        $.post('<?php echo base_url(Hasher::make(99)); ?>', {id,estado}, function() {
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
</script>