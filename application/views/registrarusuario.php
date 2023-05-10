<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once APPPATH. 'libraries/PHPMailer/src/Exception.php';
    require_once APPPATH. 'libraries/PHPMailer/src/PHPMailer.php';
    require_once APPPATH. 'libraries/PHPMailer/src/SMTP.php';
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="UPEA | Universidad Pública De El Alto">
        <meta name="Author" content="SIE">
        <meta name="Keywords" content="UPEA Universidad Pública De El Alto"/>
        <title>TechBo | Tech Lab Bolivia </title>
        <!-- <link rel="icon" href="<?php echo base_url();?>assets/upea/Giro.gif" type="image/x-icon"/> -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>assets/img/escudo.png" />
        <link href="<?php echo base_url() ?>assets/admin/assets/css/icons.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
        <!-- <link href="<?php echo base_url() ?>assets/admin/assets/css/style.css" rel="stylesheet"> -->
        <!-- <link href="<?php echo base_url() ?>assets/admin/assets/css/skin-modes.css" rel="stylesheet"> -->
        <!-- <link href="<?php echo base_url() ?>assets/admin/assets/css/sidemenu.css" rel="stylesheet"> -->
        <link href="<?php echo base_url() ?>assets/admin/assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/assets/switcher/css/switcher.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/assets/switcher/demo.css" rel="stylesheet"> </head>
        <link href="<?php echo base_url() ?>assets/admin/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet"> </head>
    
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/admin/assets/css/style1.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/admin/assets/css/styles_app.css">

        
    <body class="main-body">
    <!-- ******* VIDEO FONDO ******* --><div class=" " >
            <div class="contenido__video">
                    
            <!-- 

                autoplay: propiedad para que se reproduzca una ves que carga la página
                loop: propiedad para el vídeo se repita infinitamente
                muted: propiedad para que el vídeo no emita sonido
                poster: propiedad que muestra una imagen hasta que cargue el vídeo 
            -->
                <video class="video" autoplay="autoplay" loop="loop" muted="muted" poster="images/artesano.png">
                <!-- <source src="<?php echo base_url() ?>assets/tech/assets/img/tech/tech2.mp4" type="video/mp4" /> -->
                <!-- <source src="<?php echo base_url() ?>assets/upea/u.webm" type="video/webm" /> -->
                </video>
            </div>
        </div>

 <!-- Agrega tu código desde aquí -->

        <!-- /Loader -->
                <!-- main-signin-wrapper -->

        <div class="my-auto page page-h">
            <div class="main-signin-wrapper">
                <div class="main-card-signin d-md-flex wd-100p" style="width: 90%; background:#fff;">
                    <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" style="padding: 30px 20px!important;">
                        <div class="my-auto authentication-pages">
                            <div>
                                <a href="<?= base_url(Hasher::make(3)); ?>">
                                    <img src="<?= base_url();?>assets/img_comunidad/comunidad_logo_1659419576.png" class=" m-0 mb-4 app-logon" alt="logo">
                                </a>
                                <h5 class="m-4" style="border-bottom: 2px solid white;"><center>TIENDA ONLINE </center></h5>
                                <h5 class="mb-4"><center>ADMINISTRACIÓN</center> </h5>
                                <div class="app-ayuda-content">
                                    <h5>Ayuda</h5>
                                    <h6>!Crea una Cuenta</h6>
                                    <ul class="app-ayuda">
                                        <li><span>1.</span> <h7><a href="<?= site_url(Hasher::make(26)); ?>">Registrar cuenta</a></h7></li>
                                        <li><span>2.</span> <h7>Verificar cuenta gmail</h7></li>
                                        <li><span>3.</span> <h7><a href="<?= site_url(Hasher::make(29)); ?>">Ingresar codigo de verificacion gmail</a></h7></li>
                                        <li><span>4.</span> <h7><a href="<?= site_url(Hasher::make(1)); ?>">Ingresar</a></h7></li>
                                        <li><h5><a href="<?= site_url(Hasher::make(30)); ?>">Reenviar Codigo de Verificación</a></h5></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-5 wd-md-50p app-formlogin">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="main-signin-header">
   
                                    <h2>REGISTRARSE</h2>
                                    <form method="post" id="session_system">
                                        
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i> 
                                                </div>
                                                <input id="login-nom" type="text" class="form-control" maxlength="30" name="Nombretxt" placeholder="Ingrese sus Nombres" required>
                                            </div>
                                        </div>


                                        <!-- <div class="row"> -->
                                            <!-- <div class="form-group col-lg-6 col-md-6 col-xs-12"> -->
                                            <div class="form-group">
                                                <label>Apellidos</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-user"></i> 
                                                    </div>
                                                    <input id="login-nom" type="text" class="form-control" maxlength="30" name="Apellidos" placeholder="Ingrese sus Apellidos" required>
                                                </div>
                                            </div>                                            
                                            <!-- <div class="form-group col-lg-6 col-md-6 col-xs-12"> -->
                                            <!-- <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-share"></i> 
                                                    </div>
                                                    <input id="login-nom" type="text" class="form-control" maxlength="30" name="Apellidomtxt" placeholder="Ingrese su apellido materno">
                                                </div>
                                            </div> -->
                                        <!-- </div> -->

                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input onkeyup="buscar_email(this.value)" id="login-email" type="email" class="form-control" maxlength="100" name="emailrtxt" placeholder="Ingrese su email" required>
                                            </div>
                                            <div class="" id="ver_confirm">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-spinner"></i>
                                                </div>
                                                <input id="login-id" type="text" class="form-control" maxlength="50" name="identitytxt" placeholder="Ingresar usuario" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-lock"></i> 
                                                </div>
                                                <input id="login-pass" type="password" class="form-control" name="passwordtxt" placeholder="Ingresar contraseña" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Verificación Contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-check"></i> 
                                                </div>
                                                <input onkeyup="buscar_password(this.value)" id="login-passver" type="password" class="form-control" name="passwordveritxt" placeholder="Ingresar verificación contraseña" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 app-enviar">
                                                <button type="submit" class="btn btn-main-primary btn-block">REGISTRAR</button>
                                            </div>
                                        </div>
                                        <div id="app-confirmaremail">

                                        </div>
                                        <div class="form-header bg-white padding-10 text-center">
                                            <p>¿Ya tiene cuenta registrada? Haga clic en <a style="color: #8b10de!important;" href="<?php echo base_url(Hasher::make(1))?>" class="color-green"> Ingresar</a> su cuenta.</p>        
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/ionicons/ionicons.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/rating/jquery.barrating.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/side-menu/sidemenu.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/sidebar/sidebar.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/sidebar/sidebar-custom.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/js/eva-icons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/js/script.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/switcher/js/switcher.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/plugins/sweet-alert/sweetalert.min.js"></script>

        <script>

    $("#session_system").submit(function(event) {

        event.preventDefault();
        $.ajax({
            url:'<?= site_url(Hasher::make(27)); ?>',
            type:'POST',
            data:$("form").serialize(),
            success:function(dato){    
                // if(dato){
                    swal("NOTA!", "REGISTRO EXITOSAMENTE", "success");
                    setTimeout(function(){
                        window.location="<?= site_url(Hasher::make(29)); ?>";
                    },1500);
                // }  else{
                //     $("#app-confirmaremail").html(dato);
                // }
            }
        });
        return false;
        
    });


    function buscar_email(ci) {
        $.post('<?php echo base_url();?>Registrarusuario/buscar_emailconfirmar', {ci}, function(data) {
            $("#ver_confirm").html(data);
        });    
    }

    function buscar_password(ci) {
		var a = $("#login-pass").val();
        $.post('<?php echo base_url();?>Registrarusuario/buscar_confirmarpass', {ci,a}, function(data) {
            $("#ver_confirm").html(data);
        });
    }


</script>

    </body>

</html>


<style type="text/css">

    /* FONDO VIDEO */
    .contenido__video{
    /*background: linear-gradient(45deg, rgb(230 23 23 / 100%),#853010b3, rgb(8 14 135 / 80%));*/
        overflow: hidden;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    /* Estilos para la etiqueta "video" con la calse (.video)  */
    .video{
        position: absolute;
        max-width: 300%;
        width: 100%;
    }

    /* media queries (personalizarlo a su antojo)*/
    @media(max-width: 900px){
        .video{
            width: 150%;

        }

    }

    @media(max-width: 650px){

        .video{
            width: 280%;
        }

    }

    @media(max-width: 480px){
        .video{ 
            width: 300%;
        }

    }



</style>