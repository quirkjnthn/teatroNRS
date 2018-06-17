<?php

class OdontologoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainApp';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','status'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','borrado','horarioPersonal'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->status=1;
			$model->imagen="imagen";
			$model->id_rol=5;
			$model->tipo_usuario=2;
			$model->id_app = Yii::app()->user->getState("id_app");
			$model->password = md5($model->password);
			$model->id_padre = Yii::app()->user->id;
			if($model->save()){
			
			///////////////////////////////CREA HORARIOS PERSONALIZADOS
			$modelDias = Dia::model()->findAll();
			foreach ($modelDias as $keyD => $valueD) {
				$modelHora = Horas::model()->findAll();
				foreach ($modelHora as $keyH => $valueH) {
					$modelSucursal = Sucursal::model()->findAll("id_app=".Yii::app()->user->getState("id_app"));
					foreach ($modelSucursal as $keyS => $valueS) {
						$modelHorarioP = new HorarioPersonal;
						$modelHorarioP->id_odontologo = $model->primaryKey;
						$modelHorarioP->id_hora = $valueH->id;
						$modelHorarioP->id_dia = $valueD->id;
						$modelHorarioP->id_sucursal = $valueS->id;
						$modelHorarioP->status=1;
						$modelHorarioP->save(); 
					}
				}
			}
		
				$this->redirect(array('admin'));
			}
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		echo "AQUI VA";
		exit();
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionBorrado($id)
	{
		$model = $this->loadModel($id);
		$model->status=2;
		$model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */

	public function actionHorarioPersonal($id)
	{

		$model = $this->loadModel($id);
		$modelConf = ConfiguracionAgenda::model()->find("id_aplicacion=".Yii::app()->user->getState("id_app"));
		$modelHoras = Horas::model()->findAll("hora >='".date("H:s",strtotime($modelConf->hora_inicio))."' and hora < '".date("H:s",strtotime($modelConf->hora_fin))."'");
		$modelDias = Dia::model()->findAllBySql('SELECT * FROM `dia` WHERE `id` NOT IN ('.$modelConf->dias_nolaborales.')');
		$modelSucursales = Sucursal::model()->findAll();
		$modelSucursal =  Sucursal::model()->find(array("condition"=>"id_app=".Yii::app()->user->getState("id_app"),"order"=>"id ASC"));


		if(isset($_POST["submit"])){
			
			foreach ($modelHoras as $keyH => $valueH) {
                 foreach ($modelDias as $keD => $valueD) {
                 	$modelModiAgenP = HorarioPersonal::model()->find("id_odontologo=".$id." and id_dia=".$valueD->id." and id_hora=".$valueH->id." and id_sucursal=".$modelSucursal->id);
                 	//echo "<br> Lleva ".count($modelModiAgenP);

                 	if(!isset($_POST["".$valueH->id.'_'.$valueD->id]))
                 		$modelModiAgenP->status=0;                	
                 	else
                 		$modelModiAgenP->status=1;

                 	//echo "<br> va a guardar ".$modelModiAgenP->status;
                 	$modelModiAgenP->save();
                 	//print_r($modelModiAgenP->getErrors());
                 }
             }
             //exit();
			$this->redirect(array('admin'));
		}

		$this->render('horarioPersonal',array(
			'model'=>$model,
			'modelConf'=>$modelConf,
			'modelHoras'=>$modelHoras,
			'modelDias'=>$modelDias,
			'modelSucursales'=>$modelSucursales,
			'modelSucursal'=>$modelSucursal,
		));
	}

	public function actionAdmin()
	{
		//$model=new Usuario('search');

		$model= Usuario::model()->findAll("id_rol=5 and status!=2 and id_app=".Yii::app()->user->id);
		

		/*foreach ($model as $key => $value) {
			$modelDias = Dia::model()->findAll();
			foreach ($modelDias as $keyD => $valueD) {
				$modelHora = Horas::model()->findAll();
				foreach ($modelHora as $keyH => $valueH) {
					$modelSucursal = Sucursal::model()->findAll("id_app=".Yii::app()->user->getState("id_app"));
					foreach ($modelSucursal as $keyS => $valueS) {
						$modelHorarioP = new HorarioPersonal;
						$modelHorarioP->id_odontologo = $value->id;
						$modelHorarioP->id_hora = $valueH->id;
						$modelHorarioP->id_dia = $valueD->id;
						$modelHorarioP->id_sucursal = $valueS->id;
						$modelHorarioP->status=1;
						$modelHorarioP->save(); 
						print_r($modelHorarioP->getErrors());

						echo "va a guardar <br>";

					}
				}
			}
		}
		echo "fin";
		exit();*/
		/*$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];
		*/
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionStatus($id){
        $page = $this->loadModel($id);
        if($page->status == 1)
            $page->status = 0;
        else if($page->status == 0)
            $page->status = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $page->save();

        $this->redirect(array('admin'));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
