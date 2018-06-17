
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Admin. Aplicaciones</h1>
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12">
		<a href="<?php echo Yii::app()->createUrl("aplicacion/create"); ?>" class="btn btn-primary" style="float: right;margin-top: 20px">Nueva Aplicación</a>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Listado de Aplicaciones</small></h2>
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
                  <th>Nombre</th>
                  <th>Subdominio</th>
                  <th>Propietario</th>
                  <th>F. Creación</th>
                  <th>F. Vencimiento</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              	foreach($model as $key => $value) {
              ?>
                <tr>
                  <td><?php echo $value->nombre; ?></td>
                  <td><?php echo $value->subdominio; ?></td>
                  <td><?php 
                    $modelPropietario = Usuario::model()->findByPk($value->id_usuario);
                    echo $modelPropietario->nombres." ".$modelPropietario->apellidos." <br> ".$modelPropietario->username; ?>
                  </td> 
                  <td><?php echo date("d/m/Y",strtotime($value->fecha_creacion)); ?></td>
                  <td><?php 
                    if($value->status==1)
                      echo "N/A";
                    else
                      echo date("d/m/Y",strtotime($value->fecha_vencimiento)); 
                    ?>                    
                  </td>
                  <td><span class="label label-<?php echo ($value->status == 1)?"success":"warning" ?>"><?php echo ($value->status == 1)?'Activo':'Inactivo'; ?></span>
                  </td>
                  <td>
                  	<div class="btn-group btn-group-xs">
                      <a href="<?php echo $this->createUrl('agenda/puente')."/".$value->id; ?>" data-toggle="tooltip" title="Ir a la Aplicación" class="btn btn-default"><i class="fa fa-external-link-square"></i></a>
                  		<?php if($value->status == 1){ ?>
          							<a href="<?php echo $this->createUrl('aplicacion/status')."/".$value->id; ?>" data-toggle="tooltip" title="Invactivar" class="btn btn-default"><i class="fa fa-minus-circle"></i></a>
          						<?php } else{ ?>
          							<a href="<?php echo $this->createUrl('aplicacion/status')."/".$value->id; ?>" data-toggle="tooltip" title="Activar" class="btn btn-default"><i class="fa fa-check"></i></a>
          						<?php } ?>
          						<a href="<?php echo $this->createUrl('aplicacion/update/'.$value->id); ?>" data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>	
          						<a onclick='return confirm("¿Seguro de borrar este registro?")' href="<?php echo $this->createUrl('aplicacion/borrado/'.$value->id); ?>" data-toggle="tooltip" title="Eliminar" class="btn btn-default"><i class="fa fa-remove"></i></a>	
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