<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Aug 2018 19:13:44 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta charset="{charset}">
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="{theme_url}assets/img/apple-icon.png"> -->
    <link rel="icon" type="image/png" href="{theme_url}assets/img/upea.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        {pagetitle}
    </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />


    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />


    <!--  Social tags      -->
    <meta name="keywords" content="regis, sie, upea, santos, julian, fernando">
    <meta name="description" content="Sistema de inscripciones version mejorada para ingenieria de sistemas.">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name"
        content="regis, sie, upea, santos, julian, fernando, SIE UPEA Material Dashboard PRO by Creative Tim">
    <meta itemprop="description"
        content="Sistema de inscripciones version mejorada para las carreras de la universidad.">

    <!--<meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">-->


    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim, sistema de inscripciones upea">

    <meta name="twitter:description"
        content="Sistema de inscripciones version mejorada para las carreras de la universidad.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">


    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="dashboard.html" />
    <meta property="og:image"
        content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Sistema de inscripciones version mejorada para ingenieria de sistemas." />
    <meta property="og:site_name" content="Creative Tim" />




    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!--<link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">-->

    <!-- CSS Files -->





    <link href="{theme_url}assets/css/material-dashboard.min40a0.css?v=2.0.2" rel="stylesheet" />
    <link href="{theme_url}assets/css/animate.css" rel="stylesheet" />





    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{theme_url}assets/demo/demo.css" rel="stylesheet" />






    <script src="{theme_url}assets/js/core/jquery.min.js" type="text/javascript"></script>

</head>

