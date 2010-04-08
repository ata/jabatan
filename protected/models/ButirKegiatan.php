<?php

class ButirKegiatan extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'butir_kegiatan':
	 * @var double $id
	 * @var string $nama
	 * @var double $kegiatan_id
	 * @var double $parent_id
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
		return 'butir_kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kegiatan_id, parent_id', 'required'),
			array('kegiatan_id, parent_id', 'numerical'),
			array('nama', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kegiatan_id, parent_id', 'safe', 'on'=>'search'),
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
			'childs' => array(self::HAS_MANY,'ButirKegiatan','parent_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nama' => 'Nama',
			'kegiatan_id' => 'Kegiatan',
			'parent_id' => 'Parent',
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

		$criteria->compare('nama',$this->nama,true);

		$criteria->compare('kegiatan_id',$this->kegiatan_id);

		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider('ButirKegiatan', array(
			'criteria'=>$criteria,
		));
	}
}
