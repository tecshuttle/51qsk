<?php

class Lesson extends CActiveRecord
{
    public function tableName()
    {
        return '{{lesson}}';
    }

    public function rules()
    {
        return array(
            array('name, start_date_time, teacher_id, summary, city, catalog_id, end_date_time', 'required'),
			array('recommendation', 'numerical', 'integerOnly'=>true),
            array('status, hot', 'numerical', 'integerOnly' => true),
            array('name, city, catalog_id, max_students, actual_students, place_id, hasfood', 'length', 'max' => 10),
            array('price', 'length', 'max' => 50),
            array('teacher_id', 'length', 'max' => 11),
            array('summary', 'length', 'max' => 200),
            array('sex', 'length', 'max' => 1),
            array('pic', 'length', 'max' => 255),
            array('intro', 'length', 'max' => 5000),
            array('id, name, arrivals, rank, price, check_status, start_date_time, teacher_id, status, summary, sex, city, catalog_id, pic, max_students, actual_students, intro, hot, end_date_time, place_id, hasfood, recommendation', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
			'countryArea' => array(self::BELONGS_TO, 'Area', 'country'),
            'stateArea' => array(self::BELONGS_TO, 'Area', 'state'),
            'cityArea' => array(self::BELONGS_TO, 'Area', 'city'),
            'districtArea' => array(self::BELONGS_TO, 'Area', 'district'),
			'catalogs' => array(self::BELONGS_TO, 'Catalog', 'catalog_id'),
			'teachers' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
		);
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '课程名称',
            'price' => '学费',
            'start_date_time' => '开课日期',
            'teacher_id' => 'Teacher',
            'status' => '授课状态',
            'summary' => '课程简介',
            'sex' => 'Sex',
            'city' => '所在城市',
            'catalog_id' => '课程分类',
            'pic' => '课程封面',
            'arrivals' => '实际报到人数',
            'max_students' => '最大报名数',
            'actual_students' => 'Actual Students',
            'intro' => '课程详情',
            'hot' => 'Hot',
            'end_date_time' => '结课日期',
            'place_id' => '授课场地',
            'hasfood' => 'Hasfood',
			'rank' => '星级',
			'check_status' => '审核',
			'recommendation' => 'Recommendation',
        );
    }


    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('arrivals',$this->arrivals,true);
		$criteria->compare('start_date_time',$this->start_date_time,true);
		$criteria->compare('teacher_id',$this->teacher_id,true);
		$criteria->compare('catalog_id',$this->catalog_id,true);
		$criteria->compare('place_id',$this->place_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('actual_students',$this->actual_students);
		$criteria->compare('max_students',$this->max_students,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('hot',$this->hot);
		$criteria->compare('end_date_time',$this->end_date_time,true);
		$criteria->compare('hasfood',$this->hasfood,true);
		$criteria->compare('rank',$this->rank,true);
		$criteria->compare('check_status',$this->check_status);
		$criteria->compare('recommendation',$this->recommendation);


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