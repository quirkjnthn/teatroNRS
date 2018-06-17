
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Funciones</h1>
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12">
		<a href="<?php echo Yii::app()->createUrl("funciones/create"); ?>" class="btn btn-primary" style="float: right;margin-top: 20px">Agregar Funciones</a>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Listado de Funciones</small></h2>
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
                  <th>Fecha</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              	foreach($model as $key => $value) {
              ?>
                <tr>
                  <td><?php echo date("d/m/Y", strtotime($value->fecha)); ?></td>
                  <td><span class="label label-<?php echo($value->status == 1)?"success":"warning" ?>"><?php echo ($value->status == 1)?'Activo':'Inactivo'; ?></span>
                  </td>
                  <td>
                  	<div class="btn-group btn-group-xs">
                  		<?php if($value->status == 1){ ?>
      							<a href="<?php echo $this->createUrl('funciones/status')."/".$value->id; ?>" data-toggle="tooltip" title="Invactivar" class="btn btn-default"><i class="fa fa-minus-circle"></i></a>
      						<?php } else{ ?>
      							<a href="<?php echo $this->createUrl('funciones/status')."/".$value->id; ?>" data-toggle="tooltip" title="Activar" class="btn btn-default"><i class="fa fa-check"></i></a>
      						<?php } ?>
      						<!--a href="<?php echo $this->createUrl('funciones/update/'.$value->id); ?>" data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a-->	
      						<a onclick='return confirm("¿Seguro de borrar este registro?")' href="<?php echo $this->createUrl('funciones/borrado/'.$value->id); ?>" data-toggle="tooltip" title="Eliminar" class="btn btn-default"><i class="fa fa-remove"></i></a>	
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