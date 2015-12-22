<?php

class Book extends CActiveRecord
{

    public function tableName()
    {
        return '{{book}}';
    }


    public function rules()
    {

        return array(
            array('teacher_id, name, year', 'required'),
            array('teacher_id, year', 'length', 'max' => 10),
            array('name', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, teacher_id, name, year', 'safe', 'on' => 'search'),
        );
    }


    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
			'teachers'=>array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
		);
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'teacher_id' => 'Teacher',
            'name' => '著作名称',
            'year' => '出版年份',
        );
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('teacher_id', $this->teacher_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('year', $this->year, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

//end file