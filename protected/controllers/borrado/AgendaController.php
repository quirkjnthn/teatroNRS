<?php

class AgendaController extends Controller
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
				'actions'=>array('admin','delete','borrado','puente','datosRegistrado','guardarCita','consultaCita','actualizaCita','reservaCita'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('actualizaCita','reservaCita','guardarCitaPublica'),
				'users'=>array('*'),
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

	public function actionReservaCita($id)
	{
		$modelApp = Aplicacion::model()->findByPk($id);
		$modelConf = ConfiguracionAgenda::model()->find("id_aplicacion=".$modelApp->id);
		$modelHoras = Horas::model()->findAll("hora >='".date("H:s",strtotime($modelConf->hora_inicio))."' and hora < '".date("H:s",strtotime($modelConf->hora_fin))."'");
		$this->layout="vacio";
		$this->render('reservaCita',array(
			'modelApp'=>$modelApp,
			'modelConf'=>$modelConf,
			'modelHoras'=>$modelHoras,
		));
	}

	public function actionConsultaCita()
	{
		$modelCita = Cita::model()->find("id = ".$_POST['id_cita']."");
		
		if(!$modelCita){
			$resp = array(
						"status" 	=> false,
						"mensaje" 	=> "No hay registros."				
					);
		}
		else{
			$modelUsuario = Usuario::model()->findByPk($modelCita->id_paciente);
			$resp = array(
						"status" 	=> true,
						"nombre" 	=> "".$modelUsuario->nombres." ".$modelUsuario->apellidos,
						"telefono" 	=> "".$modelUsuario->telefono,
						"email" 	=> "".$modelUsuario->username,
						"nit" 	=> "".$modelUsuario->nit,
						"id_motivo" 	=> "".$modelCita->id_motivo,
						"observaciones" 	=> "".$modelCita->observaciones,
						"id_odontologo" 	=> "".$modelCita->id_odontologo,
						"id_sucursal" 	=> "".$modelCita->id_sucursal,
						"id_estado" 	=> "".$modelCita->id_estado,
						"fecha_inicio" 	=> "".date("d/m/Y H:i:s",strtotime($modelCita->fecha_inicio)),
						"duracion" 	=> "".abs($modelCita->duracion),
					);
		}

		$jwt = json_encode($resp);
		echo $jwt;
	}

	public function actionActualizaCita()
	{

		$modelCita = Cita::model()->findByPk($_POST["id_cita"]);
		
		$modelCita->id_odontologo = $_POST["id_odontologo"];
		$modelCita->id_motivo = $_POST["id_motivo"];
		$modelCita->id_estado = $_POST["id_estado"];
		$modelCita->id_sucursal = $_POST["id_sucursal"];
		$modelCita->observaciones = $_POST["observaciones"];		
		$modelCita->save();

		//print_r($modelCita->getErrors());

		$resp = array(
						"status" 	=> true,
						"mensaje" 	=> "Cita Guardada con Exito."				
					);

		$jwt = json_encode($resp);
		echo $jwt;
	}

	public function actionGuardarCitaPublica()
	{

		//var_dump($_POST);
		$modelUsuario = Usuario::model()->find("nit = '".$_POST['nit']."' and id_app=".Yii::app()->user->getState("id_app")." and status!=2 and id_rol=6");

		//echo "FECHA-> ".date("Y-m-d",strtotime($_POST["fecha_inicio"]))." ".$_POST["hora_inicio"].":00";
		$fechaInicial = date("Y-m-d",strtotime($_POST["fecha_inicio"]))." ".$_POST["hora_inicio"].":00";

		$nuevafinal = date('Y-m-d H:i:s',strtotime ( '+1 hour' , strtotime ( $fechaInicial ) )) ;
        //echo "Fecha fin ".$nuevafinal;

		//exit();
		if(!$modelUsuario){
			$modelUsuario = new Usuario;
			$modelUsuario->username = $_POST["email"];
			$modelUsuario->nombres = $_POST["nombre"];
			$modelUsuario->apellidos = ".";
			$modelUsuario->nit = $_POST["nit"];
			$modelUsuario->telefono = $_POST["telefono"];
			$modelUsuario->id_rol = 6;
			$modelUsuario->tipo_usuario = 2;
			$modelUsuario->id_app = $_POST["id_app"];
			$modelUsuario->password = "827ccb0eea8a706c4c34a16891f84e7b";
			$modelUsuario->status = 1;
			$modelUsuario->imagen = "imagen";
			$modelUsuario->id_padre = 1;
			$modelUsuario->save();
			
		}
		
		$modelCita = new Cita;
		$modelCita->id_paciente = $modelUsuario->primaryKey;
		$modelCita->id_odontologo = $_POST["id_odontologo"];
		$modelCita->fecha_inicio = $fechaInicial;
		$modelCita->fecha_fin = $nuevafinal;
		$modelCita->duracion = 60;
		$modelCita->id_motivo = $_POST["id_motivo"];
		$modelCita->id_estado = $_POST["id_estado"];
		$modelCita->observaciones = $_POST["observaciones"];
		$modelCita->id_app = $_POST["id_app"];
		$modelCita->save();

		$resp = array(
						"status" 	=> true,
						"mensaje" 	=> "Cita Guardada con Exito."				
					);

		$jwt = json_encode($resp);
		echo $jwt;
	}

	public function actionGuardarCita()
	{

		//var_dump($_POST);
		$modelUsuario = Usuario::model()->find("nit = '".$_POST['nit']."' and id_app=".Yii::app()->user->getState("id_app")." and status!=2 and id_rol=6");

		//exit();
		if(!$modelUsuario){
			$modelUsuario = new Usuario;
			$modelUsuario->username = $_POST["email"];
			$modelUsuario->nombres = $_POST["nombre"];
			$modelUsuario->apellidos = ".";
			$modelUsuario->nit = $_POST["nit"];
			$modelUsuario->telefono = $_POST["telefono"];
			$modelUsuario->id_rol = 6;
			$modelUsuario->tipo_usuario = 2;
			$modelUsuario->id_app = Yii::app()->user->getState("id_app");
			$modelUsuario->password = "827ccb0eea8a706c4c34a16891f84e7b";
			$modelUsuario->status = 1;
			$modelUsuario->imagen = "imagen";
			$modelUsuario->id_padre = Yii::app()->user->id;
			$modelUsuario->save();
			
		}
		
		$modelCita = new Cita;
		$modelCita->id_paciente = $modelUsuario->primaryKey;
		$modelCita->id_odontologo = $_POST["id_odontologo"];
		$modelCita->fecha_inicio = $_POST["fecha_inicio"];
		$modelCita->fecha_fin = $_POST["fecha_fin"];
		$modelCita->duracion = $_POST["duracion"];
		$modelCita->id_motivo = $_POST["id_motivo"];
		$modelCita->id_sucursal = $_POST["id_sucursal"];
		$modelCita->id_estado = $_POST["id_estado"];
		$modelCita->observaciones = $_POST["observaciones"];
		$modelCita->id_app = Yii::app()->user->getState("id_app");
		$modelCita->save();

		$resp = array(
						"status" 	=> true,
						"id_cita" 	=> $modelCita->primaryKey,
						"mensaje" 	=> "Cita Guardada con Exito."				
					);

		$jwt = json_encode($resp);
		echo $jwt;
	}

	public function actionDatosRegistrado()
	{
		$modelUsuario = Usuario::model()->find("nit = '".$_POST['nit']."' and id_app=".Yii::app()->user->getState("id_app")." and status!=2 and id_rol=6");
		
		if(!$modelUsuario){
			$resp = array(
						"status" 	=> false,
						"mensaje" 	=> "No hay registros."				
					);
		}
		else{
			$resp = array(
						"status" 	=> true,
						"nombre" 	=> "".$modelUsuario->nombres." ".$modelUsuario->apellidos,
						"telefono" 	=> "".$modelUsuario->telefono,
						"email" 	=> "".$modelUsuario->username,
					);
		}

		$jwt = json_encode($resp);
		echo $jwt;
	}

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
