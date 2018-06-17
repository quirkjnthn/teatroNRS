<?php

/**
 * This is the model class for table "configuracion_agenda".
 *
 * The followings are the available columns in table 'configuracion_agenda':
 * @property integer $id
 * @property integer $id_aplicacion
 * @property string $minutos
 * @property string $primer_dia
 * @property string $formato_hora
 * @property string $hora_inicio
 * @property string $hora_fin
 */
class ConfiguracionAgenda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configuracion_agenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_aplicacion, minutos, primer_dia, formato_hora, hora_inicio, hora_fin', 'required'),
			array('id_aplicacion', 'numerical', 'integerOnly'=>true),
			array('minutos, primer_dia, formato_hora, hora_inicio, hora_fin', 'length', 'max'=>100),
			array('hora_inicio','compare','compareAttribute'=>'hora_fin','operator'=>'<','message'=>'La hora de inicio debe ser menora a la hora de finalización.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_aplicacion, minutos, primer_dia, formato_hora, hora_inicio, hora_fin', 'safe', 'on'=>'search'),
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
			'id_aplicacion' => 'Id Aplicacion',
			'minutos' => 'Minutos',
			'primer_dia' => 'Primer Dia',
			'formato_hora' => 'Formato Hora',
			'hora_inicio' => 'Hora Inicio',
			'hora_fin' => 'Hora Fin',
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
		$criteria->compare('id_aplicacion',$this->id_aplicacion);
		$criteria->compare('minutos',$this->minutos,true);
		$criteria->compare('primer_dia',$this->primer_dia,true);
		$criteria->compare('formato_hora',$this->formato_hora,true);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConfiguracionAgenda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
