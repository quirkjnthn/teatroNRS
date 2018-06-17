
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
  <?php 
    if(Yii::app()->user->getState("id_rol")==1){
  ?>
		<h1>Todas las Reservas</h1>
  <?php 
  }
  else{
    ?>
    <h1>Mis Reservas</h1>
  <?php
  }
  ?>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Listado de Reservas</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">					
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Función</th>
                  <th>Butacas Reservadas</th>
                  <th>Cliente</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              	foreach($modelReser as $key => $value) {
              ?>
                <tr>
                  <td><?php echo date("d/m/Y", strtotime($value->idFuncion->fecha)); ?></td>
                  <td><?php echo count($value->butacaReservas); ?></td>
                  <td><?php echo $value->idUsuario->nombres." ".$value->idUsuario->apellidos; ?></td>
                  <td><span class="label label-<?php echo($value->status == 1)?"success":"warning" ?>"><?php echo ($value->status == 1)?'Activo':'Inactivo'; ?></span>
                  </td>
                  <td>
                  	<div class="btn-group btn-group-xs">
      						<a href="<?php echo $this->createUrl('misreservas/detalle/'.$value->id); ?>" data-toggle="tooltip" title="Ver" class="btn btn-default"><i class="fa fa-edit"></i></a>	
					</div>
				   </td>
                </tr>
               	<?php } ?>
                </tbody>
            </table>
			
			
          </div>
        </div>
       </div>
    </div>