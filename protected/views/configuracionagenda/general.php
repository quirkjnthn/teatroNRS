<h1>Conf. General de Agenda</h1>

<?php
/* @var $this AdministradorController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

	<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Datos de la Configuración</h2>
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
            <br />


            <!--form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"-->
            <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'usuario-form',
				'htmlOptions'=>array(
					'class'=>'form-horizontal form-label-left',
				),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
				<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
				<?php echo $form->errorSummary($model); ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'minutos'); ?> 
                <!--br>Nota: Al cambiar esta opción los horarios de los profesionales deben ser reconfigurados.-->
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->dropDownList($model,'minutos',array("00:10:00"=>"10 Minutos","00:15:00"=>"15 Minutos","00:20:00"=>"20 Minutos","00:20:00"=>"30 Minutos","00:60:00"=>"60 Minutos"),array("empty"=>"-Escoja una Opción-","class"=>"form-control col-md-7 col-xs-12")); ?>
                  <?php echo $form->error($model,'minutos'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'primer_dia'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->dropDownList($model,'primer_dia',array("0"=>"Domingo","1"=>"Lunes","2"=>"Martes","3"=>"Miercoles","4"=>"Jueves","5"=>"Viernes","6"=>"Sabado"),array("empty"=>"-Escoja una Opción-","class"=>"form-control col-md-7 col-xs-12")); ?>
                  <?php echo $form->error($model,'primer_dia'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'formato_hora'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->dropDownList($model,'formato_hora',array("HH:mm"=>"24 Hrs.","hh:mm t"=>"AM/PM"),array("empty"=>"-Escoja una Opción-","class"=>"form-control col-md-7 col-xs-12")); ?>
                  <?php echo $form->error($model,'formato_hora'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'hora_inicio'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->dropDownList($model,'hora_inicio',array("00:00:00"=>"12:00 am","01:00:00"=>"01:00 am","02:00:00"=>"02:00 am","03:00:00"=>"03:00 am","04:00:00"=>"04:00 am","05:00:00"=>"05:00 am","06:00:00"=>"06:00 am","07:00:00"=>"07:00 am","08:00:00"=>"08:00 am","09:00:00"=>"09:00 am","10:00:00"=>"10:00 am","11:00:00"=>"11:00 am","12:00:00"=>"12:00 pm","13:00:00"=>"01:00 pm","14:00:00"=>"02:00 pm","15:00:00"=>"03:00 pm","16:00:00"=>"04:00 pm","17:00:00"=>"05:00 pm","18:00:00"=>"06:00 pm","19:00:00"=>"07:00 pm","20:00:00"=>"08:00 pm","21:00:00"=>"09:00 pm","22:00:00"=>"10:00 pm","23:00:00"=>"11:00 pm"),array("empty"=>"-Escoja una Opción-","class"=>"form-control col-md-7 col-xs-12")); ?>
                  <?php echo $form->error($model,'hora_inicio'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'hora_fin'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->dropDownList($model,'hora_fin',array("00:00:00"=>"12:00 am","01:00:00"=>"01:00 am","02:00:00"=>"02:00 am","03:00:00"=>"03:00 am","04:00:00"=>"04:00 am","05:00:00"=>"05:00 am","06:00:00"=>"06:00 am","07:00:00"=>"07:00 am","08:00:00"=>"08:00 am","09:00:00"=>"09:00 am","10:00:00"=>"10:00 am","11:00:00"=>"11:00 am","12:00:00"=>"12:00 pm","13:00:00"=>"01:00 pm","14:00:00"=>"02:00 pm","15:00:00"=>"03:00 pm","16:00:00"=>"04:00 pm","17:00:00"=>"05:00 pm","18:00:00"=>"06:00 pm","19:00:00"=>"07:00 pm","20:00:00"=>"08:00 pm","21:00:00"=>"09:00 pm","22:00:00"=>"10:00 pm","23:00:00"=>"11:00 pm"),array("empty"=>"-Escoja una Opción-","class"=>"form-control col-md-7 col-xs-12")); ?>
                  <?php echo $form->error($model,'hora_fin'); ?>
                </div>
              </div>

              <div class="form-group">
              	<label class="control-label col-md-3 col-sm-3 col-xs-12">Dias a mostrar en la agenda</label>
              	<div class="col-md-6 col-sm-6 col-xs-12">
              		<table class="table table-striped">
              			<tr>
              				<td>Dom</td>
              				<td>Lun</td>
              				<td>Mar</td>
              				<td>Mie</td>
              				<td>Jue</td>
              				<td>Vie</td>
              				<td>Sab</td>
              			</tr>
              			<tr>
              			<?php 
              				$dias = explode(",", $model->dias_nolaborales);
              				for($i=0; $i<=6; $i++){
              					echo '
              						<td>
		              					<div class="checkbox">
										    <label>
										      <input type="checkbox" name="dia'.$i.'"';

									if (!in_array($i , $dias)) {
										echo "checked";
									}

								    echo '>
										    </label>
										  </div>
		              				</td>
              					';
              				}
              			?>
              			</tr>
              		</table>
              	</div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                  
                  <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar',array("class"=>"btn btn-success")); ?>
                </div>
              </div>

            
              <?php $this->endWidget(); ?>

          </div>
        </div>
      </div>
    </div>





</div><!-- form -->
