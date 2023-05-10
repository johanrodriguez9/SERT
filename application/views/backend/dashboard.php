
    <div class="page-wrapper" id="pageWrapper">
        <div class="container-fluid general-widget">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>General</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Widgets</li>
                            <li class="breadcrumb-item active">General</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <div class="bookmark">
                            <ul>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                    <input type="text" placeholder="Search..">
                                    </div>
                                </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid general-widget">
            <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="database"></i></div>
                        <div class="media-body"><span class="m-0">Earnings</span>
                            <h4 class="mb-0 counter">6659</h4><i class="icon-bg" data-feather="database"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                        <div class="media-body"><span class="m-0">Products</span>
                            <h4 class="mb-0 counter">9856</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                        <div class="media-body"><span class="m-0">Messages</span>
                            <h4 class="mb-0 counter">893</h4><i class="icon-bg" data-feather="message-circle"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                        <div class="media-body"><span class="m-0">New Use</span>
                            <h4 class="mb-0 counter">4531</h4><i class="icon-bg" data-feather="user-plus"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-6 xl-100 box-col-12">
                    <div class="card">
                        <div class="cal-date-widget card-body">
                            <div class="row">
                                <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                    <div class="cal-info text-center">
                                        <div>
                                        <?php date_default_timezone_set('America/La_Paz');
                                            $month=date("n");
                                            $year=date("Y");
                                            $diaActual=date("j");
                                            $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
                                            $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
                                            $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                                            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                            ?>
                                            <h2><?php echo $diaActual?></h2>
                                            <div class="d-inline-block"><span class="b-r-dark pe-3"><?php echo $meses[$month]?></span><span class="ps-3"><?php echo $year?></span></div>
                                            <p class="f-16"><?php echo $meses[$month]." ".$year?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                    <div class="cal-datepicker">
                                    <div class="datepicker-here float-sm-end" data-language="en">           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- row -->
    <div class="row row-sm ">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden review-project">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <div class="widget">
                                <div class="widget-header bg-white">
                                    <h3 class="fg-gray" align="center">MI CALENDARIO DEL MES</h3>

                                   <div class="card bg-gradient-primary">
                                    <?php date_default_timezone_set('America/La_Paz');
                                      # definimos los valores iniciales para nuestro calendario
                                      $month=date("n");
                                      $year=date("Y");
                                      $diaActual=date("j");
                                       
                                      # Obtenemos el dia de la semana del primer dia
                                      # Devuelve 0 para domingo, 6 para sabado
                                      $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
                                      # Obtenemos el ultimo dia del mes
                                      $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
                                       
                                      $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                                      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                      ?>
                                        <style>
                                            #calendar {
                                              font-family:Arial;
                                              font-size:12px;
                                            }
                                            #calendar caption {
                                              text-align:center;
                                              padding:5px 10px;
                                              background-color:#9b59b6;
                                              color:#fff;
                                              font-weight:bold;
                                            }
                                            #calendar th {
                                              background-color:#9b59b6;
                                              color:#fff;
                                              width:40px;
                                              text-align:center;
                                            }
                                            #calendar td {
                                              color: #000;
                                              text-align:center;
                                              padding:6px 8px;
                                              background-color:#fff;
                                              box-shadow: -1px -1px 5px #000;
                                            }
                                            #calendar .hoy {
                                              background-color:#9b59b6;
                                            }
                                        </style>
                                      <table id="calendar" class="table table-bordered table-striped">
                                      <caption><?php echo $meses[$month]." ".$year?></caption>
                                      <tr>
                                        <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
                                      </tr>
                                      <tr bgcolor="silver">
                                        <?php
                                        $last_cell=$diaSemana+$ultimoDiaMes;
                                        // hacemos un bucle hasta 42, que es el máximo de valores que puede
                                        // haber... 6 columnas de 7 dias
                                        for($i=1;$i<=42;$i++)
                                        {
                                          if($i==$diaSemana)
                                          {
                                            // determinamos en que dia empieza
                                            $day=1;
                                          }
                                          if($i<$diaSemana || $i>=$last_cell)
                                          {
                                            // celca vacia
                                            echo "<td>&nbsp;</td>";
                                          }else{
                                            // mostramos el dia
                                            if($day==$diaActual)
                                              echo "<td class='hoy'>$day</td>";
                                            else
                                              echo "<td>$day</td>";
                                            $day++;
                                          }
                                          // cuando llega al final de la semana, iniciamos una columna nueva
                                          if($i%7==0)
                                          {
                                            echo "</tr><tr>\n";
                                          }
                                        }
                                      ?>
                                      </tr>
                                    </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>









