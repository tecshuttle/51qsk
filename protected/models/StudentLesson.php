<?php

/**
 * This is the model class for table "{{student_lesson}}".
 *
 * The followings are the available columns in table '{{student_lesson}}':
 * @property integer $student_id
 * @property integer $lesson_id
 * @property string $qrcode
 * @property integer $is_arrival
 * @property integer $is_collection
 * @property integer $is_pay
 */
class StudentLesson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{student_lesson}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, lesson_id, pay_time', 'required'),
			array('student_id, lesson_id, is_arrival, is_collection, is_pay', 'numerical', 'integerOnly'=>true),
			array('qrcode', 'length', 'max'=>20),
			array('pay_time', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('student_id, lesson_id, qrcode, is_arrival, is_collection, is_pay, pay_time', 'safe', 'on'=>'search'),
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
			'student_id' => 'Student',
			'lesson_id' => 'Lesson',
			'qrcode' => 'Qrcode',
			'is_arrival' => 'Is Arrival',
			'is_collection' => 'Is Collection',
			'is_pay' => 'Is Pay',
			'pay_time' => '支付时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('lesson_id',$this->lesson_id);
		$criteria->compare('qrcode',$this->qrcode,true);
		$criteria->compare('is_arrival',$this->is_arrival);
		$criteria->compare('is_collection',$this->is_collection);
		$criteria->compare('is_pay',$this->is_pay);
		$criteria->compare('pay_time',$this->pay_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StudentLesson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
