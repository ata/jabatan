<?php

class Kegiatan extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'kegiatan':
     * @var double $id
     * @var string $nama
     * @var double $sub_unsur_id
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
        return 'kegiatan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sub_unsur_id', 'required'),
            array('sub_unsur_id', 'numerical'),
            array('nama', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, sub_unsur_id', 'safe', 'on'=>'search'),
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
            'butirs' => array(self::HAS_MANY,'ButirKegiatan','kegiatan_id'),
            'subUnsur' => array(self::BELONGS_TO,'SubUnsur','sub_unsur_id'),
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
            'sub_unsur_id' => 'Sub Unsur',
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

        $criteria->compare('sub_unsur_id',$this->sub_unsur_id);

        return new CActiveDataProvider('Kegiatan', array(
            'criteria'=>$criteria,
        ));
    }
    
    public function getOptionKegiatan()
    {
        return sprintf("%s > %s ",$this->subUnsur->unsur->jenis_dupak->nama,$this->nama);
    }
    
    public function getTopButir()
    {
        $c = new CDbCriteria;
        $c->conditions = 'sub_unsur_id = :sub_unsur_id AND parent_id = :parent_id' ;
        $c->params = array(
            'sub_unsur_id' => $this->sub_unsur_id,
            'parent_id' => 0
        );
        
        return ButirKegiatan::model()->findAll($c);
    }
}
