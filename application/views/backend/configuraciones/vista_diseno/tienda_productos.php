  
<br><br><br><br>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <center><h2 class="fer_texto mg-b-0 mt-2" align="center">TIENDA TECH LAB BOLIVIA</h2></center>
                <br>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
        </div><!-- bd -->
    </div>
</div> 



<div class="row row-sm">

					<div class="col-md-12">

						<div class="row row-sm">

							<?php foreach ($listar_tienda as $value): ?>
							<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
								<div class="product-card card">
									<div class="card-body h-100">
<!-- 										<div class="d-flex">
											<span class="text-secondary small text-uppercase">planters</span>
											<span class="ml-auto"><i class="fa fa-heart text-danger"></i></span>
										</div> -->
										<h3 class="h6 mb-2 font-weight-bold text-uppercase"><?php echo $value->tienda_titulo; ?></h3>
										<div class="d-flex">
											<h4 class="h5 w-50 font-weight-bold text-danger"><?php echo $value->tienda_oferta_costo; ?> Bs. <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price"><?php echo $value->tienda_costo; ?> Bs. </span></h4>
										</div>
										<img class="w-100 mt-2 mb-3" src="<?= base_url(); ?>assets/img_tienda/<?= $value->tienda_imagen ?>" alt="product-image"/>

										<a class="btn btn-primary btn-block mb-0"href="<?php echo base_url(Hasher::make(83,$value->tienda_id))?>"><i class="fe fe-shopping-cart mr-1"></i> VER DETALLES</a>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>