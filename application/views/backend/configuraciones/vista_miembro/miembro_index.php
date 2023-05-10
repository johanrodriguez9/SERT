<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">ADMINISTRACIÓN DE MIEMBROS</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <center><h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE LOS MIEMBROS DE TECH LAB BOLIVIA</h2></center>
                <br>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <a class="btn btn-outline-primary btn-lg" href="<?php echo base_url(Hasher::make(91))?>" ><i class="fa fa-plus"></i> ADICIONAR </a>
                <a class="btn btn-outline-primary btn-lg" href="<?php echo base_url(Hasher::make(102,1))?>" ><span class="fa fa-pen"></span> CAMBIAR PLANTILLA</a>

                <br>
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr class="thead_fer" >
                                <th>#</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>CORREO</th>
                                <th>CELULAR</th>
                                <th>CURRICULUM VITAE</th>
                                <th>PAIS</th>
                                <th>DEPARTAMENTO</th>
                                <th>CIUDAD</th>
                                <th>CARRERA</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $cont=1; foreach ($listar_miembro as $value): ?>
                              <tr>
                                <th><?= $cont++; ?></th>
                                <th><?= $value->miembro_nombres; ?></th>
                                <th><?= $value->miembro_apellidos; ?></th>
                                <th><?= $value->miembro_correo; ?></th>
                                <th><?= $value->miembro_celular; ?></th>
                                <th><a target="_black" href="<?= base_url(); ?>assets/doc_curriculum/<?= $value->miembro_documento ?>">VER INVESTIGACION</a></th>
                                <th><?= $value->miembro_pais; ?></th>
                                <th><?= $value->miembro_departamento; ?></th>
                                <th><?= $value->miembro_ciudad; ?></th>
                                <th><?= $value->carrera_nombre; ?></th>
                                <th><?php if($value->miembro_estado=='1'){ ?>
                                    <div class="form-block">
                                        <input type="checkbox" class="iswitch iswitch-md iswitch-success" checked onclick="cambiar_estado_miembro('<?= $value->miembro_id ?>','<?= $value->miembro_estado?>')">
                                    </div> Aceptado
                                <?php }else{ ?>
                                    <div class="form-block">
                                        <input type="checkbox" class="iswitch iswitch-md iswitch-success" onclick="cambiar_estado_miembro('<?= $value->miembro_id ?>','<?= $value->miembro_estado ?>')">
                                    </div> Negado
                                <?php  } ?></th>
                                <th><button type="button" onclick="editar_fecha('<?php echo $value->miembro_id; ?>')" class="btn btn-outline-primary btn-lg">CAMBIAR FECHA</button></th>
                          <?php endforeach ?> 
                             
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
</div> 



<div class="modal" id="modal-editar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal_fer" style="background: blue;">
          <button type="button"  class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
          <h4 class="modal-title text-center"><strong style="color:#fff;">AGREGAR MODIFICAR GRUPO</strong> </h4>
        </div>
            <div class="modal-body" id="contenido_editar">
          
            </div>
      </div>
    </div>
</div>
<script type="text/javascript">
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
        //CAMBIAR ESTADO
    function cambiar_estado_miembro(id,estado){
        $.post('<?php echo base_url(Hasher::make(93)); ?>', {id,estado}, function() {
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


    function editar_fecha(id){
  $("#modal-editar").modal('show');
  $.post('<?php echo base_url(Hasher::make(104)); ?>', {id}, function(data) {
    $("#contenido_editar").html(data)
  });
}
</script>