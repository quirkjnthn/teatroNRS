<?php

/**
 * This is the model class for table "horario_personal".
 *
 * The followings are the available columns in table 'horario_personal':
 * @property integer $id
 * @property integer $id_odontologo
 * @property integer $id_dia
 * @property integer $id_hora
 * @property integer $id_sucursal
 * @property integer $status
 */
class HorarioPersonal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario_personal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_odontologo, id_dia, id_hora, id_sucursal, status', 'required'),
			array('id_odontologo, id_dia, id_hora, id_sucursal, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_odontologo, id_dia, id_hora, id_sucursal, status', 'safe', 'on'=>'search'),
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
			'id_odontologo' => 'Id Odontologo',
			'id_dia' => 'Id Dia',
			'id_hora' => 'Id Hora',
			'id_sucursal' => 'Id Sucursal',
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
		$criteria->compare('id_odontologo',$this->id_odontologo);
		$criteria->compare('id_dia',$this->id_dia);
		$criteria->compare('id_hora',$this->id_hora);
		$criteria->compare('id_sucursal',$this->id_sucursal);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HorarioPersonal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
