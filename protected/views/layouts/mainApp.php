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

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?php echo Yii::app()->user->getState("name_app"); ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo Yii::app()->user->nombre?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo Yii::app()->createUrl("agenda/admin"); ?>"><i class="fa fa-calendar"></i> Agenda</a></li>
                  <li><a><i class="fa fa-gear"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo Yii::app()->createUrl("configuracionagenda/general"); ?>"> Agenda</a></li>                  
                      <li><a href="<?php echo Yii::app()->createUrl("sucursales/admin"); ?>"> Sucursales</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php 
                    	if(Yii::app()->user->id_rol==1 || Yii::app()->user->id_rol==2){
                    		if(Yii::app()->user->id_rol==1){
                    ?>
                      <li><a href="<?php echo Yii::app()->createUrl("odontologo/admin"); ?>">Odontologo</a></li>
                      <li><a href="<?php echo Yii::app()->createUrl("paciente/admin"); ?>">Paciente</a></li>
                    <?php } ?>
                     <?php } ?>
                    </ul>
                  </li>

                  
                  <!--li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li-->
                </ul>
              </div>
              <!--div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div-->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo Yii::app()->createUrl("site/logout"); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt=""><?php echo Yii::app()->user->nombre?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!--li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li-->
                    <li><a href="<?php echo Yii::app()->createUrl("site/logout"); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!--li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li-->

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          
        <?php echo $content; ?>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Desarrollado por <a href="https://2web.us">2Web</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    

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
	  
    <!-- CONSULTA DE AGENDA -->
    <?php 
      $modelConfAgenda = ConfiguracionAgenda::model()->find("id_aplicacion=".Yii::app()->user->getState("id_app"));
    ?>

    <script>
      $(function() {

        //$("#alertaError").hide();

        if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
        console.log('init_calendar');

        var date = new Date(),
          d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear(),
          started,
          ended,
          categoryClass;

        var calendar = $('#calendar').fullCalendar({ 
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay,listMonth'
            },
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
            dayNames:['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado'],
            dayNamesShort:['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
            buttonText: {
              today:    'Hoy',
              month:    'Mes',
              week:     'Semana',
              day:      'Día',
              list:     'Listado'
            },
            noEventsMessage: "No hay citas pautadas",
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
            $('#fc_create').click();


            console.log("Primero start "+moment(start).format('YYYY-MM-DD HH:mm:SS')+" end "+moment(end).format('YYYY-MM-DD HH:mm:SS')); 
            /*var start_date =  $('#calendar').fullCalendar('getView').start;
            var end_date  =   $('#calendar').fullCalendar('getView').end;
            console.log(start_date.toDate() +'sart----------end date '+end_date.toDate());*/
            

            $("#fechaMuesta").empty();
            $("#fechaMuesta").append(moment(start).format('DD/MM/YYYY HH:mm:SS'));

            var now = moment(start); //todays date
            var end = moment(end);
            var duration = moment.duration(now.diff(end));
            var days = duration.asMinutes();

            $("#duracionMuesta").empty();
            $("#duracionMuesta").append(Math.abs(days));

            started = start;
            ended = end;
            },
            eventClick: function(calEvent, jsEvent, view) {
            $('#fc_edit').click();
            $('#title2').val(calEvent.title);
            console.log("ID ES "+calEvent.id);
            $("#idActualiza2").val(calEvent.id);

            $.ajax(
                {
                  url: "<?php echo Yii::app()->createUrl("agenda/consultaCita"); ?>", 
                  type: "POST",
                  dataType: "json",
                  data :{
                    id_cita : calEvent.id,
                  },
                  success: function(data){
                  //console.log("RESP "+data.status);

                  $("#nit2").val(data.nit);
                  $("#nombre2").val(data.nombre);
                  $("#email2").val(data.email);
                  $("#telefono2").val(data.telefono);
                  $("#id_motivo2").val(data.id_motivo);
                  $("#id_sucursal2").val(data.id_sucursal);
                  $("#id_odontologo2").val(data.id_odontologo);
                  $("#id_estado2").val(data.id_estado);
                  $("#observaciones2").val(data.observaciones);
                  $("#fechaMuesta2").empty();
                  $("#fechaMuesta2").append(data.fecha_inicio);
                  $("#duracionMuesta2").empty();
                  $("#duracionMuesta2").append(data.duracion);
                  $("#idActuliza2").val(calEvent.id);

                  if(!data.status){
                   
                  }
                  else{
                    
                  }
                }
              });


            categoryClass = $("#event_type").val();

            calendar.fullCalendar('unselect');
            },
            selectConstraint:{
              start: '00:01', 
              end: '23:59', 
            },
            defaultView: 'agendaWeek',
            allDaySlot: false,
            timeFormat: '<?php echo $modelConfAgenda->formato_hora; ?>',
            minTime: "<?php echo $modelConfAgenda->hora_inicio; ?>",
            maxTime: "<?php echo $modelConfAgenda->hora_fin; ?>",
            slotDuration: '<?php echo $modelConfAgenda->minutos; ?>',
            slotLabelFormat:"<?php echo $modelConfAgenda->formato_hora; ?>",
            axisFormat: '<?php echo $modelConfAgenda->formato_hora; ?>',
            firstDay: <?php echo $modelConfAgenda->primer_dia; ?>,
            hiddenDays:[<?php echo $modelConfAgenda->dias_nolaborales; ?>],
            events: [
            <?php 
              $modelCitas = Cita::model()->findAll("id_app=".Yii::app()->user->getState("id_app"));
              foreach ($modelCitas as $key => $value) {

                $modelCli = Usuario::model()->findByPk($value->id_paciente);
                echo "
                  {
                  title: '".$modelCli->nombres."',
                  start: '".$value->fecha_inicio."',
                  end: '".$value->fecha_fin."',
                  id: '".$value->id."',
                  },
                ";
              }
            ?>
            
            ]

        });

        $(".antosubmit").on("click", function() {
              
              var title = $("#nombre").val();
              /*if (end) {
              ended = end;
              }*/

               console.log("Segundo start "+moment(started).format('YYYY-MM-DD HH:mm:SS')+" end "+moment(ended).format('YYYY-MM-DD HH:mm:SS'));
              
              categoryClass = $("#event_type").val();

              if ($('#nit').val()==null || $('#nit').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes indicar el NIT del paciente.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#nombre').val()==null || $('#nombre').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes indicar el nombre del paciente.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#email').val()==null || $('#email').val()=="") {
                console.log ("VA EN 1");
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes indicar el Correo Electrónico del paciente.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }
              else{
                console.log ("VA EN 2 "+$('#email').val());
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                  if(!regex.test($('#email').val())){
                    console.log ("VA EN 3");
                    $("#spanAlertaError").empty();
                    $("#spanAlertaError").append("Debes indicar el Correo Electrónico valido.");
                    $("#alertaError").show();
                    $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                        $("#alertaError").slideUp(500);
                    });
                  return false;
                  }
              }

              if ($('#telefono').val()==null || $('#telefono').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes indicar el Teléfono del paciente.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#id_odontologo').val()==null || $('#id_odontologo').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes escoger un odontologo.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#id_estado').val()==null || $('#id_estado').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes escoger un estado para la cita.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#id_motivo').val()==null || $('#id_motivo').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes escoger un motivo para la cita.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              if ($('#id_sucursal').val()==null || $('#id_sucursal').val()=="") {
                $("#spanAlertaError").empty();
                $("#spanAlertaError").append("Debes escoger una sucursal para la cita.");
                $("#alertaError").show();
                $("#alertaError").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError").slideUp(500);
                });
                return false;
              }

              var fecha_inicio = moment(started).format('YYYY-MM-DD HH:mm:SS')
              var fecha_fin = moment(ended).format('YYYY-MM-DD HH:mm:SS')
              var now = moment(started); //todays date
              var end = moment(ended);
              var duration = moment.duration(now.diff(end));
              var days = duration.asMinutes();

              $("#duracionMuesta").empty();
              $("#duracionMuesta").append(Math.abs(days));

              $.ajax(
                {
                  url: "<?php echo Yii::app()->createUrl("agenda/guardarCita"); ?>", 
                  type: "POST",
                  dataType: "json",
                  data :{
                    nit : $("#nit").val(),
                    nombre : $("#nombre").val(),
                    email : $("#email").val(),
                    telefono : $("#telefono").val(),
                    id_motivo : $("#id_motivo").val(),
                    id_odontologo : $("#id_odontologo").val(),
                    id_estado : $("#id_estado").val(),
                    id_sucursal : $("#id_sucursal").val(),
                    observaciones : $("#observaciones").val(),
                    fecha_inicio : fecha_inicio,
                    fecha_fin : fecha_fin,
                    duracion : days,
                  },
                  success: function(data){
                  //console.log("RESP "+data.status);

                   if (title) {
                    calendar.fullCalendar('renderEvent', {
                      title: title,
                      start: started,
                      end: ended,
                      id: data.id_cita,
                      //allDay: allDay
                      },
                      true // make the event "stick"
                    );
                    }
                  if(!data.status){
                   
                  }
                  else{
                    
                  }
                }
              });



              $('#nombre').val('');

              calendar.fullCalendar('unselect');

              $('.antoclose').click();

              return false;
            });

            $(".antosubmit2").on("click", function() {


              if ($('#id_odontologo2').val()==null || $('#id_odontologo2').val()=="") {
                $("#spanAlertaError2").empty();
                $("#spanAlertaError2").append("Debes escoger un odontologo.");
                $("#alertaError2").show();
                $("#alertaError2").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError2").slideUp(500);
                });
                return false;
              }

              if ($('#id_estado2').val()==null || $('#id_estado2').val()=="") {
                $("#spanAlertaError2").empty();
                $("#spanAlertaError2").append("Debes escoger un estado para la cita.");
                $("#alertaError2").show();
                $("#alertaError2").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError2").slideUp(500);
                });
                return false;
              }

              if ($('#id_motivo2').val()==null || $('#id_motivo2').val()=="") {
                $("#spanAlertaError2").empty();
                $("#spanAlertaError2").append("Debes escoger un motivo para la cita.");
                $("#alertaError2").show();
                $("#alertaError2").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError2").slideUp(500);
                });
                return false;
              }

              if ($('#id_sucursal2').val()==null || $('#id_sucursal2').val()=="") {
                $("#spanAlertaError2").empty();
                $("#spanAlertaError2").append("Debes escoger una sucursal para la cita.");
                $("#alertaError2").show();
                $("#alertaError2").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alertaError2").slideUp(500);
                });
                return false;
              }

              $.ajax(
                {
                  url: "<?php echo Yii::app()->createUrl("agenda/actualizaCita"); ?>", 
                  type: "POST",
                  dataType: "json",
                  data :{
                    nit : $("#nit2").val(),
                    id_motivo : $("#id_motivo2").val(),
                    id_sucursal : $("#id_sucursal2").val(),
                    id_odontologo : $("#id_odontologo2").val(),
                    id_estado : $("#id_estado2").val(),
                    observaciones : $("#observaciones2").val(),
                    id_cita : $("#idActualiza2").val()
                  },
                  success: function(data){
                  //console.log("RESP "+data.status);
                  if(!data.status){
                   
                  }
                  else{
                    
                  }
                }
              });



              /*calendar.fullCalendar('updateEvent', calEvent);*/
              $('.antoclose2').click();
            });

            $( "#nit" ).focusout(function() {
              
              //console.log("Salio de nit y es "+$(this).val());
              $.ajax(
                {
                  url: "<?php echo Yii::app()->createUrl("agenda/datosRegistrado"); ?>", 
                  type: "POST",
                  dataType: "json",
                  data :{
                    nit : $("#nit").val()
                  },
                  success: function(data){
                  //console.log("RESP "+data.status);
                  if(!data.status){
                    //console.log("no encontrado");
                    $("#nombre").val("");
                    $("#telefono").val("");
                    $("#email").val("");
                  }
                  else{
                    //console.log("encontrado");
                    $("#nombre").val(""+data.nombre);
                    $("#telefono").val(""+data.telefono);
                    $("#email").val(""+data.email);
                  }
                }
              });

            });

            $( "#CalenderModalNew" ).on('show.bs.modal', function (e) {
                $("#nombre").val("");
                $("#telefono").val("");
                $("#email").val("");
                $("#nit").val("");
                $("#observaciones").val("");
                $("#id_motivo").val($("#id_motivo option:first").val());
                $("#id_odontologo").val($("#id_odontologo option:first").val());
                $("#id_estado").val($("#id_estado option:first").val());
            });

      });
    </script>

  </body>
</html>
