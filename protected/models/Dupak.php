<?php

class Dupak extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'dupak':
	 * @var double $id
	 * @var string $nomor
	 * @var string $mp_mulai
	 * @var string $mp_selesai
	 * @var double $kenaikan_jabatan_id
	 * @var double $jenis_dupak_id
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
		return 'dupak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kenaikan_jabatan_id, jenis_dupak_id', 'required'),
			array('kenaikan_jabatan_id, jenis_dupak_id', 'numerical'),
			array('nomor, mp_selesai', 'length', 'max'=>255),
			array('mp_mulai', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nomor, mp_mulai, mp_selesai, kenaikan_jabatan_id, jenis_dupak_id', 'safe', 'on'=>'search'),
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
			'kenaikanJabatan' => array(self::BELONGS_TO,'KenaikanJabatan','kenaikan_jabatan_id'),
			'jenis' => array(self::BELONGS_TO, 'JenisDupak','jenis_dupak_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nomor' => 'Nomor',
			'mp_mulai' => 'Mp Mulai',
			'mp_selesai' => 'Mp Selesai',
			'kenaikan_jabatan_id' => 'Kenaikan Jabatan',
			'jenis_dupak_id' => 'Jenis Dupak',
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

		$criteria->compare('nomor',$this->nomor,true);

		$criteria->compare('mp_mulai',$this->mp_mulai,true);

		$criteria->compare('mp_selesai',$this->mp_selesai,true);

		$criteria->compare('kenaikan_jabatan_id',$this->kenaikan_jabatan_id);

		$criteria->compare('jenis_dupak_id',$this->jenis_dupak_id);

		return new CActiveDataProvider('Dupak', array(
			'criteria'=>$criteria,
		));
	}
}
