
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

     <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

     <!-- FullCalendar -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom Theme Style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/build/css/custom.css" rel="stylesheet">
  </head>

<!-- page content -->
        
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $modelApp->nombre; ?></h3>
              </div>

              <!--div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div-->
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $modelApp->nombre; ?> <small>Reservación de Citas</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li-->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>Día para tu cita</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Paso 2<br />
                                              <small>Horario para tu Cita</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Paso 3<br />
                                              <small>Datos Personales</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Paso 4<br />
                                              <small>Datos de la Cita</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                       

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                        <?php 
                          $fecha = date('Y-m-d');

                          $nuevafinal = date('Y-m-d',strtotime ( '+1 month' , strtotime ( $fecha ) )) ;
                          $nuevafecha = date('Y-m-d');
                          //$nuevafecha = date ( 'Y-m-h' , $nuevafecha );
                           
                          $cont = 1;
                          $conTodo=0;
                          while($nuevafecha!=$nuevafinal){

                            if($cont==1){
                              if($conTodo==0){
                                echo '
                                <div class="item active">
                                  <div class="col-md-2">
                                  </div>
                                ';
                              }else{
                                echo '
                                <div class="item">
                                  <div class="col-md-2">
                                  </div>
                                ';
                              }
                            }
                            ?>
                            <div class="col-md-2">
                              <button class="btn btn-primary btnDias" data-dia="<?php echo date("Y-m-d",strtotime($nuevafecha)); ?>" style="width: 100%;height: 70px;padding: 10px 16px;font-size: 24px;line-height: 1.33;border-radius: 35px;"><?php echo date("d/m/Y",strtotime($nuevafecha)); ?></button>
                            </div> 
                            <?php
                            if($cont==4){
                              echo '
                                <div class="col-md-2">
                                </div>
                              </div>
                              ';
                              $cont=0;
                            }
                            $conTodo++;
                            $cont++;
                            $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
                            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                           // echo "compara ".$nuevafecha." con ".$nuevafinal;
                            /*if($conTodo==50){
                              echo "termino";
                              exit();
                            }*/
                          }
                        ?>
                          
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                      </div>

                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle">Día Seleccionado: <span id="diaSeleccionado"></span></h2>
                        
                        <div class="row" id="horarios">
                          <div class="col-md-6 col-md-offset-3">
                            <h3>Seleccione una Hora</h3>
                            <?php 
                              foreach ($modelHoras as $key => $value) {
                                echo '
                                  <button class="btn btn-primary btnHora" data-hora="'.$value->hora.'" style="width: 100%;height: 70px;padding: 10px 16px;font-size: 24px;line-height: 1.33;border-radius: 35px;">'.$value->hora.'</button>
                                ';
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle">Ingresa tus datos</h2>

                         <form class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombres <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombres" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nit <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nit" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="correo" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="telefono" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Odontologo <span class="required">*</span>
                          </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="id_odontologo" name="id_odontologo" required>
                              <option value="">-Elije un Odontologo-</option>
                              <?php 
                                $modelOdon = Usuario::model()->findAll("id_rol = 5 and status=1 and id_app=".$modelApp->id);
                                foreach ($modelOdon as $key => $value) {
                                  echo '<option value='.$value->id.'>'.$value->nombres." ".$value->apellidos.'</option>';
                                }
                              ?>
                            </select>
                            </div>                          
                        </div>

                        <div class="form-group">
                          
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="id_estado" name="id_estado" required>
                              <option value="">-Elije un Estado-</option>
                              <?php 
                                $modelOdon = ConsultaEstado::model()->findAll();
                                foreach ($modelOdon as $key => $value) {
                                  echo '<option value='.$value->id.'>'.$value->titulo.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Motivo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="id_motivo" name="id_motivo" required>
                              <option value="">-Elije un Motivo-</option>
                              <?php 
                                $modelOdon = ConsultaMotivo::model()->findAll();
                                foreach ($modelOdon as $key => $value) {
                                  echo '<option value='.$value->id.'>'.$value->titulo.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <textarea class="form-control col-md-7 col-xs-12" id="observaciones" name="observaciones" placeholder="Observaciones"></textarea>
                          </div>
                        </div>

                        </form>
                        
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle">Cita reservada con Exito</h2>
                        <p>
                         
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->

                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <!-- /page content -->


         <footer>
          <div class="pull-right">
            Desarrollado por <a href="https://2web.us">2Web</a>
          </div>
          <div class="clearfix"></div>
        </footer>

         <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

   

    <!-- FullCalendar -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/build/js/custom.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->

    <script type="text/javascript">

      var dia;
      var hora;
      var cuentaPasos = 0;
      $(".btnDias").click(function(){
        console.log("click dia "+$(this).attr("data-dia"));
        dia = $(this).attr("data-dia");
        $(".buttonNext").click();
        $("#diaSeleccionado").empty();
        $("#diaSeleccionado").append(""+$(this).attr("data-dia"));
      });

      $(".btnHora").click(function(){
        console.log("click dia "+$(this).attr("data-hora"));
        hora = $(this).attr("data-hora");
        $(".buttonNext").click();
        /*$("#diaSeleccionado").empty();
        $("#diaSeleccionado").append(""+$(this).attr("data-dia"));*/
      });

      $(".buttonNext").click(function(){
        
      });

      function leaveAStepCallback(obj, context){
            //alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
            //console.lof
            cuentaPasos =  context.toStep;
            console.log("VA EN PASO "+cuentaPasos);
            if(context.fromStep==3){
              console.log("Mandar a Ajax dia "+dia+" hora "+hora);


              $.ajax(
                {
                  url: "<?php echo Yii::app()->createUrl("agenda/guardarCitaPublica"); ?>", 
                  type: "POST",
                  dataType: "json",
                  data :{
                    nit : $("#nit").val(),
                    nombre : $("#nombres").val(),
                    email : $("#correo").val(),
                    telefono : $("#telefono").val(),
                    id_motivo : $("#id_motivo").val(),
                    id_odontologo : $("#id_odontologo").val(),
                    id_estado : $("#id_estado").val(),
                    observaciones : $("#observaciones").val(),
                    fecha_inicio : dia,
                    hora_inicio : hora,
                    duracion : 60,
                    id_app: <?php echo $modelApp->id; ?>
                  },
                  success: function(data){
                  //console.log("RESP "+data.status);
                  if(!data.status){
                   
                  }
                  else{
                    
                  }
                }
              });
            }
        }
    </script>
  
  

  </body>
</html>