<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/

		$modelUser = Usuario::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		if($modelUser===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($modelUser->password!==md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id = $modelUser->id;
			$this->setState("username",$modelUser->username);
			$this->setState("id",$modelUser->id);
			$this->setState("tipo_usuario",$modelUser->tipo_usuario);
			$this->setState("id_rol",$modelUser->id_rol);
			$this->setState("nombre",$modelUser->nombres." ".$modelUser->apellidos);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}