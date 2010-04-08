<?php

class Pegawai extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'pegawai':
	 * @var double $id
	 * @var string $nip
	 * @var string $nama
	 * @var string $nskp
	 * @var string $tempat_lahir
	 * @var string $tanggal_lahir
	 * @var string $tmt
	 * @var string $bidang_kepakaran
	 * @var double $jabatan_id
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
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jabatan_id', 'required'),
			array('jabatan_id', 'numerical'),
			array('nip, nama, nskp, tempat_lahir, bidang_kepakaran', 'length', 'max'=>255),
			array('tanggal_lahir, tmt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nip, nama, nskp, tempat_lahir, tanggal_lahir, tmt, bidang_kepakaran, jabatan_id', 'safe', 'on'=>'search'),
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
			'jabatan' => array(self::BELONGS_TO,'Jabatan','jabatan_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nip' => 'Nip',
			'nama' => 'Nama',
			'nskp' => 'Nskp',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tmt' => 'Tmt',
			'bidang_kepakaran' => 'Bidang Kepakaran',
			'jabatan_id' => 'Jabatan',
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

		$criteria->compare('nip',$this->nip,true);

		$criteria->compare('nama',$this->nama,true);

		$criteria->compare('nskp',$this->nskp,true);

		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);

		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);

		$criteria->compare('tmt',$this->tmt,true);

		$criteria->compare('bidang_kepakaran',$this->bidang_kepakaran,true);

		$criteria->compare('jabatan_id',$this->jabatan_id);

		return new CActiveDataProvider('Pegawai', array(
			'criteria'=>$criteria,
		));
	}
	
	public function getPegawaiOption()
	{
		return "({$this->nip}) {$this->nama}";
	}
}
