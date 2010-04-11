<?php

class Nilai extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'nilai':
	 * @var double $id
	 * @var double $ip_lama
	 * @var double $ip_baru
	 * @var double $ip_jumlah
	 * @var double $tp_lama
	 * @var double $tp_baru
	 * @var double $tp_jumlah
	 * @var double $butir_kegiatan_id
	 * @var double $dupak_id
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nilai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('butir_kegiatan_id, dupak_id', 'required'),
			array('ip_lama, ip_baru, ip_jumlah, tp_lama, tp_baru, tp_jumlah, butir_kegiatan_id, dupak_id', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ip_lama, ip_baru, ip_jumlah, tp_lama, tp_baru, tp_jumlah, butir_kegiatan_id, dupak_id', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'ip_lama' => 'Ip Lama',
			'ip_baru' => 'Ip Baru',
			'ip_jumlah' => 'Ip Jumlah',
			'tp_lama' => 'Tp Lama',
			'tp_baru' => 'Tp Baru',
			'tp_jumlah' => 'Tp Jumlah',
			'butir_kegiatan_id' => 'Butir Kegiatan',
			'dupak_id' => 'Dupak',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('ip_lama',$this->ip_lama);

		$criteria->compare('ip_baru',$this->ip_baru);

		$criteria->compare('ip_jumlah',$this->ip_jumlah);

		$criteria->compare('tp_lama',$this->tp_lama);

		$criteria->compare('tp_baru',$this->tp_baru);

		$criteria->compare('tp_jumlah',$this->tp_jumlah);

		$criteria->compare('butir_kegiatan_id',$this->butir_kegiatan_id);

		$criteria->compare('dupak_id',$this->dupak_id);

		return new CActiveDataProvider('Nilai', array(
			'criteria'=>$criteria,
		));
	}
	
	public function saveAll($nilais,$dupak_id)
	{
		foreach($nilais as $n){
			$nilai = new Nilai;
			$nilai->attributes = $n;
			$nilai->dupak_id = $dupak_id;
			var_dump($nilai->attributes);
			if(!$nilai->save()){
				return false;
			}
		}
		return true;
	}
}
