<?php

/**
 * This is the model class for table "{{student_teacher}}".
 *
 * The followings are the available columns in table '{{student_teacher}}':
 * @property string $student_id
 * @property string $teacher_id
 * @property string $detail
 * @property string $eduction
 * @property string $environment
 * @property string $comment
 */
class StudentTeacher extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{student_teacher}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, teacher_id', 'required'),
			array('student_id, teacher_id', 'length', 'max'=>11),
			array('detail, eduction, environment', 'length', 'max'=>10),
			array('comment', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('student_id, teacher_id, detail, eduction, environment, comment', 'safe', 'on'=>'search'),
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
			'teacher_id' => 'Teacher',
			'detail' => 'Detail',
			'eduction' => 'Eduction',
			'environment' => 'Environment',
			'comment' => 'Comment',
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

		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('teacher_id',$this->teacher_id,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('eduction',$this->eduction,true);
		$criteria->compare('environment',$this->environment,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StudentTeacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
