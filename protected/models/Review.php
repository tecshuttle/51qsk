<?php


class Review extends CActiveRecord
{

    public function tableName()
    {
        return '{{review}}';
    }


    public function rules()
    {
        return array(
            array('student_id, teacher_id', 'required'),
            array('contents, ctime', 'length', 'max' => 200),
            array('student_id, teacher_id', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, contents, student_id, teacher_id', 'safe', 'on' => 'search'),
        );
    }


    public function relations()
    {
        return array(
			'teachers' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'students' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'contents' => 'Contents',
            'student_id' => 'Student',
            'teacher_id' => 'Teacher',
        );
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('ctime', $this->ctime, true);
        $criteria->compare('contents', $this->contents, true);
        $criteria->compare('student_id', $this->student_id, true);
        $criteria->compare('teacher_id', $this->teacher_id, true);

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