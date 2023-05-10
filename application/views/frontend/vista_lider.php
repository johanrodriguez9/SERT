        <!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Section Start -->
            <div style="background-image: url(<?= base_url();?>assets/tech/assetss/images/breadcrumbs/9.jpg);" class="rs-breadcrumbs bg-9">
                <div class="container">
                    <div class="content-part text-center">
                        <h1 class="breadcrumbs-title white-color mb-0">SOBRE MÍ</h1>
                    </div>
                </div>
            </div>

            <!-- Breadcrumbs Section End -->
            <!-- Shop Section Start -->

                    
            <div class="rs-about inner pt-100 lg-pt-92 md-pt-80 pb-100 md-pb-80">
                <div class="container">
                    <?php $count=1; foreach ($lider as $value): ?>
                        <div class="row y-middle mb-64 lg-mb-30 md-mb-0">
                            <div class="col-lg-6 md-mb-95">
                                <div class="image-part">
                                    <img src="<?= base_url(); ?>assets/img_lideres/<?= $value->lideres_foto?>" alt="">
                                    <div class="author-info">
                                        <h3 class="name"><?= $value->lideres_nombre ?></h3>
                                        <span class="designation">CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pl-50 md-pl-15 pr-50 lg-pr-15">
                                <div class="sec-title mb-25">
                                    <div class="sub-title primary">Mas sobre mí</div>
                                    <div class="desc"><?= $value->lideres_descripcion ?></div>
                                </div>
                                <ul class="listing-style2 mb-33">
                                    <li>Production or Trading of Good or Services for Sale</li>
                                    <li>Cost of supplies and equipment</li>
                                    <li>Change in the volume of expected sales</li>
                                    <li>Change in the volume of expected sales</li>
                                    <li>Change in the volume of expected sales</li>
                                </ul>
                                <div class="btn-part">
                                    <a class="readon" href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?> 
                </div>
            </div>
            <!-- Shop Section End -->
        </div> 

        <!-- Main content End -->