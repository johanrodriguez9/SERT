<!DOCTYPE html>
<html lang="en">
<head>
    <title>SERT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<link rel="stylesheet" href="<?= base_url();?>assets/tech/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/tech/assets/css/templatemo.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/tech/assets/css/custom.css">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?= base_url();?>assets/tech/assets/css/fontawesome.min.css">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                <img src="<?= base_url();?>assets/img_comunidad/<?php echo $listar_institucion->comunidad_logo; ?>" alt="" style="height: 40px; width: auto;">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url(Hasher::make(3)); ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(Hasher::make(3)); ?>">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(Hasher::make(3)); ?>">Pedido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(Hasher::make(3)); ?>">Contactos</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Buscar ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">3</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= base_url(Hasher::make(8)); ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> -->
                    </a>
                </div>
            </div>
        </div>
    </nav>
	
	<!-- Modal -->
	<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="w-100 pt-1 mb-5 text-right">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" method="get" class="modal-content modal-body border-0 p-0">
				<div class="input-group mb-2">
					<input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar ...">
					<button type="submit" class="input-group-text bg-success text-light">
						<i class="fa fa-fw fa-search text-white"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
	
	<!-- Close Header -->
	<div id="bwp-main" class="bwp-main">
			<?php $this->load->view($contenido) ?>
	</div>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo"><?php echo $listar_institucion->comunidad_nombre; ?></h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
							<?php echo $listar_institucion->comunidad_direccion; ?>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340"><?php echo $listar_institucion->comunidad_telefono1; ?></a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com"><?php echo $listar_institucion->comunidad_correo; ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Servicios</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#"><?php echo $listar_institucion->comunidad_nombre; ?></a></li>
                        <li><a class="text-decoration-none" href="#">Catalogo</a></li>
                        <li><a class="text-decoration-none" href="#">Carrito</a></li>
                        <li><a class="text-decoration-none" href="#">Ingresar</a></li>
                        <li><a class="text-decoration-none" href="#">Registrate</a></li>
                        <li><a class="text-decoration-none" href="#">Contactos</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Paginas</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Inicio</a></li>
                        <li><a class="text-decoration-none" href="#">Acerca de nostros</a></li>
                        <li><a class="text-decoration-none" href="#">Nuestra ubicacion</a></li>
                        <li><a class="text-decoration-none" href="#">Comentarios</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="<?php echo $listar_institucion->comunidad_facebook; ?>"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="<?php echo $listar_institucion->comunidad_youtube; ?>"><i class="fab fa-youtube fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="<?php echo $listar_institucion->comunidad_twiter; ?>"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="<?php echo $listar_institucion->comunidad_nombre; ?>"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 <?php echo $listar_institucion->comunidad_nombre; ?>
                            | Diseñado por Johan Michael Rodriguez Roque <a rel="sponsored" href="SERT.com" target="_blank"><?php echo $listar_institucion->comunidad_nombre; ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="<?= base_url();?>assets/tech/assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?= base_url();?>assets/tech/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?= base_url();?>assets/tech/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url();?>assets/tech/assets/js/templatemo.js"></script>
    <script src="<?= base_url();?>assets/tech/assets/js/custom.js"></script>
    <!-- End Script -->
</body>
</html>







