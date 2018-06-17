<?php

/**
 * This is the model class for table "cita".
 *
 * The followings are the available columns in table 'cita':
 * @property integer $id
 * @property integer $id_paciente
 * @property integer $id_odontologo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $duracion
 * @property integer $id_motivo
 * @property integer $id_estado
 * @property string $observaciones
 */
class Cita extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_paciente, id_odontologo, fecha_inicio, fecha_fin, duracion, id_motivo, id_estado', 'required'),
			array('id_paciente, id_odontologo, id_motivo, id_estado', 'numerical', 'integerOnly'=>true),
			array('fecha_inicio, fecha_fin, duracion', 'length', 'max'=>100),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_paciente, id_odontologo, fecha_inicio, fecha_fin, duracion, id_motivo, id_estado, observaciones', 'safe', 'on'=>'search'),
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
			'id_paciente' => 'Id Paciente',
			'id_odontologo' => 'Id Odontologo',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'duracion' => 'Duracion',
			'id_motivo' => 'Id Motivo',
			'id_estado' => 'Id Estado',
			'observaciones' => 'Observaciones',
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
		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('id_odontologo',$this->id_odontologo);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('duracion',$this->duracion,true);
		$criteria->compare('id_motivo',$this->id_motivo);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
