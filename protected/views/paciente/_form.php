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
            <h2>Datos del Paciente</h2>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo $form->labelEx($model,'nombres'); ?>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"-->
					<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
					<?php echo $form->error($model,'nombres'); ?>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'apellidos'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
					<?php echo $form->error($model,'apellidos'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'nit'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->textField($model,'nit',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
                  <?php echo $form->error($model,'nit'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $form->labelEx($model,'telefono'); ?> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"-->
                  <?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
          <?php echo $form->error($model,'telefono'); ?>
                </div>
              </div>


              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $form->labelEx($model,'username'); ?> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"-->
                  <?php echo $form->emailField($model,'username',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
					<?php echo $form->error($model,'username'); ?>
                </div>
              </div>


              <?php 
              if($model->isNewRecord){
              ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $form->labelEx($model,'password'); ?>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!--input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"-->
                  <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100,"class"=>"form-control col-md-7 col-xs-12","required"=>true)); ?>
					<?php echo $form->error($model,'password'); ?>
                </div>
              </div>
              <?php } ?>


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