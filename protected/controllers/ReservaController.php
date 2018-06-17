<?php

class ReservaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('admin','butacas','guardaReserva'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionGuardaReserva()
	{
		$modelFun = Funcion::model()->findByPk($_POST["id_funcion"]);		
		
		$modelReserva = new Reserva;
		$modelReserva->id_usuario = Yii::app()->user->getState("id");
		$modelReserva->id_funcion = $_POST["id_funcion"];
		$modelReserva->status = 1;
		$modelReserva->save();

		foreach ($modelFun->butacaReservas as $key => $value) {
			if(isset($_POST["butaca".$value->id_butaca])){
				 $value->status=1;
				 $value->id_reserva = $modelReserva->primaryKey;
				 $value->save();
			}
		}
		echo "".$modelReserva->primaryKey;
	}

	public function actionButacas()
	{		

		$modelFun = Funcion::model()->findByPk($_GET["fecha_funcion"]);
		$this->render('butacas',array(
			'modelFun'=>$modelFun,
		));
	}

	public function actionAdmin()
	{		
		$modelFunciones = new Funcion;
		$this->render('admin',array(
			'modelFunciones'=>$modelFunciones,
		));
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
