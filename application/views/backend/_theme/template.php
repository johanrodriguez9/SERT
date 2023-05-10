<?php $id=$this->session->userdata('user_id');

    $obj=$this->db->query("SELECT * FROM dp_auth_users WHERE id='$id' ")->row();
    
    $obj11=$this->db->query("SELECT * FROM tech_comunidad")->result();


    if ($obj->username==$this->session->userdata('username')) { 
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content=" TIENDA ">
    <meta name="Author" content="AE">
    <meta name="Keywords" content="TIENDA"/>
    <title> TIENDA</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="<?= base_url();?>assets/img/escudo2.png" type="image/x-icon"/>

    
    <link rel="stylesheet" type="text/css" href="{theme_url}css/icons.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/icofont.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/themify.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/animate.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/prism.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/vector-map.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="{theme_url}css/style.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/style1.css"> -->

    <link id="color" rel="stylesheet" href="{theme_url}css/color-3.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{theme_url}css/date-picker.css">
    
    <link rel="stylesheet" type="text/css" href="{theme_url}css/styles_app.css">

    <link rel="stylesheet" type="text/css" href="{theme_url}css/datatables.css">

    <link href="{theme_url}plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>
    <link href="{theme_url}plugins/sidebar/sidebar.css" rel="stylesheet">
    <link href="{theme_url}plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
        
    <link href="{theme_url}switcher/css/switcher.css" rel="stylesheet">
    <link href="{theme_url}switcher/demo.css" rel="stylesheet"> 
    <link href="{theme_url}plugins/sweet-alert/sweetalert.css" rel="stylesheet">
    <link href="{theme_url}plugins/gallery/gallery.css" rel="stylesheet">
    <!-- Internal Data table css -->
    <link href="{theme_url}plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="{theme_url}plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="{theme_url}plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="{theme_url}plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{theme_url}plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- <link href="{theme_url}plugins/select2/css/select2.min.css" rel="stylesheet"> -->

<!-- AUMENTADOS -->

    <!--- Internal Fileupload css -->

    <link href="{theme_url}plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>
    <!--- Internal Fancy uploader css -->
    <link href="{theme_url}plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
    <!--- Internal leaflet-map css -->
    <link href="{theme_url}plugins/leaflet/leaflet.css" rel="stylesheet">
    <!--- Internal Prism css -->
    <link href="{theme_url}plugins/prism/prism.css" rel="stylesheet">
    <!--- Internal Multislider css -->
    <link href="{theme_url}plugins/multislider/multislider.css" rel="stylesheet">
    <!--- Internal Morris Css -->
    <link href="{theme_url}plugins/morris.js/morris.css" rel="stylesheet">
    <!--- Internal Sumoselect css -->
    <link rel="stylesheet" href="{theme_url}plugins/sumoselect/sumoselect.css">
    <!--- Internal TelephoneInput css -->
    <link rel="stylesheet" href="{theme_url}plugins/telephoneinput/telephoneinput.css">
    <!--- Select2 css-->
    <link href="{theme_url}plugins/select2/css/select2.min.css" rel="stylesheet">
<!-- FIN AUMENTADOS -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/alert/lib/alertify.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/alert/themes/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/alert/themes/alertify.default.css" />
    <link href="<?php echo base_url();?>assets/alert/style_fer.css" rel="stylesheet">
    <script src="{theme_url}plugins/jquery/jquery.min.js"></script>



</head>

<body>

    <!-- Loader starts -->
    <!-- <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div> -->
    <!-- Loader ends -->

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid" style="width: 85px;" src="<?= base_url();?>assets/img_comunidad/<?php echo $obj11->comunidad_logo; ?>" alt="">
                        </a>
                    </div>
                    <div class="dark-logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid" style="width: 85px;" src="<?= base_url();?>assets/img_comunidad/<?php echo $obj11->comunidad_logo; ?>" alt="">
                        </a>
                    </div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
                </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>
                            <form class="form-inline search-form">
                            <div class="search-bg"><i class="fa fa-search"></i>
                                <input class="form-control-plaintext" placeholder="Buscar.....">
                            </div>
                            </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

                  
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                  
                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="<?php echo base_url(Hasher::make(3))?>"><i data-feather="log-out"></i>CERRAR SESION</a></button>
                        </li>
                    </ul>
                </div>
              <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>

        <div class="page-body-wrapper sidebar-icon">
            <header class="main-nav">
                <div class="sidebar-user text-center">
                    <a class="setting-primary" href="<?php echo base_url(Hasher::make(25))?>">
                        <i data-feather="settings"></i>
                    </a>

                    <?php if($obj->imagen){ ?>
                            <img src="<?php echo base_url();?>assets/file_usuario/<?php echo $obj->imagen; ?>" alt="image" class="img-90 rounded-circle">
                        <?php }else{ ?>
                            <img src="<?php echo base_url();?>assets/alert/no-image.png" alt="image" class="img-90 rounded-circle">
                        <?php } ?>
                        
                    <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
                    <h6 class="mt-3 f-14 f-w-600">{user_fullname}</h6></a>
                    <p class="mb-0 font-roboto">Administrador</p>
 
                </div>
                <nav>
                    <div class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="mainnav">           
                            <ul class="nav-menu custom-scrollbar">
                                <li class="back-btn">
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                </li>
                                {nav_side}
                                <li class="sidebar-main-title">
                                    <a class="nav-link" href="<?php echo base_url(Hasher::make(3))?>"><i class="side-menu__icon fe fe-power"></i><span class="side-menu__label">SALIR</span></a>
                                </li>                
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </header>

            <div class="page-body">
                <div class="container-fluid">
                    {content}
                </div>
            </div>
        </div>
        
    </div>    

    <div class="main-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <!-- <span>Universidad Pública de el Alto <a href="#">U.P.E.A.</a> DEVELOPER <a href="javascript:;">Ing. </a>Juan Fernando Chambi </span> -->
        </div>

    </div>

    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!-- <script src="{theme_url}js/jquery-3.5.1.min.js"></script> -->
    <!-- feather icon js-->
    <script src="{theme_url}js/icons/feather-icon/feather.min.js"></script>
    <script src="{theme_url}js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{theme_url}js/sidebar-menu.js"></script>
    <script src="{theme_url}js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="{theme_url}js/bootstrap/popper.min.js"></script>
    <script src="{theme_url}js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="{theme_url}js/chart/chartist/chartist.js"></script>
    <script src="{theme_url}js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="{theme_url}js/chart/knob/knob.min.js"></script>
    <script src="{theme_url}js/chart/knob/knob-chart.js"></script>
    <script src="{theme_url}js/chart/apex-chart/apex-chart.js"></script>
    <script src="{theme_url}js/chart/apex-chart/stock-prices.js"></script>
    <script src="{theme_url}js/prism/prism.min.js"></script>
    <script src="{theme_url}js/clipboard/clipboard.min.js"></script>
    <script src="{theme_url}js/counter/jquery.waypoints.min.js"></script>
    <script src="{theme_url}js/counter/jquery.counterup.min.js"></script>
    <script src="{theme_url}js/counter/counter-custom.js"></script>
    <script src="{theme_url}js/custom-card/custom-card.js"></script>
    <script src="{theme_url}js/notify/bootstrap-notify.min.js"></script>
    <script src="{theme_url}js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="{theme_url}js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="{theme_url}js/dashboard/default.js"></script>
    <script src="{theme_url}js/notify/index.js"></script>
    <script src="{theme_url}js/datepicker/date-picker/datepicker.js"></script>
    <script src="{theme_url}js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="{theme_url}js/datepicker/date-picker/datepicker.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{theme_url}js/script.js"></script>
    <script src="{theme_url}js/theme-customizer/customizer.js"></script>


<!-- AUMENTADOS -->

    <!--- Fileuploads js -->

    <script src="{theme_url}plugins/fileuploads/js/fileupload.js"></script>
    <script src="{theme_url}plugins/fileuploads/js/file-upload.js"></script>
    <!--- Fancy uploader js -->
    <script src="{theme_url}plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="{theme_url}plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="{theme_url}plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="{theme_url}plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="{theme_url}plugins/fancyuploder/fancy-uploader.js"></script>
    <!-- MAPS -->
    <script src="{theme_url}plugins/leaflet/leaflet.js"></script>
    <!-- <script src="{theme_url}js/map-leafleft.js"></script> -->
    <!--- Internal Prism js -->
    <script src="{theme_url}plugins/prism/prism.js"></script>
    <!--- Internal Modal js -->
    <!-- <script src="{theme_url}js/modal.js"></script> -->
    <!--- Select2 js -->
    <script src="{theme_url}plugins/parsleyjs/parsley.min.js"></script>
    <!--- Internal Form-validation js -->
    <!-- <script src="{theme_url}js/form-validation.js"></script> -->
    <!--- Internal Form-elements js -->
    <!-- <script src="{theme_url}js/advanced-form-elements.js"></script> -->
    <!-- <script src="{theme_url}js/select2.js"></script> -->
    <!--- Internal Sumoselect js -->
    <script src="{theme_url}plugins/sumoselect/jquery.sumoselect.js"></script>
<!-- FIN AUMENTADOS -->

    <script src="{theme_url}plugins/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{theme_url}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{theme_url}plugins/ionicons/ionicons.js"></script>
    <script src="{theme_url}plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- <script src="{theme_url}js/chart.flot.sampledata.js"></script> -->
    <!-- <script src="{theme_url}js/index.js"></script> -->
    <script src="{theme_url}plugins/moment/moment.js"></script>
    <script src="{theme_url}plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{theme_url}plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{theme_url}plugins/perfect-scrollbar/p-scroll.js"></script>
    <script src="{theme_url}plugins/rating/jquery.rating-stars.js"></script>
    <script src="{theme_url}plugins/rating/jquery.barrating.js"></script>
    <script src="{theme_url}plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{theme_url}plugins/side-menu/sidemenu.js"></script>
    <script src="{theme_url}plugins/sidebar/sidebar.js"></script>
    <script src="{theme_url}plugins/sidebar/sidebar-custom.js"></script>
    <!-- <script src="{theme_url}js/eva-icons.min.js"></script> -->
    <script src="{theme_url}js/script.js"></script>
    <!-- <script src="{theme_url}js/custom.js"></script> -->
    <script src="{theme_url}switcher/js/switcher.js"></script>
    <script src="{theme_url}plugins/select2/js/select2.min.js"></script>
    <script src="{theme_url}plugins/rating/ratings.js"></script>
    <script src="{theme_url}plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="{theme_url}plugins/sweet-alert/jquery.sweet-alert.js"></script>
        <!--- Internal Gallery js -->
        <script src="{theme_url}plugins/gallery/lightgallery-all.min.js"></script>
        <script src="{theme_url}plugins/gallery/jquery.mousewheel.min.js"></script>
        <!-- <script src="{theme_url}js/gallery.js"></script> -->

    <!-- Internal Data tables -->
    <script src="{theme_url}plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/dataTables.dataTables.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/responsive.dataTables.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/jquery.dataTables.js"></script>
    <script src="{theme_url}plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="{theme_url}plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/jszip.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/pdfmake.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/vfs_fonts.js"></script>
    <script src="{theme_url}plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{theme_url}plugins/datatable/js/responsive.bootstrap4.min.js"></script>
    <!-- <script src="{theme_url}js/table-data.js"></script> -->


    <!-- <script src="{theme_url}js/jquery-3.5.1.min.js"></script> -->
    <script src="{theme_url}js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{theme_url}js/datatable/datatables/datatable.custom.js"></script>
    <script src="{theme_url}js/tooltip-init.js"></script>
    <script src="{theme_url}js/script.js"></script>
  

    <!--- Internal Modal js -->

    <!-- <script src="{theme_url}js/modal.js"></script> -->

</body>

</html>

<?php }else{ redirect(site_url(Hasher::make(1))); } ?>