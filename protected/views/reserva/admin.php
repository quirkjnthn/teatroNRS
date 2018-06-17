
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Elije una Funcion para tu reserva</h1>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Funciones Disponibles</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">					
            		<div class="row">
                  <div class="col-md-6 col-md-offset-3" align="center">
    			          <?php
                      echo $modelFunciones->get_Funciones();
                     ?>
                  </div>
                </div>
          </div>
        </div>
       </div>
    </div>