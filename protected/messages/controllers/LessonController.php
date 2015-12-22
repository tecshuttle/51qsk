<?php

class LessonController extends XFrontBase
{

    public function actionIndex()
    {
        $this->_seoTitle = '我要去上课 - 课程汇总';

        $criteria = new CDbCriteria();

        //根据分类查找课程信息
        $cat = Yii::app()->request->getParam('cat');
        $city = Yii::app()->request->getParam('city');
        $sex = Yii::app()->request->getParam('sex');

        //课程分类
        $catalogs = Catalog::getMenu();

        if (!empty($city)) {
            $criteria->addCondition("city = '{$city}'");
        }

        if (!empty($cat)) {
            $criteria->addCondition("catalog_id = '{$cat}'");
        }

        if (!empty($sex)) {
            $criteria->addCondition("sex = '{$sex}'");
        }

		$criteria->addCondition("check_status = :check_status");
		$criteria->params[':check_status'] = 1;
		
        //分页
        $count = Lesson::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);
        $lessons = Lesson::model()->findAll($criteria->addCondition("check_status = 1"));

        $this->render('index', array(
            'lessons' => $lessons,
            'count' => $count,
            'pager' => $pager,
            'cat' => $cat,
            'sex' => $sex,
            'catalogs' => $catalogs,
            'city' => $city,
            'food' => $_GET['food'],
        ));
    }

    public function actionView($id)
    {
        $lesson = $this->loadModel($id);
		
		$userId = $this->_cookiesGet('userId');
        $userType = $this->_cookiesGet('userType');

        $this->_seoTitle = '课程 - ' . $lesson->name;

        //取报名人数
        $actual_students_criteria = new CDbCriteria();
        $actual_students = StudentLesson::model()->count($actual_students_criteria->addCondition("lesson_id =" . $id));
        $lesson->actual_students = $actual_students;

        $teacher = Teacher::model()->findByPk($lesson->teacher_id);

        $place = Place::model()->findByPk($lesson->place_id);
		
		//教学环境图片显示
		$imageList = $this->_gets->getParam( 'imageList' );
        $imageListSerialize = XUtils::imageListSerialize($imageList);
		
		//判断学员已收藏的课程
		if ($userType === 'student') 
            $is_focus = StudentLesson::model()->findByAttributes(array('student_id' => $userId, 'lesson_id' => $id, 'is_collection' => 1));
		
		if ( $imageList )
            $imageList =  $imageListSerialize['data'];
		elseif($place->pic_other)
            $imageList = unserialize($place->pic_other);
			
        $this->render('view', array(
			'is_focus' => $is_focus,
			'isJoin' => $this->isJoin($userId, $id, 1),
			'userType' => $userType,
            'lesson' => $lesson,
            'place' => $place,
            'teacher' => $teacher,
			'imageList' => $imageList
        ));
    }

    private function loadModel($id)
    {
        $model = Lesson::model()->findByPk($id);

        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    public function actionJoin()
    {
        $lessonId = Yii::app()->request->getPost('lessonId');
        $userId = Yii::app()->request->getPost('userId');

        if ($userId === null OR $lessonId === null) {
            echo json_encode(array(
                'success' => false
            ));

            exit;
        }

        $lesson = $this->loadModel($lessonId);

        if ($lesson->actual_students >= $lesson->max_students) {
            echo json_encode(array(
                'success' => false,
                'errMsg' => '报名已满'
            ));

            exit;
        }

        //是否报过名
        $isJoin = $this->isJoin($userId, $lessonId, 1);

        if ($isJoin) {
            echo json_encode(array(
                'success' => false,
                'errMsg' => '已经报过名了'
            ));

            exit;
        }
		
		//支付成功执行以下代码
		
        //报名
		$isCollection = StudentLesson::model()->findAllByAttributes(array('student_id' => $userId, 'lesson_id' => $lessonId, 'is_collection' => 1));//判断是否已收藏
		
		if(!count($isCollection)){
			$newJoin = new StudentLesson();
			$newJoin->student_id = $userId;
			$newJoin->lesson_id = $lessonId;
			$newJoin->is_pay = 1;
			$newJoin->pay_time = date('Y-m-d H:m:s', time());
			$newJoin->save();
		}else{
			$sql = "UPDATE `seed_student_lesson` SET `is_pay`='1' WHERE (`student_id`=".$userId.") AND (`lesson_id`=".$lessonId.")";
			
			Yii::app()->db->createCommand($sql)->query();
		}

        //更新报名记数
        $lesson->actual_students++;
        $lesson->save();

        echo json_encode(array(
            'success' => true,
            'actual_students' => $lesson->actual_students
        ));

    }
	
	public function actionPay()
	{
		$id = $_GET['id'];		
		$lesson = $this->loadModel($id);
		
		$this->render('pay', array(
			'lesson' => $lesson,
            'joinUrl' => Yii::app()->createUrl('lesson/Join')
		));
	}

    private function isJoin($userId, $lessonId, $is_pay)
    {
        $isJoin = StudentLesson::model()->findByAttributes(array('student_id' => $userId, 'lesson_id' => $lessonId, 'is_pay' => $is_pay));
		return $isJoin;
    }
}

//end file