<br><br><br><br>
<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                <center><h2 class="fer_texto mg-b-0 mt-2" align="center">PERFIL MIEMBRO DE TECH-LAB</h2></center>
                <br>
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
        </div><!-- bd -->
    </div>
</div> 

<div class="row row-sm">
	<br><br><br>
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">


										<?php foreach ($datos_miembro as $value): ?>
										<center>
										<div class="main-img profile-user">
											<img style="height: 300px; width: 300px;" src="<?php echo base_url();?>assets/img_miembro/<?php echo $value->miembro_imagen;?>"><a class="" href="JavaScript:void(0);"></a>
										</div>
											<div>
												<h5 class="main-profile-name"><?php echo $value->miembro_nombres;?> <?php echo  $value->miembro_apellidos; ?></h5>
											</div>
											<p class="main-profile-name-text">Miembro de Tech-lab</p>
										</center>
										<!-- <label class="main-content-label tx-13 mg-b-20">Social</label> -->
<!-- 										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>Github</span> <a href="#">github.com/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>Twitter</span> <a href="#">twitter.com/spruko.me</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>Linkedin</span> <a href="#">linkedin.com/in/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>My Portfolio</span> <a href="#">spruko.com/</a>
												</div>
											</div>
										</div> -->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
<!-- 						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label tx-13 mg-b-25">
									Conatct
								</div>
								<div class="main-profile-contact-list">
									<div class="media">
										<div class="media-icon bg-primary-transparent text-primary">
											<i class="icon ion-md-phone-portrait"></i>
										</div>
										<div class="media-body">
											<span>Mobile</span>
											<div>
												+245 354 654
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-success-transparent text-success">
											<i class="icon ion-logo-slack"></i>
										</div>
										<div class="media-body">
											<span>Slack</span>
											<div>
												@spruko.w
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-info-transparent text-info">
											<i class="icon ion-md-locate"></i>
										</div>
										<div class="media-body">
											<span>Current Address</span>
											<div>
												San Francisco, CA
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<div class="col-lg-8">
						<div class="main-content-body main-content-body-profile">

							<div class="main-profile-body p-0">
								<div class="row row-sm">
									<div class="col-12">
										<div class="card mg-b-20">
											<div class="card-body">
												<center><h3 class="main-profile-name"> <span style="color: black;"> ..:::INFORMACIÓN PERSONAL:::.. </span></h3></center>
												<div class="card-header">
													<div class="media">

											<div>

												<h5 class="main-profile-name"> <span style="color: black;">NOMBRES: </span>  <?php echo $value->miembro_nombres;?></h5>
												<h5 class="main-profile-name"><span style="color: black;">APELLIDOS: </span> <?php echo  $value->miembro_apellidos; ?></h5>
												<p class="main-profile-name-text">Miembro de Tech-lab</p>
												<h5 class="main-profile-name"><span style="color: black;">CELULAR: </span> <?php echo $value->miembro_celular; ?></h5>
												<h5 class="main-profile-name"><span style="color: black;">CORREO: </span> <?php echo $value->miembro_correo; ?></h5>
												<h5 class="main-profile-name"><span style="color: black;">CARRERA: </span> <?php echo $value->carrera_nombre; ?></h5>
												<h5 class="main-profile-name"><span style="color: black;">TIPO DE MIEMBRO: </span><?php echo $value->tm_titulo; ?></h5>
												<h5 class="main-profile-name"><span style="color: black;">PAIS: </span> <?php echo $value->miembro_pais; ?></h5>
											</div>
													</div>
												</div>
											</div>
                           					<center>
                            				<a target="black" class="btn btn-outline-primary btn-lg" href="<?php echo base_url(Hasher::make(101,$value->id_user))?>">GENERAR MEMBRESÍA DIGITAL</a>                              
                            				</center>
										</div>
										
									</div>
								</div>
							</div><!-- main-profile-body -->
							<?php endforeach ?>
						</div>
					</div>
				</div>