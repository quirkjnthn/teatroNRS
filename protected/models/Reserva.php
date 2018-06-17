<?php

/**
 * This is the model class for table "reserva".
 *
 * The followings are the available columns in table 'reserva':
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $status
 * @property integer $id_funcion
 *
 * The followings are the available model relations:
 * @property ButacaReserva[] $butacaReservas
 * @property Funcion $idFuncion
 * @property Usuario $idUsuario
 */
class Reserva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, status, id_funcion', 'required'),
			array('id_usuario, status, id_funcion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, status, id_funcion', 'safe', 'on'=>'search'),
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
			'butacaReservas' => array(self::HAS_MANY, 'ButacaReserva', 'id_reserva'),
			'idFuncion' => array(self::BELONGS_TO, 'Funcion', 'id_funcion'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
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
			'id_funcion' => 'Id Funcion',
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
		$criteria->compare('id_funcion',$this->id_funcion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reserva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
