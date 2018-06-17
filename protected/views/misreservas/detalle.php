
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Detalles de la Reserva</h1>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Información</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">					
            
			       <div class="row">    
              <div class="col-md-8 col-md-offset-2">    
                <div class="list-group">
                  <span href="javascript:void(0);" class="list-group-item list-group-item-info" align="center">
                    <h2><b># de Reserva: </b><?php echo $modelReser->id; ?></h2>
                  </span>
                  <span href="javascript:void(0);" class="list-group-item" align="center"><b>Butacas Reservadas</b> </span>
                  <?php 
                    foreach ($modelReser->butacaReservas as $key => $value) {
                  ?>
                    <span href="javascript:void(0);" class="list-group-item" align="center">
                      Butaca #:<?php echo $value->id_butaca; ?><br>
                      Fila #:<?php echo $value->idButaca->fila; ?><br>
                      Columna #:<?php echo $value->idButaca->columna; ?><br>
                      </span>
                  <?php
                    }
                  ?>
                  
                </div>
              </div>
            </div>
			
          </div>
        </div>
       </div>
    </div>