<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

		<?php $cont=1; foreach ($listar_portada as $value): ?>


			<?php if($cont == 1  ) {?>
				<div class="carousel-item active">
					<div class="container">
						<div class="row p-5">
							<div class="mx-auto col-md-8 col-lg-6 order-lg-last">
								<img class="img-fluid" src="<?php echo base_url();?>assets/img_portada/<?php echo $value->portada_imagen?>" alt="">
							</div>
							<div class="col-lg-6 mb-0 d-flex align-items-center">
								<div class="text-align-left align-self-center">
									<h2 class="h1 text-success"><?php echo $value->portada_titulo?> </h2>
									<h3 class="h2"><?php echo $value->portada_subtitulo?> </h3>
									<p>
										productos con tela de alta calidad.SERT empresa de textiles
										<a rel="sponsored" class="text-success" href="https://sert.com" target="_blank">Agregar a carrito</a>.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php }else{ ?>

					<div class="carousel-item">
						<div class="container">
							<div class="row p-5">
								<div class="mx-auto col-md-8 col-lg-6 order-lg-last">
									<img class="img-fluid" src="<?php echo base_url();?>assets/img_portada/<?php echo $value->portada_imagen?>" alt="">
								</div>
								<div class="col-lg-6 mb-0 d-flex align-items-center">
									<div class="text-align-left align-self-center">
										<h2 class="h1 text-success"><?php echo $value->portada_titulo?> </h2>
										<h3 class="h2"><?php echo $value->portada_subtitulo?> </h3>
										<p>
										productos con tela de alta calidad.SERT empresa de textiles
											<a rel="sponsored" class="text-success" href="https://templatemo.com" target="_blank">Agregar a carrito</a>.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

			<?php }?>
			
		<?php $cont++; endforeach ?> 

    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Nuestras categorias</h1>
            <p>En este apartado puedes ver nuestros productos organizados en un formato de catalogo de productos</p>
        </div>
    </div>
    <div class="row">
	
		<?php $count=1; foreach ($listar_categoria as $value): ?>
			<div class="col-12 col-md-4 mt-3">
				<!-- <a href="#"><img src="./assets/img/estuche-1.png" class="rounded-circle img-fluid border"></a> -->
				<h2 class="h5 text-center mt-3 mb-3"><?= $value->categoria_nombre ?></h2>
				<p class="text-center">
					<a href="<?php echo base_url(Hasher::make(101,$value->categoria_id ))?>" class="btn btn-success">Ir a categoria</a>
				</p>
			</div>
		<?php endforeach ?> 

    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->

<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestros productos mas pedidos</h1>
                <p>
                    Te presentamos nuestros productos estrellas mas pedidos y vendidos en nuestra plataforma web.
                </p>
            </div>
        </div>
        <div class="row">

			<?php $count=1; foreach ($listar_producto as $value): ?>

				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="<?php echo base_url(Hasher::make(61,$value->producto_id))?>">
							<img src="<?php echo base_url();?>assets/img_producto/<?php echo $value->producto_imagen; ?>" class="card-img-top" alt="...">
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								<li>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-muted fa fa-star"></i>
								</li>
								<li class="text-muted text-right">s. <?= $value->producto_costo ?></li>
							</ul>
							<a href="<?php echo base_url(Hasher::make(61,$value->producto_id))?>" class="h2 text-decoration-none text-dark"><?= $value->producto_titulo ?></a>
							<p class="card-text">
							<?= $value->producto_descripcion ?>
							</p>
							<p class="text-muted">Pedidos (1230)</p>
						</div>
					</div>
				</div>
			<?php endforeach ?> 


        </div>
    </div>
</section>

<!-- End Featured Product -->