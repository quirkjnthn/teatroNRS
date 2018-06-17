<?php

class ConfiguracionagendaController extends Controller
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
				'actions'=>array('admin','delete','borrado','puente','general'),
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
		$model=new Aplicacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aplicacion']))
		{
			$model->attributes=$_POST['Aplicacion'];
			$model->status=1;
			$model->logo="imagen";
			$model->fecha_creacion=date("Y-m-d");
			$model->fecha_vencimiento="procesando";
			if($model->save())
				$this->redirect(array('admin'));
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

		if(isset($_POST['Aplicacion']))
		{
			$model->attributes=$_POST['Aplicacion'];
			if($model->save())
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionGeneral()
	{
		$model=ConfiguracionAgenda::model()->find("id_aplicacion=".Yii::app()->user->getState("id_app"));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConfiguracionAgenda']))
		{
			$model->attributes=$_POST['ConfiguracionAgenda'];

			//var_dump($_POST);
			$dias_nolaborales = array();
			for($i=0; $i<=6; $i++){
				if(!isset($_POST["dia".$i])){
					$dias_nolaborales[]=$i;
				}
			}
			$diasaguardar = implode(",", $dias_nolaborales);
			$model->dias_nolaborales = $diasaguardar;
			//echo "A guardar ".$diasaguardar;
			//exit();

			if($model->save())
				$this->redirect(array('general'));
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('general',array(
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
	public function actionPuente($id)
	{
		Yii::app()->user->setState("id_app",$id);	
		$modelApp = Aplicacion::model()->findByPk($id);	
		Yii::app()->user->setState("name_app",$modelApp->nombre);

		$this->redirect(array("admin"));
	}

	public function actionAdmin()
	{		
		$model= Aplicacion::model()->findAll("status!=2");
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
		$model=Aplicacion::model()->findByPk($id);
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