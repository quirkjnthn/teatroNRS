
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Reserva de Butacas para la funcion del dia <?php echo date("d/m/Y", strtotime($modelFun->fecha)); ?></h1>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Butacas Disponibles - Cliquea sobre ellas para reservar</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">	

            <div class="row" id="paso1">		
              <div class="col-md-8">		
                <div class="row">
            		  <?php echo $modelFun->get_Butacas(); ?>
                </div>
              </div>

              <div class="col-md-4">  
                <h3>Asientos seleccionados</h3>
                
                <div id="divInfo">
                  <p>Aún no tienes asientos seleccionados.</p>
                </div>

                <form id="formButacas" action="javascript:void(0)" data-url="<?php echo Yii::app()->createUrl("reserva/guardaReserva"); ?>">
                  <input type="hidden" name="id_funcion" value="<?php echo $modelFun->id; ?>">
                  <input type="button" id="submitReserva" disabled name="submit" class="btn btn-success" value="Reservar">
                </form>

              </div>

          </div>

          <div class="row" id="paso2" style="display:none;">    
              <div class="col-md-8 col-md-offset-2">    
                <div class="list-group">
                  <span href="javascript:void(0);" class="list-group-item list-group-item-info" align="center">
                    <h2>Reserva Exitosa</h2>
                  </span>
                  <span href="javascript:void(0);" class="list-group-item" align="center"><b># de Reserva:</b> <span id="numeroReserva"></span></span>
                  <span href="javascript:void(0);" class="list-group-item" align="center"><a href="<?php echo Yii::app()->createUrl("misreservas/admin"); ?>" class="btn btn-primary">Ir a Mis Reservas</a> </span>
                </div>
              </div>
            </div>



          </div>
        </div>
       </div>
    </div>

