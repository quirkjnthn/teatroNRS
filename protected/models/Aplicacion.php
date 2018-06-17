<?php

/**
 * This is the model class for table "aplicacion".
 *
 * The followings are the available columns in table 'aplicacion':
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $status
 * @property string $fecha_creacion
 * @property string $nombre
 * @property string $subdominio
 * @property string $fecha_vencimiento
 * @property integer $id_plan
 * @property string $logo
 */
class Aplicacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aplicacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, status, fecha_creacion, nombre, subdominio, fecha_vencimiento', 'required'),
			array('id_usuario, status, id_plan', 'numerical', 'integerOnly'=>true),
			array('fecha_creacion, nombre, subdominio, fecha_vencimiento, logo', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, status, fecha_creacion, nombre, subdominio, fecha_vencimiento, id_plan, logo', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'status' => 'Status',
			'fecha_creacion' => 'Fecha Creacion',
			'nombre' => 'Nombre',
			'subdominio' => 'Subdominio',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'id_plan' => 'Id Plan',
			'logo' => 'Logo',
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
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('status',$this->status);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('subdominio',$this->subdominio,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('id_plan',$this->id_plan);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aplicacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
