<?php

class Unsur extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'unsur':
     * @var double $id
     * @var string $nama
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
        return 'unsur';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jenis_dupak_id', 'required'),
            array('jenis_dupak_id', 'numerical'),
            array('nama', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, jenis_dupak_id', 'safe', 'on'=>'search'),
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
            'jenis_dupak' => array(self::BELONGS_TO,'JenisDupak','jenis_dupak_id'),
            'subUnsurs' => array(self::HAS_MANY,'SubUnsur','unsur_id')
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

        $criteria->compare('nama',$this->nama,true);

        $criteria->compare('jenis_dupak_id',$this->jenis_dupak_id);

        return new CActiveDataProvider('Unsur', array(
            'criteria'=>$criteria,
        ));
    }
    
    public function getUnsurOption()
    {
        return sprintf('%s > %s',$this->jenis_dupak->nama, $this->nama);
    }
    
    public function __toString()
    {
        return $this->nama;
    }
    
    public function findByDupak($dupak)
    {
        $c = new CDbCriteria;
        $c->condition = 'jenis_dupak_id = :jenis_dupak_id';
        $c->params = array('jenis_dupak_id' => $dupak->jenis->id);
        return $this->findAll($c);
    }
}
