
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h1>Admin. Horario Personal</h1>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Horario de Laborables</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">					

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
            
			     <table class="table table-striped">

            <tr>
              <th>Horario\Día</th>
            <?php 
              foreach ($modelDias as $keD => $valueD) {
                echo '<th>'.$valueD->titulo.'</th>';
              }
            ?>
            </tr>

            <?php 
              foreach ($modelHoras as $keyH => $valueH) {
                 echo '<tr><th>'.$valueH->titulo.'</th>';
                 foreach ($modelDias as $keD => $valueD) {
                  $modelHoraP = HorarioPersonal::model()->find("id_odontologo = ".$model->id." and id_sucursal=".$modelSucursal->id." and id_dia=".$valueD->id." and id_hora=".$valueH->id);
                  if($modelHoraP->status==1){
                    echo '<th>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" checked name="'.$valueH->id.'_'.$valueD->id.'">
                              </label>
                            </div>
                          </th>';
                  }else{
                    echo '<th>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="'.$valueH->id.'_'.$valueD->id.'">
                              </label>
                            </div>
                          </th>';
                  }
                }
                echo '</tr>';
              }
            ?>

           </table>
           <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
           <?php $this->endWidget(); ?>
			
          </div>
        </div>
       </div>
    </div>