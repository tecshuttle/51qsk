<?php

/**
 * 首页控制器
 */
class SiteController extends XFrontBase
{
    public function actionIndex()
    {
        $this->_seoTitle = '中国传统文化教育|东方美学|中式精致生活|我要去上课';

		$placeCriteria = new CDbCriteria;
		$teacherCriteria = new CDbCriteria;
		$picCriteria = new CDbCriteria;
		
		$placeCriteria->limit = '3';
		$placeCriteria->order = 'id DESC';
		$placeCriteria->addCondition('status = :status');
		$placeCriteria->params[':status']=1; 
		
		$teacherCriteria->limit = '8';
		$teacherCriteria->order = 'id DESC';
		$teacherCriteria->addCondition('status = :status');
		$teacherCriteria->params[':status']=1; 
		
		$picCriteria->limit = '4';
		$picCriteria->order = 'id DESC';
		$picCriteria->addCondition('check_status = :check_status');
		$picCriteria->params[':check_status']=1; 
		
        $lesson = Lesson::model()->findByAttributes(array('id' => '5'));
        $place = Place::model()->findAll($placeCriteria);
        $teacher = Teacher::model()->findAll($teacherCriteria);
        $pic = Lesson::model()->findAll($picCriteria);

        $this->render('index', array(
            'place' => $place,
            'teacher' => $teacher,
            'lesson' => $lesson,
            'pic' => $pic,
        ));
    }
}

//end file