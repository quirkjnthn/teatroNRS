<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


      <?php
      /* @var $this SiteController */
      /* @var $model LoginForm */
      /* @var $form CActiveForm  */

      $this->pageTitle=Yii::app()->name . ' - Login';
      $this->breadcrumbs=array(
        'Login',
      );
      ?>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'login-form',
              'enableClientValidation'=>true,
              'clientOptions'=>array(
                'validateOnSubmit'=>true, 
              ),
            )); ?>
              <h1>Ingresar</h1>
              <div>
                <!--input type="text" class="form-control" placeholder="Username" required="" /-->
                <?php //echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array("class"=>"form-control","placeholder"=>"Email")); ?>
                <?php echo $form->error($model,'username'); ?>
              </div>
              <div>
                <!--input type="password" class="form-control" placeholder="Password" required="" /-->
                <?php //echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array("class"=>"form-control","placeholder"=>"Email")); ?>
                <?php echo $form->error($model,'password'); ?>
              </div>

              <div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
              </div>

              <div>
                <!--a class="btn btn-default submit" href="#">Ingresar</a-->
                <?php echo CHtml::submitButton('Entrar',array("class"=>"btn btn-default submit")); ?>
                <a class="reset_pass" href="#">¿Olvidaste tu password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Eres nuevo en el sitio?
                  <a href="#signup" class="to_register"> Crea una cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> <?php echo CHtml::encode(Yii::app()->name); ?></h1>
                  <p>©2018 Todos los derechos reservados. <?php echo CHtml::encode(Yii::app()->name); ?></p>
                </div>
              </div>
            <?php $this->endWidget(); ?>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Crear Cuenta</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="#">Crear</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Ya eres miembro?
                  <a href="#signin" class="to_register"> Ingresar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> <?php echo CHtml::encode(Yii::app()->name); ?></h1>
                  <p>©2018 Todos los derechos reservados. <?php echo CHtml::encode(Yii::app()->name); ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>