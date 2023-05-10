      <!-- Main content Start -->

        <div class="main-content">

            <!-- Breadcrumbs Section Start -->

            <div style="background-image: url(<?= base_url();?>assets/img_portada/banner-6.jpg);" class="rs-breadcrumbs bg-9">

                <div class="container">

                    <div class="content-part text-center">

                        <h1 class="breadcrumbs-title white-color mb-0">SERVICIOS TECH LAB</h1>

                    </div>

                </div>

            </div>



            <!-- Breadcrumbs Section End -->

            <!-- Shop Section Start -->



            <div class="rs-shop pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                        <h3 class="title semi-bold mb-20" style="margin: 0 auto; margin-bottom: 2em;">TODOS LOS SERVICIOS DE TECH</h3> 
                        </div>
                        <div class="courses-main-area relative row" style="padding:0 2em">
                            <?php $count=1; foreach ($listar_servicios as $value): ?>
                                <div class="text-left col-lg-6 col-xs-6" id="courses-section">
                                    <a href="<?= base_url(Hasher::make(193,$value->servicio_id)); ?>"><i class="flaticon-shopping-bag"></i>
                                        <div class="f-card f-course-with-avatar overflow-hidden">
                                            <div class="avatar-container relative f-padding-x-intersection" style="background-color:#577fcd;min-height:130px">
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

                                </div>

                            <?php endforeach ?> 

                        </div>

                    </div>

                </div>

            </div>

            <!-- Shop Section End -->

        </div> 



        <!-- Main content End -->