<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  

<div class="breadcrumb-header justify-content-between">
    <div class="col-xl-12" style="padding-right: 0;padding-left: 0;">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <center><h2 class="fer_texto mg-b-0 mt-2" align="center">CURSOS TECH LAB BOLIVIA</h2></center>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">SISTEMA DE ADMINISTRACIÓN TECH LAB BOLIVIA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">CURSOS DISPONIBLES</li>
            </ol>
        </nav>
    </div>
</div> -->

<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <!-- <center><h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE CURSOS</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div> -->
            </div>

            <div class="card-body">
                <section class="courses-page-grid">
                    <div class="courses-main-area relative row">
                        <?php $count=1; foreach ($listar_servicios as $value): ?>
                            <?php if($count==4){$count=1;}?>
                            <div class="text-left col-lg-6" id="courses-section<?= $count?>">
                                <a href="#">
                                    <div class="f-card f-course-with-avatar overflow-hidden">
                                        <div class="avatar-container relative f-padding-x-intersection" style="background-color:#577fcd;min-height:130px">
                                            <!-- <div class="absolute avatar-background" style="background-image:url(<?= base_url(); ?>assets/img_cursos/objetos.png);background-color:#f7422b;">
                                            </div> -->
                                            <img class="absolute" src="<?= base_url(); ?>assets/img_servicios/<?= $value->servicio_imagen ?>">                                        
                                        </div>
                                        <div class="f-padding-x-intersection description f-padding-y">
                                            <div class="box full-width text-left">
                                                <div class="app-row" style="margin-top:10px;">
                                                    <div class="col-xs no-padding-no"><div class="box"><p class="bold no-margin"><?= $value->servicio_titulo ?></p>
                                                        <div class="middle-xs" style="column-gap:0px;margin-top: 2px;">
                                                            <div class="circle f-border f-premium-text f-right-space-char" style="background-image:url(<?php echo base_url().'assets/captcha/empresario.png'?>);background-size:cover;background-position:center;width:17px;height:17px;margin:0 auto;border: 1px solid #577fcd"></div>
                                                                <p class="no-margin f-label top-space col-xs text-left">Carlos Conde</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="inline-block hidden-xs f-success-text h6 relative" style="right:6px;">
                                                        <div class="align-icon normal-svg inline-block" style="margin-right:5px;height:1em;top:-3px">
                                                            <svg viewBox="0 -27 480.01846 480" xmlns="http://www.w3.org/2000/svg"><path d="m96 192.007812h21.332031v224h-21.332031zm0 0"></path><path d="m405.332031 426.675781h-405.332031v-245.332031h100.265625l83.601563-158c7.597656-14.402344 22.53125-23.3359375 38.800781-23.3359375 24.265625 0 44 19.7343755 44 43.9999995v105.335938h158.265625c28 0 52 20.933594 54.800781 47.730469.398437 4 .398437 8-.132813 12l-21.335937 170.667969c-3.066406 26.667968-25.867187 46.933593-52.933594 46.933593zm-384-21.332031h384c16.269531 0 29.867188-12.132812 31.734375-28.132812l21.332032-170.800782c.269531-2.269531.269531-4.667968 0-7.199218-1.597657-16-16.398438-28.535157-33.597657-28.535157h-179.46875v-126.667969c0-12.53125-10.132812-22.664062-22.664062-22.664062-8.402344 0-16 4.664062-20 12l-89.601563 169.332031h-91.734375zm0 0"></path></svg>
                                                        </div>
                                                        <span>92%</span>
                                                    </div>
                                                </div>
                                                <div class="top-space h7">
                                                    <p class="no-margin app-descripcion"><?= $value->servicio_descripcion ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <a target="_black" class="add-to-cart btn btn-success" href="https://api.whatsapp.com/send?phone=591<?php echo $value->servicio_referencia; ?>&text=Hola disculpe!! ¿Tiene el servicio libre?">CONTACTAR</a>
                            </div>
                            <?php $count=$count+1; ?> 
                        <?php endforeach ?> 
                    </div>
                </section>

            </div>
            
            <div class="card-footer pb-0">
                <!-- <center><h2 class="fer_texto mg-b-0 mt-2" align="center">ADMINISTRACIÓN DE CURSOS</h2></center>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div> -->
            </div>
        </div>
    </div>
</div> 



<script type="text/javascript">


$('#lista_curso').on('click','.contenidocurso',function(){    
    $('#m-contenido-curso').modal('show');
    $("#idcurso").val($(this).data('id_cursocon'));
    $("#nombrecompleto").val($(this).data('nombreecon'));
});
	  
  
</script>