<body class="">




    <div class="wrapper ">

        <div class="sidebar" data-color="rose" data-background-color="black"
            data-image="{theme_url}assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

            <div class="logo">
                <a href="<?php echo site_url(Hasher::make(20)) ?>" class="simple-text logo-mini">
                    CT
                </a>

                <a href="#" class="simple-text logo-normal">
                    {sistema}
                </a></div>

            <div class="sidebar-wrapper">

                <div class="user">
                    <div class="photo">
                        <img src="{theme_url}assets/img/faces/upea.png" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <b class="caret"></b>
                            <span style="font-size: 10px;">
                                {user_fullname}
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <?php $dato=$this->ion_auth->user()->row();
    						$id = $dato->id;?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(Hasher::make(6,$id)); ?>">
                                        <span class="sidebar-mini"> AC </span>
                                        <span class="sidebar-normal"> Administrar Contraseña </span>
                                    </a>
                                </li>
                                <!--<li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(Hasher::make(3))?>">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> Salir </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">

                    <li class="nav-item active ">
                        <a class="nav-link" href="<?php echo site_url(Hasher::make(20)) ?>">
                            <i class="material-icons">home</i>
                            <p> Menu </p>
                        </a>
                    </li>

                    {nav_side}


                </ul>
                <br>
                <br>


                <ul class="nav">
                    <!--OnlineRadioBox Player widget-->
                    <div class="orbP" id="orb_player_723bccf10724699d">
                        <style media="screen">
                        /* General */
                        .orbP {
                            position: relative;
                            box-sizing: border-box;
                            overflow: hidden;
                            font-weight: normal;
                            border: 1px solid transparent;
                            user-select: none;
                            text-align: left
                        }

                        .orbP br,
                        .orbP>br {
                            display: none !important;
                        }

                        .orbP p,
                        .orbP>p {
                            margin: 0 !important;
                            padding: 0 !important;
                            line-height: normal !important;
                            font-size: inherit !important
                        }

                        .orbPh {
                            display: block;
                            position: absolute;
                            z-index: 100;
                            top: 50%;
                            margin-top: -12px !important;
                            right: 10px;
                            width: 21px !important;
                            text-decoration: none !important;
                            cursor: pointer
                        }

                        .orbPh>img {
                            margin: 0 !important;
                            border: none;
                            height: 24px !important;
                            -webkit-filter: drop-shadow(2px 2px 0 rgba(47, 99, 160, .2));
                            filter: drop-shadow(2px 2px 0 rgba(47, 99, 160, .2))
                        }

                        .orbPt {
                            text-decoration: none !important
                        }

                        .orbPti {
                            float: left;
                            margin: 0 10px 0 0 !important;
                            vertical-align: top !important;
                            height: 48px !important;
                            width: 89px !important;
                            border: none !important;
                            border-radius: 2px !important;
                            opacity: 1 !important
                        }

                        .orbPtn {
                            display: block;
                            margin-right: 52px;
                            line-height: 24px !important;
                            font-size: 17px !important;
                            font-weight: bold !important;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            white-space: nowrap
                        }

                        .orbPtt {
                            display: block;
                            margin-right: 52px;
                            text-decoration: none !important;
                            line-height: 24px !important;
                            font-size: 12px !important;
                            opacity: .85;
                            transition: opacity .2s;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            white-space: nowrap
                        }

                        .orbPtt:hover {
                            opacity: 1
                        }

                        .orbPp,
                        .orbPs {
                            float: left !important;
                            margin: 0 10px 0 0 !important;
                            padding: 0 !important;
                            height: 48px !important;
                            width: 48px !important;
                            line-height: 48px !important;
                            border-radius: 2px !important;
                            border: none !important;
                            text-align: center !important;
                            cursor: pointer;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            appearance: none !important;
                        }

                        .orbPp::before,
                        .orbPs::before {
                            display: inline-block;
                            vertical-align: middle;
                            content: '';
                            width: 0;
                            height: 0;
                            border-style: solid
                        }

                        .orbPp::before {
                            border-width: 16px 0 16px 26px
                        }

                        .orbPs::before {
                            border-width: 16px
                        }

                        .orbPp:focus,
                        .orbPs:focus {
                            outline: none
                        }

                        .orbPp:focus::-moz-focus-inner,
                        .orbPs:focus::-moz-focus-inner {
                            border: 0;
                            padding: 0
                        }

                        .orbPp:hover,
                        .orbPs:hover {
                            -webkit-transform: scale(1.087);
                            transform: scale(1.087)
                        }

                        .orbPhc {
                            position: relative !important;
                            box-sizing: border-box !important;
                            padding: 10px !important;
                            overflow: hidden
                        }

                        /* Playlist */
                        .orbPpl {
                            position: relative;
                            overflow: auto;
                            overflow-x: hidden;
                            overflow-y: auto;
                            margin: 0 !important;
                            padding: 0 !important;
                            list-style: none !important
                        }

                        .orbPpli {
                            box-sizing: border-box;
                            margin: 0 !important;
                            padding: 0 10px !important;
                            list-style: none !important;
                            background-image: none;
                            float: none !important;
                            height: auto !important
                        }

                        .orbPpli>a,
                        .orbPpli>span {
                            display: block !important;
                            padding: 0 !important;
                            margin: 0 !important;
                            height: auto !important;
                            font-weight: normal !important;
                            text-decoration: none !important;
                            line-height: 32px !important;
                            font-size: 14px !important;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            white-space: nowrap;
                            transition: color .125s;
                            border: none !important
                        }

                        .orbPpli>a:hover,
                        .orbPpli>span:hover {
                            background: transparent !important
                        }

                        .orbPpli>a>time,
                        .orbPpli>span>time {
                            display: inline-block;
                            font-size: 12px !important;
                            width: 3em !important
                        }

                        .orbPpli+li {
                            border-style: solid !important;
                            border-width: 1px 0 0 !important
                        }

                        /* Volume */
                        .orbV {
                            position: absolute;
                            z-index: 1 !important;
                            width: 24px !important;
                            right: 48px !important;
                            top: 0 !important;
                            bottom: 0 !important;
                            line-height: 1 !important;
                            overflow: hidden !important;
                            transition: width .3s
                        }

                        .orbV:hover {
                            width: 160px !important
                        }

                        .orbVC {
                            position: absolute !important;
                            height: 18px !important;
                            left: 24px !important;
                            top: 50% !important;
                            margin: -9px 0 0 11px !important
                        }

                        .orbVC::after {
                            display: block;
                            content: '';
                            margin-top: 4px;
                            width: 0;
                            height: 0 !;
                            border-style: solid;
                            border-width: 4px 100px 4px 0;
                            opacity: .33
                        }

                        .orbVCs {
                            position: absolute !important;
                            z-index: 2 !important;
                            top: 0 !important;
                            width: 18px !important;
                            height: 18px !important;
                            border-radius: 50% !important;
                            cursor: ew-resize !important;
                            box-shadow: 0 6px 8px -2px rgba(0, 9, 18, 0.36)
                        }

                        .orbVb {
                            position: absolute !important;
                            width: 24px !important;
                            height: 24px !important;
                            top: 50% !important;
                            left: 0 !important;
                            margin-top: -12px;
                            white-space: nowrap !important;
                            cursor: pointer;
                            transition: opacity .3s
                        }

                        .orbVb::before {
                            display: inline-block;
                            content: '';
                            vertical-align: middle;
                            width: 7px;
                            height: 12px
                        }

                        .orbVb::after {
                            display: inline-block;
                            content: '';
                            vertical-align: middle;
                            border-width: 12px 12px 12px 0;
                            border-style: solid;
                            height: 0;
                            width: 0;
                            margin-left: -6px
                        }

                        .orbV:hover .orbVb {
                            opacity: .33 !important;
                            cursor: default
                        }

                        .orbVb>._m {
                            display: block !important;
                            width: 7px !important;
                            height: 18px !important;
                            position: absolute !important;
                            top: 50%;
                            margin-top: -9px !important;
                            right: 0;
                            overflow: hidden !important;
                        }

                        .orbVb>._m::before {
                            display: block;
                            content: '';
                            position: absolute;
                            right: 0;
                            top: 50%;
                            width: 28px;
                            height: 24px;
                            margin-top: -12px;
                            border: 1px solid;
                            border-radius: 50%
                        }

                        .orbVb>._m::after {
                            display: block;
                            content: '';
                            position: absolute;
                            right: 4px;
                            top: 50%;
                            width: 14px;
                            height: 14px;
                            margin-top: -7px;
                            border: 1px solid;
                            border-radius: 50%
                        }

                        /* Flags*/
                        .orbF {
                            padding: 0 0 10px 10px !important;
                            border-top: 1px solid;
                            display: -ms-flexbox;
                            display: -webkit-box;
                            display: flex;
                            -ms-flex-flow: row nowrap !important;
                            flex-flow: row nowrap !important
                        }

                        .orbFl {
                            margin: 0 !important;
                            padding: 0 !important;
                            list-style: none !important
                        }

                        .orbFli,
                        .orbFh {
                            display: inline-block !important;
                            vertical-align: top !important;
                            line-height: 18px !important;
                            white-space: nowrap !important;
                            margin: 10px 7px 0 0 !important;
                            padding: 0 6px 0 0 !important;
                            text-indent: 0 !important;
                            list-style: none !important;
                            font-size: 11px !important;
                            text-align: right
                        }

                        .orbFlif {
                            float: left !important;
                            width: 27px !important;
                            height: 18px !important;
                            margin-right: 5px !important
                        }

                        .orbFhi {
                            position: relative !important;
                            display: inline-block !important;
                            vertical-align: baseline !important;
                            width: 8px !important;
                            height: 9px !important;
                            margin: 0 8px 0 5px !important;
                            border-style: solid !important;
                            border-width: 2px 1px 0 1px !important;
                            border-radius: 5px 5px 0 0 !important;
                            opacity: .5
                        }

                        .orbFhi::before,
                        .orbFhi::after {
                            display: block;
                            content: '';
                            position: absolute;
                            bottom: -2px;
                            width: 0;
                            height: 3px;
                            border-style: solid;
                            border-width: 2px;
                            border-radius: 3px
                        }

                        .orbFhi::before {
                            left: -4px
                        }

                        .orbFhi::after {
                            right: -4px
                        }

                        /* Multiselect */
                        .orbPm {
                            margin: 0 !important;
                            padding: 0 !important;
                            list-style: none !important
                        }

                        .orbPmi {
                            position: relative;
                            margin: 0 !important;
                            padding: 10px !important;
                            list-style: none !important;
                            border: dotted rgba(204, 204, 204, 0.5);
                            border-width: 1px 0 0;
                            font-size: 12px !important;
                            overflow: hidden;
                            white-space: nowrap;
                            line-height: 1 !important;
                            cursor: pointer
                        }

                        .orbPmi::before {
                            display: block;
                            content: '';
                            position: absolute;
                            z-index: 1;
                            top: 50%;
                            right: 10px;
                            margin-top: -8px;
                            width: 0;
                            height: 0;
                            border-style: solid;
                            border-width: 8px 0 8px 13px;
                            opacity: .5;
                            filter: alpha(opacity=50);
                            transition: opacity .2s;
                        }

                        .orbPmi:hover::before {
                            opacity: 1;
                            filter: alpha(opacity=100)
                        }

                        .orbPmi::after {
                            display: block;
                            content: '';
                            position: absolute;
                            top: 0;
                            bottom: 0;
                            right: 0;
                            width: 36px
                        }

                        .orbPmii {
                            display: inline-block;
                            vertical-align: middle;
                            margin-right: 10px;
                            width: 30px;
                            height: 16px;
                            border: none !important;
                            border-radius: 2px !important
                        }

                        .orbPmin {
                            display: inline-block;
                            vertical-align: middle;
                        }

                        /* Compact General */
                        .cmpct .orbPti {
                            height: 24px !important;
                            width: 44px !important
                        }

                        .cmpct .orbPtn {
                            line-height: 12px !important;
                            font-size: 12px !important
                        }

                        .cmpct .orbPtt {
                            line-height: 12px !important;
                            font-size: 10px !important
                        }

                        .cmpct .orbPp,
                        .cmpct .orbPs {
                            height: 24px !important;
                            width: 24px !important;
                            line-height: 24px !important
                        }

                        .cmpct .orbPp::before {
                            border-width: 8px 0 8px 13px !important
                        }

                        .cmpct .orbPs::before {
                            border-width: 8px !important
                        }

                        /* Compact w/Playlist */
                        .cmpct .orbPpli>a,
                        .cmpct .orbPpli>span {
                            line-height: 24px !important;
                            font-size: 12px !important
                        }

                        .cmpct .orbPpli>a>time,
                        .cmpct .orbPpli>span>time {
                            font-size: 11px !important
                        }
                        </style>
                        <style media="screen" id="orb_player_723bccf10724699d_settings">
                        .orbP {
                            background-color: #0a131f !important;
                        }

                        /*common player background*/
                        .orbP {
                            border-style: solid;
                            border-color: #2f63a0 !important;
                            border-radius: 5px;
                        }

                        /*common player container border, radius, width*/
                        .orbPp,
                        .orbPs {
                            background: #7094bf !important
                        }

                        /*buttons play/stop bg*/
                        .orbPp::before {
                            border-color: transparent transparent transparent #ffffff !important
                        }

                        /* play button color */
                        .orbPs::before {
                            border-color: #ffffff !important
                        }

                        /* stop button color */
                        .orbPtn,
                        .orbPtt,
                        .orbPtt:hover {
                            color: #f8f8f8 !important;
                        }

                        /*station name & track link color*/
                        .orbV {
                            background-color: #0a131f !important;
                            box-shadow: 0 0 32px 32px #0a131f !important
                        }

                        /*volume control color */
                        .orbVC::after,
                        .orbVb::after {
                            border-color: transparent #ffffff transparent transparent !important
                        }

                        .orbVb::before,
                        .orbVCs {
                            background: #ffffff !important
                        }

                        /* volume bg color */
                        .orbVb>._m::before,
                        .orbVb>._m::after {
                            border-color: #ffffff !important
                        }

                        .orbF {
                            background: #ffffff !important;
                            color: #444444 !important;
                            border-color: #0a131f !important
                        }

                        /* geo background & text color  */
                        .orbFli,
                        .orbFlif {
                            box-shadow: 0 0 1px 0 #444 inset !important
                        }

                        .orbFhi,
                        .orbFhi::before,
                        .orbFhi::after {
                            border-color: #444 !important
                        }
                        </style>
                        <!--<div class="orbPhc">
                            <a class="orbPh" href="https://onlineradiobox.com/bo/" title="Listen on Online Radio Box!"
                                target="_blank"><img src="//ecdn.onlineradiobox.com/img/wl.svg"
                                    alt="Listen on Online Radio Box!"></a>
                            <audio id="orb_player_723bccf10724699d_p" crossorigin="true"
                                style="width:1px;height:1px;overflow:hidden;position:absolute;"></audio>

                            <button class="orbPp" title="En Vivo" country="bo" alias="disney" stream="1"></button>
                            <a class="orbPt" href="https://onlineradiobox.com/bo/disney/" target="_blank">
                                <img class="orbPti" src="//us0-cdn.onlineradiobox.com/img/logo/0/64930.v3.png"
                                    alt="Radio Disney" style="display: block;">
                                <span class="orbPtn" style="display: block;">Radio Disney</span>
                            </a>
                            <span class="orbPtt" loading="cargando" playing="en directo" error="error de reproduccion"
                                not_supported="this browser can't play it"
                                external="Escuchar ahora (Abrir en un reproductor emergente)"
                                style="display: block;"></span>
                            <div class="orbV">
                                <div class="orbVb"><i class="_m"></i></div>
                                <div class="orbVC">
                                    <div class="orbVCs" style="left: 80%;"></div>
                                </div>
                            </div>
                        </div>-->

                        <div class="orbF" style="display:none"></div>
                        <!--<script>
                        var orbp_w = orbp_w || {
                            lang: "es-es"
                        };
                        orbp_w.cmd = orbp_w.cmd || [];
                        orbp_w.cmd.push(function() {
                            orbp_w.init("orb_player_723bccf10724699d");
                        });
                        var s, t;
                        s = document.createElement('script');
                        s.type = 'text/javascript';
                        s.src = "//ecdn.onlineradiobox.com/js/pwidget2.min.235ca64e.js";
                        t = document.getElementsByTagName('script')[0];
                        t.parentNode.insertBefore(s, t);
                        </script>-->
                    </div>
                    <!--OnlineRadioBox Player widget-->

                </ul>



            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">


                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>


                        <a class="navbar-brand" href="#pablo">Tablero {result_flashdata}</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end">


                        <form class="navbar-form">
                            <!-- <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Buscar...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
    </div> -->
                        </form>

                        <ul class="navbar-nav">

                            <!-- OJO AFECTA AL UNIVERSITARIO EN MODO MOVIL  -->
                            <!-- OJO AFECTA AL UNIVERSITARIO EN MODO MOVIL  -->

                            <!--   <li class="nav-item">
    <a class="nav-link" href="#rgs">
      <i class="material-icons">dashboard</i>
      <p class="d-lg-none d-md-block">
        Est.
      </p>
    </a>
