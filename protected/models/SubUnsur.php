<?php

class SubUnsur extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'sub_unsur':
     * @var double $id
     * @var string $nama
     * @var double $unsur_id
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
        return 'sub_unsur';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('unsur_id', 'required'),
            array('unsur_id', 'numerical'),
            array('nama', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, unsur_id', 'safe', 'on'=>'search'),
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
            'unsur' => array(self::BELONGS_TO,'Unsur','unsur_id'),
            'kegiatans' => array(self::HAS_MANY,'Kegiatan','sub_unsur_id'),
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
            'unsur_id' => 'Unsur',
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

        $criteria->compare('unsur_id',$this->unsur_id);

        return new CActiveDataProvider('SubUnsur', array(
            'criteria'=>$criteria,
        ));
    }
    
    public function getSubUnsurOption()
    {
        return sprintf('%s > %s > %s',$this->unsur->jenis_dupak->nama, $this->unsur->nama, $this->nama);
    }
    
}
