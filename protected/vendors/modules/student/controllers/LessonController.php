<?php

class LessonController extends XUserBase
{

    public $layout = '//layouts/student';

    public function init()
    {
        parent::init();
    }
	
	public function actionFocus($id)
    {
        $model = new StudentLesson;

        $model->student_id = $this->_user['studentId'];
        $model->lesson_id = $id;
		$model->is_collection = 1;
		
        if(!$model->save()){
			print_r($model->errors);
		}
		
        $this->redirect($this->createUrl('/lesson/view', array('id' => $id)));
    }
	
	public function actionCollectionLesson()
    {
        $this->_seoTitle = '学员 - 我的课程 - 收藏课程';

		$student_id = $this->_user['studentId'];
				
		$criteria = new CDbCriteria();
		
		//$criteria->select = 't.*, sl.*';
		$criteria->join = 'LEFT JOIN seed_student_lesson sl ON t.id=sl.lesson_id';
		$criteria->addCondition('sl.student_id=:student_id');
		//$criteria->addCondition('sl.is_collection=:collection');
		$criteria->params[':student_id']=$student_id;
		//$criteria->params[':collection']=1;
		
		//分页
        $count = Lesson::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $collectionLessons = $this->getCollectionLessons($student_id);
		
		$this->render('collectionLesson',array(
			'collectionLessons' => $collectionLessons,
			'pager' => $pager,
			'count' => $count
		));
    }
	
    public function actionList()
    {
        $this->_seoTitle = '学员 - 我的课程 - 已报名课程';
					
        $student_id = $this->_user['studentId'];

		$lessonCriteria = new CDbCriteria();
		
		//已报名课程
		$lessonCriteria->select = 't.*, sl.*';
		$lessonCriteria->join = 'LEFT JOIN seed_student_lesson sl ON t.id=sl.lesson_id';
		$lessonCriteria->addCondition('sl.student_id=:student_id');
		$lessonCriteria->params[':student_id']=$student_id;
		
		//已报名课程分页
        $count = Lesson::model()->count($lessonCriteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($lessonCriteria);
        $lessons = $this->getLessons($student_id);
		
        $this->render('index', array(
			'lessons' => $lessons,
			'count' => $count,
            'pager' => $pager,
		));
    }
	
	public function actionExpiredLesson()
    {
        $this->_seoTitle = '学员 - 我的课程 - 过期课程';
					
        $student_id = $this->_user['studentId'];

		$criteria = new CDbCriteria();
		
		//已报名课程
		$criteria->select = 't.*, sl.*';
		$criteria->join = 'LEFT JOIN seed_student_lesson sl ON t.id=sl.lesson_id';
		$criteria->addCondition('sl.student_id=:student_id');
		$criteria->params[':student_id']=$student_id;
		
		//已报名课程分页
        $count = Lesson::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $expiredLessons = $this->getExpiredLessons($student_id);
		
        $this->render('expiredLesson', array(
			'expiredLessons' => $expiredLessons,
			'count' => $count,
            'pager' => $pager,
		));
    }
	
	public function actionReview()
	{
		$message = false;
		$lesson = Lesson::model()->findByPk($_GET['id']);
		
		$model = StudentTeacher::model()->findByAttributes(array('student_id' => $this->_user['studentId'], 'teacher_id' => $lesson['teacher_id']));
		
		if(!count($model)){
			$model = new StudentTeacher;
		}
		
		if(isset($_POST['StudentTeacher']))
		{
			$model->attributes=$_POST['StudentTeacher'];
			
			$model->student_id = $this->_user['studentId'];
			$model->teacher_id = $lesson['teacher_id'];
			
			if($model->save()){
				$message = true;
			}
		}
		
		$this->render('review',array(
			'lesson' => $lesson,
			'message' => $message,
			'model' => $model,
		));
	}
	
	private function getLessons($student_id)
    {
        $lessons = Yii::app()->db->createCommand()
            ->select('l.*, sl.*')
            ->from('seed_lesson l')
            ->leftjoin('seed_student_lesson sl', 'l.id=sl.lesson_id')
            ->where('sl.student_id=:student_id and sl.is_pay=:is_pay', array(':student_id' => $student_id,':is_pay' => 1))
            ->queryAll();
			       
        return $lessons;
    }
	
	private function getCollectionLessons($student_id)
    {
        $collectionLessons = Yii::app()->db->createCommand()
            ->select('l.*, sl.*')
            ->from('seed_lesson l')
            ->leftjoin('seed_student_lesson sl', 'l.id=sl.lesson_id')
            ->where('sl.student_id=:student_id and sl.is_collection=:is_collection', array(':student_id' => $student_id,':is_collection' => 1))
            ->queryAll();
			
        return $collectionLessons;
    }
	
	private function getExpiredLessons($student_id)
    {
        $expiredLessons = Yii::app()->db->createCommand()
            ->select('l.*, sl.*')
            ->from('seed_lesson l')
            ->leftjoin('seed_student_lesson sl', 'l.id=sl.lesson_id')
            ->where('sl.student_id=:student_id and sl.is_arrival=:is_arrival', array(':student_id' => $student_id,':is_arrival' => 1))
            ->queryAll();
			
        return $expiredLessons;
    }
}

//end file