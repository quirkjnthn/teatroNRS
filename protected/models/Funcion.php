<?php

/**
 * This is the model class for table "funcion".
 *
 * The followings are the available columns in table 'funcion':
 * @property integer $id
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property ButacaReserva[] $butacaReservas
 * @property Reserva[] $reservas
 */
class Funcion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'funcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha', 'required'),
			array('fecha', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha', 'safe', 'on'=>'search'),
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
			'butacaReservas' => array(self::HAS_MANY, 'ButacaReserva', 'id_funcion'),
			'reservas' => array(self::HAS_MANY, 'Reserva', 'id_funcion'),
		);
	}

	public function get_Funciones()
	{
		$respuesta = "";

		$modelFunciones = Funcion::model()->findAll(array("condition"=>"status=1 and fecha>='".date("Y-m-d")."'","order"=>"fecha ASC"));

		if(count($modelFunciones)!=0){

			 $respuesta .= '<form action="'.Yii::app()->createUrl("reserva/butacas").'" method="get">

                      <div class="form-group">
                        <label >Funciones</label>
                        <select name="fecha_funcion" class="form-control">';

		 foreach ($modelFunciones as $key => $value) {
            $respuesta .= "<option value='".$value->id."'>".date("d/m/Y", strtotime($value->fecha))."</option>";
          }


            $respuesta .= '</select>
                      </div>

                      <input type="submit" name="submit" value="Buscar" class="btn btn-primary">

                   </form>';
        }
        else{
        	$respuesta .= "<h2>No Hay Funciones Disponibles</h2>";
        }

		return $respuesta;
	}


	public function get_Butacas(){

	  $respuesta = "";
      $contB = 0;
      $cuentaFila = 1;
      foreach ($this->butacaReservas as $key => $value) {
      if($contB==5){
        $contB=0;
          $respuesta .= '<div class="row"></div>';
          $cuentaFila++;
        }
      $contB++; 
   
      $respuesta .= '<div class="col-xs-2 thumbnail" style="height:auto;">
        <img class="img img-responsive seleccion" data-columna="'.$value->idButaca->columna.'" data-fila="'.$value->idButaca->fila.'" data-status="'.$value->status.'" data-id="'.$value->idButaca->id.'" style="';

        if($value->status==0)
        	$respuesta .= "background-color:green;";
        else
        	$respuesta .= "background-color:red;";

        $respuesta .='cursor:pointer;" src="'.Yii::app()->request->baseUrl.'/images/aciento.png">
          <b>Butaca # '.$value->idButaca->id.'</b><br>
          <b>Fila: '.$value->idButaca->fila.'</b><br>
          <b>Columna: '.$value->idButaca->columna.'</b>
      </div>';
    
      }
              
       return $respuesta;  
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
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
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Funcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
