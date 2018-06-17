<?php

/**
 * This is the model class for table "butaca_reserva".
 *
 * The followings are the available columns in table 'butaca_reserva':
 * @property integer $id
 * @property integer $id_reserva
 * @property integer $id_funcion
 * @property integer $id_butaca
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Butaca $idButaca
 * @property Funcion $idFuncion
 * @property Reserva $idReserva
 */
class ButacaReserva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'butaca_reserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_funcion, id_butaca', 'required'),
			array('id_reserva, id_funcion, id_butaca, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_reserva, id_funcion, id_butaca, status', 'safe', 'on'=>'search'),
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
			'idButaca' => array(self::BELONGS_TO, 'Butaca', 'id_butaca'),
			'idFuncion' => array(self::BELONGS_TO, 'Funcion', 'id_funcion'),
			'idReserva' => array(self::BELONGS_TO, 'Reserva', 'id_reserva'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_reserva' => 'Id Reserva',
			'id_funcion' => 'Id Funcion',
			'id_butaca' => 'Id Butaca',
			'status' => 'Status',
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
		$criteria->compare('id_reserva',$this->id_reserva);
		$criteria->compare('id_funcion',$this->id_funcion);
		$criteria->compare('id_butaca',$this->id_butaca);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ButacaReserva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
