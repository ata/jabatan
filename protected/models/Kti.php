<?php

class Kti extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'kti':
	 * @var double $id
	 * @var double $kenaikan_jabatan_id
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
		return 'kti';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kenaikan_jabatan_id, dupak_id', 'required'),
			array('kenaikan_jabatan_id, dupak_id', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kenaikan_jabatan_id, dupak_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'kenaikan_jabatan_id' => 'Kenaikan Jabatan',
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

		$criteria->compare('kenaikan_jabatan_id',$this->kenaikan_jabatan_id);

		$criteria->compare('dupak_id',$this->dupak_id);

		return new CActiveDataProvider('Kti', array(
			'criteria'=>$criteria,
		));
	}
}
