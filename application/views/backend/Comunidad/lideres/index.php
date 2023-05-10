<?php



defined('BASEPATH') OR exit('No direct script access allowed');?>  



<div class="breadcrumb-header justify-content-between">

    <div>

        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="#">INICIO</a></li>

                <li class="breadcrumb-item active" aria-current="page">ADMINISTRACION LIDERES</li>

            </ol>

        </nav>

    </div>

    

</div>



<div class="row row-sm" >

    <div class="col-xl-12">

        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">

            <div class="card-header pb-0">

                 <center>   <h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE LIDERES TECH LAB BOLIVIA</h2></center>

                    <br>

                <div class="d-flex justify-content-between">

                    <i class="mdi mdi-dots-horizontal text-gray"></i>

                </div>

            </div>

            <div class="card-body">

                <button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-outline-primary btn-lg" ><i class="fa fa-plus"></i> ADICIONAR LIDER</button>

                

                <br>

                <div class="table-responsive">

                    <table class="table text-md-nowrap" id="example2">

                        <thead>

                            <tr class="thead_fer" >

                                <th>#</th>

                                <th>NOMBRE</th>

                                <th>IMAGEN</th>

                                <th>FACEBOOK</th>

                                <th>ESTADO</th>

                                <th>ACCION</th>

                            </tr>

                        </thead>

                        <tbody>

                       <?php $cont=1; foreach ($listar_lideres as  $value): ?> 

                  

                             <tr>

                               <td><?php echo $cont++; ?></td>

                               <td><?php echo $value->lideres_nombre?></td>

                               <td><img src="<?php echo base_url();?>assets/img_lideres/<?php echo $value->lideres_foto ?>" style="width: 20%;"></td> 

                                <td><a href="<?php echo $value->lideres_facebook ?>" target="_black"><?php echo $value->lideres_facebook?></a> </td>

                                <td>

                                        <?php if($value->lideres_estado=='1'){ ?>

                                            <div class="form-block">

                                                <input type="checkbox" class="iswitch iswitch-md iswitch-success" checked onclick="cambiar_estado('<?php echo $value->lideres_id ?>','<?php echo $value->lideres_estado ?>')">

                                            </div> Activo

                                        <?php }else{ ?>

                                            <div class="form-block">

                                                <input type="checkbox" class="iswitch iswitch-md iswitch-success" onclick="cambiar_estado('<?php echo $value->lideres_id ?>','<?php echo $value->lideres_estado ?>')">

                                            </div> Inactivo

                                        <?php  } ?>

                                    </td>                                

                                  <td>



                                    <a class="btn btn-outline-primary" href="<?php echo base_url(Hasher::make(36,$value->lideres_id))?>" ><span class="fa fa-pen"></span> EDITAR</a> 

                                    <button class="btn btn-outline-primary" onclick="eliminar('<?php echo $value->lideres_id ?>','<?php echo $value->lideres_foto ?>')">ELIMINAR</button>

                             

                                </td>

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

        <h4 class="modal-title"><strong style="color:#fff;"> ADICIONAR LIDERES</strong></h4>

      </div>

      <div class="modal-body">

        <div class="row">

             <form  id="guardar" class="col-lg-12" method="post" enctype="multipart/form-data">

                <div class="col-md-12 col-sm-12">

                    <div class="form-group mg-b-0">

                        <label class="form-label">NOMBRE <span class="tx-danger">*</span></label>

                        <input class="form-control " name="nombre" placeholder="Introduzca el nombre...." required="" type="text">

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="form-group">

                        <label class="form-label">FOTO: </label> 

                        <div class="input-group mb-3 margin-bottom-15">

                             <input type="file" name="imagen" id="nuevaFoto" class="form-control dropify nuevaFoto" accept="image/png, .jpeg, .jpg" >

                             <span id="error_img"></span>

                        </div>  

                    </div>    

                </div>

                <div class="col-lg-12">

                    <div class="form-group">

                      <label class="form-label">ENLACE FACEBOOK:</label> 

                        <div class="input-group mb-3">

                          <input type="text" required="" name="enlace"  class="form-control"  placeholder="Introduce link..." >

                        </div>

                    </div>

                </div>

                

                <div class="col-lg-12">

                    <div class="form-group">

                        <label class="form-label">DESCRIPCION: </label> 

                        <div class="input-group mb-3 margin-bottom-15">

                          <textarea  class="form-control" name="descripcion"></textarea>

                        </div>  

                    </div>    

                </div>

                <input type="hidden" name="tipo" value="EXTERNO">

                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>

          </form>

        </div>

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





  $("#guardar").submit(function(event) {

    event.preventDefault();

   $('#loading').modal({backdrop: 'static', keyboard: false});

    

    var formData=new FormData($("#guardar")[0]);

    $('#loading').modal({backdrop: 'static', keyboard: false});

    $.ajax({

        url:'<?php echo base_url(Hasher::make(35));?>',

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



    //eliminar

    function eliminar(id,imagen){

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

    function cambiar_estado(id,estado){

	    $.post('<?php echo base_url(Hasher::make(38)); ?>', {id,estado}, function() {

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