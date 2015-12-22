<?php

class Customize extends CActiveRecord
{
    public function tableName()
    {
        return '{{customize}}';
    }

    public function rules()
    {
        return array(
            array('name, agent, tel, memo', 'required'),
            array('tel, amount_student, budget_max, budget_min', 'numerical', 'integerOnly' => true),
            array('place', 'length', 'max' => 50),
            array('memo', 'length', 'max' => 500),
            array('city', 'length', 'max' => 50),
            array('classroom', 'length', 'max' => 50),
            array('place', 'length', 'max' => 50),
            array('id, name, city, memo', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '企业名称',
            'amount_student' => '参与人数',
            'tel' => '电话',
            'agent' => '联系人',
            'memo' => '定制需求'
        );
    }


    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);

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