<?php

class KtiItem extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'kti_item':
	 * @var double $id
	 * @var string $judul
	 * @var string $unsur
	 * @var integer $p2jp_instansi
	 * @var integer $p2jp_lipi
	 * @var string $keterangan
	 * @var double $kti_id
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
		return 'kti_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('kti_id', 'required'),
			array('p2jp_instansi, p2jp_lipi', 'numerical', 'integerOnly'=>true),
			array('kti_id', 'numerical'),
			array('unsur', 'length', 'max'=>255),
			array('judul, keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, judul, unsur, p2jp_instansi, p2jp_lipi, keterangan, kti_id', 'safe', 'on'=>'search'),
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
			'judul' => 'Judul',
			'unsur' => 'Unsur',
			'p2jp_instansi' => 'P2jp Instansi',
			'p2jp_lipi' => 'P2jp Lipi',
			'keterangan' => 'Keterangan',
			'kti_id' => 'Kti',
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

		$criteria->compare('judul',$this->judul,true);

		$criteria->compare('unsur',$this->unsur,true);

		$criteria->compare('p2jp_instansi',$this->p2jp_instansi);

		$criteria->compare('p2jp_lipi',$this->p2jp_lipi);

		$criteria->compare('keterangan',$this->keterangan,true);

		$criteria->compare('kti_id',$this->kti_id);

		return new CActiveDataProvider('KtiItem', array(
			'criteria'=>$criteria,
		));
	}
}
