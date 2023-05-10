        <!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Section Start -->
            <div style="background-image: url(<?= base_url();?>assets/img_portada/banner-6.jpg);" class="rs-breadcrumbs bg-9">
                <div class="container">
                    <div class="content-part text-center">
                        <h1 class="breadcrumbs-title white-color mb-0">TIENDA TECH LAB</h1>
                    </div>
                </div>
            </div>
            <!-- Breadcrumbs Section End -->

            <!-- Shop Section Start -->
            <div class="rs-shop pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">

                                <?php foreach ($listar_servicios_detalle as $value): ?>
                                        <div class="col-lg-4 col-sm-6 mb-73 md-mb-43">
                                            <div class="product-list">
                                                <div class="image-product">
                                                    <img src="<?= base_url();?>assets/img_tienda/<?php echo $value->servicio_servicio ?>" alt="">
                                                    <div class="overley">
                                                        <a href="<?= base_url(Hasher::make(190,$value->servicio_id)); ?>"><i class="flaticon-shopping-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content-desc text-center">
                                                    <h2 class="loop-product-title pt-19"><?php echo $value->servicio_titulo ?></h2>
                                                    <span class="price"><del><?php echo $value->servicio_descripcion ?> $ </del><?php echo $value->servicio_descripcion ?> $ </span>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach ?>


                            </div>
                        </div>
                        <div class="col-lg-4 pl-35 md-pl-15 md-mb-40 md-order-first">
                            <div class="sidebar-grid sidebar-categories shadow mb-50">
                                <div class="sidebar-title">
                                   <h3 class="title semi-bold mb-20">Categorias</h3>
                                </div>
                                <ul> 
                                <?php foreach ($categoria as $value): ?>
                                    <li><a href="<?= base_url(Hasher::make(189,$value->categoria_id)); ?>"><?php echo $value->categoria_nombre ?></a></li> 
                                <?php endforeach ?>                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Section End -->
        </div> 
        <!-- Main content End -->