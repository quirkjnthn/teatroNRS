<!-- page content -->
   
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Admin. Calendario <small>Cliquea para agregar/editar una cita</small></h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendario de Citas <small></small></h2>
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

                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
 
        <!-- /page content -->

        <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Agregar Cita</h4>
          </div>
          <div class="modal-body">


            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT*">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo*">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico*">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de referencia*">
                  </div>
                </div>
                <hr>
                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="col-xs-12">
                        <select class="form-control" id="id_odontologo" name="id_odontologo" required>
                          <option value="">-Elije un Odontologo-</option>
                          <?php 
                            $modelOdon = Usuario::model()->findAll("id_rol = 5 and status=1 and id_app=".Yii::app()->user->getState("id_app"));
                            foreach ($modelOdon as $key => $value) {
                              echo '<option value='.$value->id.'>'.$value->nombres." ".$value->apellidos.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
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
                      <div class="col-xs-12">
                        Fecha: <span id="fechaMuesta"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                        Duración: <span id="duracionMuesta"></span> Minutos
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="col-xs-12">
                        <select class="form-control" id="id_motivo" name="id_motivo" required>
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
                      <div class="col-xs-12">
                        <select class="form-control" id="id_sucursal" name="id_sucursal" required>
                          <option value="">-Elije una Sucursal-</option>
                          <?php 
                            $modelOdon = Sucursal::model()->findAll("id_app=".Yii::app()->user->getState("id_app")." and status=1");
                            foreach ($modelOdon as $key => $value) {
                              echo '<option value='.$value->id.'>'.$value->titulo.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Observaciones: </label>
                        <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones"></textarea>
                      </div>
                    </div>

                  </div>
                </div>
                
                <!--div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div-->
              </form>

            <div id="alertaError" class="alert alert-danger alert-dismissible" style="display:none; z-index: 1000000;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> <span id="spanAlertaError"></span>
            </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary antosubmit">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Editar Cita</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nit2" name="nit" placeholder="NIT*" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nombre2" name="nombre" placeholder="Nombre Completo*" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="email2" name="email" placeholder="Correo electrónico*" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="number" class="form-control" id="telefono2" name="telefono" placeholder="Teléfono de referencia*" readonly>
                  </div>
                </div>
                <hr>
                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="col-xs-12">
                        <select class="form-control" id="id_odontologo2" name="id_odontologo" required>
                          <option value="">-Elije un Odontologo-</option>
                          <?php 
                            $modelOdon = Usuario::model()->findAll("id_rol = 5 and status=1 and id_app=".Yii::app()->user->getState("id_app"));
                            foreach ($modelOdon as $key => $value) {
                              echo '<option value='.$value->id.'>'.$value->nombres." ".$value->apellidos.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                        <select class="form-control" id="id_estado2" name="id_estado" required>
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
                      <div class="col-xs-12">
                        Fecha: <span id="fechaMuesta2"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                        Duración: <span id="duracionMuesta2"></span> Minutos
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="col-xs-12">
                        <select class="form-control" id="id_motivo2" name="id_motivo" required>
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
                      <div class="col-xs-12">
                        <select class="form-control" id="id_sucursal2" name="id_sucursal" required>
                          <option value="">-Elije una Sucursal-</option>
                          <?php 
                            $modelOdon = Sucursal::model()->findAll("id_app=".Yii::app()->user->getState("id_app")." and status=1");
                            foreach ($modelOdon as $key => $value) {
                              echo '<option value='.$value->id.'>'.$value->titulo.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Observaciones: </label>
                        <textarea class="form-control" id="observaciones2" name="observaciones" placeholder="Observaciones"></textarea>
                      </div>
                    </div>

                  </div>
                </div>
                <input type="hidden" name="idActualiza2" id="idActualiza2" value="">

              </form>

              <div id="alertaError2" class="alert alert-danger alert-dismissible" style="display:none; z-index: 1000000;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> <span id="spanAlertaError2"></span>
            </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger antoclose2" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary antosubmit2">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
