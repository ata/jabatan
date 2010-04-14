<?php

class KenaikanJabatan extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'kenaikan_jabatan':
     * @var double $id
     * @var double $pegawai_id
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
        return 'kenaikan_jabatan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('pegawai_id, jabatan_id', 'required'),
            array('pegawai_id, jabatan_id', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, pegawai_id, jabatan_id', 'safe', 'on'=>'search'),
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
            'jabatan' => array(self::BELONGS_TO,'Jabatan','jabatan_id'),
            'pegawai' => array(self::BELONGS_TO,'Pegawai','pegawai_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'pegawai_id' => 'Pegawai',
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

        $criteria->compare('pegawai_id',$this->pegawai_id);

        $criteria->compare('jabatan_id',$this->jabatan_id);

        return new CActiveDataProvider('KenaikanJabatan', array(
            'criteria'=>$criteria,
        ));
    }
}
