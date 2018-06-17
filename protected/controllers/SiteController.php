<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//echo "AQUI VA ".Yii::app()->user->tipo_usuario;
				
					////////ADMINISTRADOR DEL SISTEMA
					if(Yii::app()->user->id_rol==1){
						/*echo "Admin del Sistem";
						exit();*/
						$this->redirect(array("administradores/admin"));
					}

					////////RESELLER
					if(Yii::app()->user->id_rol==2){
						$this->redirect(array("reserva/admin"));
					}

					////////ADMINISTRADOR DE APLICACION CLIENTE PRINCIPAL
					if(Yii::app()->user->id_rol==3){

					}

					////////ODONTOLOGO
					if(Yii::app()->user->id_rol==4){

					}

				//$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->layout="log-in";
		$this->render('index',array('model'=>$model));

		/*$this->layout="vacio";

		$this->render('index');*/
	}

	public function actionPrincipal()
	{
		
		$this->render('principal');
	}

	public function actionIndex2()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index2');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//echo "AQUI VA ".Yii::app()->user->tipo_usuario;
				
					////////ADMINISTRADOR DEL SISTEMA
					if(Yii::app()->user->id_rol==1){
						/*echo "Admin del Sistem";
						exit();*/
						$this->redirect(array("administrador/admin"));
					}

					////////RESELLER
					if(Yii::app()->user->id_rol==2){

					}

					////////ADMINISTRADOR DE APLICACION CLIENTE PRINCIPAL
					if(Yii::app()->user->id_rol==3){

					}

					////////ODONTOLOGO
					if(Yii::app()->user->id_rol==4){

					}

				//$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->layout="vacio";
		$this->render('index',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}