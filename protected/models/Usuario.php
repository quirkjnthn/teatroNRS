<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $tipo_usuario
 * @property integer $id_rol
 * @property string $nombres
 * @property string $apellidos
 * @property integer $status
 * @property string $imagen
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, tipo_usuario, id_rol, nombres, apellidos', 'required'),
			array('tipo_usuario, id_rol, status', 'numerical', 'integerOnly'=>true),
			array('username, password, nombres, apellidos, imagen, nit, telefono', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, tipo_usuario, id_rol, nombres, apellidos, status, imagen', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function getSelectName()
	{
		return $this->nombres." ".$this->apellidos." - ".$this->username;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Email',
			'password' => 'Password',
			'tipo_usuario' => 'Tipo Usuario',
			'id_rol' => 'Id Rol',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'status' => 'Status',
			'imagen' => 'Imagen',
			'nit' => 'Nit *',
			'telefono' => 'Teléfono *',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tipo_usuario',$this->tipo_usuario);
		$criteria->compare('id_rol',$this->id_rol);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