</li> -->
                            <!-- OJO AFECTA AL UNIVERSITARIO EN MODO MOVIL  -->
                            <!-- <li class="nav-item dropdown">
    <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="material-icons">notifications</i>
      <span class="notification">3</span>
      <p class="d-lg-none d-md-block">
        Eventos
      </p>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="#">Notificaciones de correo</a>
      <a class="dropdown-item" href="#">Mensajes</a>
      <a class="dropdown-item" href="<?=site_url(Hasher::make(3))?>">Salir</a>
    </div>
</li> -->

                            <!-- OJO AFECTA AL UNIVERSITARIO EN MODO MOVIL  -->
                            <!-- <li class="nav-item">
    <a class="nav-link" href="#rgs">
      <i class="material-icons">person</i>
      <p class="d-lg-none d-md-block">
        {title}
      </p>
    </a>
</li> -->
                        </ul>





                    </div>
                </div>
            </nav>
            <!-- End Navbar -->




            <div class="content">



                <div class="content">
                    <div class="container-fluid">

                        {content}





                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="http://www.upea.edu.bo">
                                    UPEA
                                </a>
                            </li>
                            <li>
                                <a href="http://www.sie.upea.bo">
                                    SIE
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    2018
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                        document.write(new Date().getFullYear())
                        </script>, Dev. <i class="material-icons">favorite</i> by
                        <a href="#" target="_blank">Regis-Santos-Fernando-Julian</a>
                    </div>
                </div>
            </footer>


        </div>

    </div>

    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar filtros</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-warning" data-color="orange"></span>
                            <span class="badge filter badge-danger" data-color="danger"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>


                <li class="header-title">Sidebar Fondo</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="ml-auto mr-auto">
                            <span class="badge filter badge-black active" data-background-color="black"></span>
                            <span class="badge filter badge-white " data-background-color="white"></span>
                            <span class="badge filter badge-red" data-background-color="red"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <label class="ml-auto">
                            <div class="togglebutton switch-sidebar-mini">
                                <label>
                                    <input type="checkbox">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Imageness</p>
                        <label class="switch-mini ml-auto">
                            <div class="togglebutton switch-sidebar-image">
                                <label>
                                    <input type="checkbox" checked="">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="header-title">Imagenes</li>

                <li>
                    <!--                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{theme_url}assets/img/sidebar-1.jpg" alt="">
              </a> -->
                </li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{theme_url}assets/img/sidebar-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{theme_url}assets/img/sidebar-2.jpg" alt="">
                    </a>
                </li>
                <li>
                    <!--  <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{theme_url}assets/img/sidebar-2.jpg" alt="">
              </a> -->
                </li>
                <!--  <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{theme_url}assets/img/sidebar-3.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{theme_url}assets/img/sidebar-4.jpg" alt="">
                </a>
            </li> -->


                <!--<li class="button-container">
              <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
              <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                  Documentation
              </a>
              <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
                  Get Free Demo!
              </a>
            </li>
            

            
            <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
            </li>-->
                <!-- <li class="header-title">Gracias, totales</li> -->

                <!--    <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
            </li> -->
            </ul>
        </div>
    </div>


















    <!--   Core JS Files   -->

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{theme_url}assets/js/plugins/jquery.dataTables.min.js"></script>

    <script src="{theme_url}assets/js/core/popper.min.js" type="text/javascript"></script>

    <script src="{theme_url}assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

    <script src="{theme_url}assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!-- Plugin for the momentJs  -->
    <script src="{theme_url}assets/js/plugins/moment.min.js"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="{theme_url}assets/js/plugins/sweetalert2.js"></script>

    <!-- Forms Validations Plugin -->
    <script src="{theme_url}assets/js/plugins/jquery.validate.min.js"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{theme_url}assets/js/plugins/jquery.bootstrap-wizard.js"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{theme_url}assets/js/plugins/bootstrap-selectpicker.js"></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{theme_url}assets/js/plugins/bootstrap-datetimepicker.min.js"></script>


    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{theme_url}assets/js/plugins/jquery.dataTables.min.js"></script>


    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{theme_url}assets/js/plugins/bootstrap-tagsinput.js"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{theme_url}assets/js/plugins/jasny-bootstrap.min.js"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{theme_url}assets/js/plugins/fullcalendar.min.js"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->

    <script src="{theme_url}assets/js/plugins/jquery-jvectormap.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{theme_url}assets/js/plugins/nouislider.min.js"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <!--<script src="../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->

    <!-- Library for adding dinamically elements -->
    <script src="{theme_url}assets/js/plugins/arrive.min.js"></script>


    <!--  Google Maps Plugin    -->

    <!-- <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script> -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!--<script async defer src="../../../buttons.github.io/buttons.js"></script>-->


    <!-- Chartist JS -->
    <script src="{theme_url}assets/js/plugins/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{theme_url}assets/js/plugins/bootstrap-notify.js"></script>




    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{theme_url}assets/js/material-dashboard.min40a0.js?v=2.0.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{theme_url}assets/demo/demo.js"></script>
    <script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' +
                            new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                        'src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' +
                        new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
    </script>






    <!-- Sharrre libray -->
    <script src="{theme_url}assets/demo/jquery.sharrre.js"></script>



    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />

    </noscript>



    <script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Total"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscador...",
            }
        });

        var table = $('#datatable').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }
    });
    </script>
    <script language="JavaScript">
    document.oncontextmenu = function() {
        return false;
    }

    //////////F12 disable code julian////////////////////////
    document.onkeypress = function(event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }

    }
    document.onmousedown = function(event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }
        if (event.keyCode == 116) {
            return false;
        }
    }
    document.onkeydown = function(event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }
        if (event.keyCode == 116) {
            return false;
        }
    }
    // document.onkeydown = function (event) {
    //         event = (event || window.event);
    //         if (event.keyCode == 13) {
    //             //alert('No F-keys');
    //             return false;
    //         }
    //     }
    /////////////////////end///////////////////////
    </script>


</body>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Aug 2018 19:14:41 GMT -->

</html>