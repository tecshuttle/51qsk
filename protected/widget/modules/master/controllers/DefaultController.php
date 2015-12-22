<?php

class DefaultController extends XUserBase
{

    public $layout = '//layouts/master';

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $this->_seoTitle = '名师 - 个人信息';

        $model = TeacherUpdate::model()->findByPk($this->_user['masterId']);

        if (isset($_POST['TeacherUpdate'])) {
            $model->attributes = $_POST['TeacherUpdate'];

            if ($model->validate()) {

                $file = XUpload::upload($_FILES['attach']);
 
 
                if (is_array($file)) {
                    $model->pic = $file['pathname'];
                    @unlink($_POST['oAttach']);
                    @unlink($_POST['oThumb']);
                }
                
				
				
				$degree = XUpload::upload($_FILES['degree']);
				
				if (is_array($degree)) {
                    $model->degree = $degree['pathname'];
                    @unlink($_POST['oAttach']);
                    @unlink($_POST['oThumb']);
				}
				


                if ($model->save()) {
					$cookie = new CHttpCookie('userName', $model->name);
					Yii::app()->request->cookies['userName'] = $cookie;
					
					Yii::app()->user->setFlash('success', '保存成功！');
                    $this->redirect(array('/master'));
                }
            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionMyLesson()
    {
        $this->_seoTitle = '名师 - ' . '我的课程';

        $criteria = new CDbCriteria();
        $masterId = $this->_user['masterId'];

        //分页
        $count = Lesson::model()->count($criteria->addCondition("teacher_id =" . $this->_user['masterId']));
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);
        $lessons = Lesson::model()->findAll($criteria);

        //计算报名学员数
        foreach ($lessons as &$lesson) {
            $actual_students_criteria = new CDbCriteria();
            $actual_students = StudentLesson::model()->count($actual_students_criteria->addCondition("lesson_id =" . $lesson->id));
            $lesson->actual_students = $actual_students;
        }

        $this->render('mylesson', array(
            'lessons' => $lessons,
			'status' => $this->isStatus(),
            'count' => $count,
            'pager' => $pager,
        ));
    }

    public function actionLessonStudent($id)
    {
        $this->_seoTitle = '名师 - ' . '查看学员';
        $criteria = new CDbCriteria();

        //分页
        $count = StudentLesson::model()->count($criteria->addCondition("lesson_id =" . $id));
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);

        $students = Yii::app()->db->createCommand()
            ->select('s.*, sl.*')
            ->from('seed_student s')
            ->leftjoin('seed_student_lesson sl', 's.id=sl.student_id')
            ->where('sl.lesson_id=:lesson_id', array(':lesson_id' => $id))
            ->limit($pager->pageSize, $pager->currentPage * $pager->pageSize)
            ->queryAll();


        $lesson = Lesson::model()->findByPk($id);

        $this->render('lessonStudent', array(
            'students' => $students,
            'count' => $count,
            'pager' => $pager,
            'lesson' => $lesson
        ));
    }

    public function actionchange_qrcode($student_id, $lesson_id)
    {
        $qrcode = F::randpw(6, 'NUMBER');

        $connection = Yii::app()->db;
        $sql = "update seed_student_lesson set qrcode = '$qrcode' where student_id = $student_id and lesson_id = $lesson_id";
        $command = $connection->createCommand($sql);
        $command->execute();

        $this->redirect(Yii::app()->createUrl('master/default/lessonStudent', array('id' => $lesson_id)));
    }


    public function actionis_arrival($student_id, $lesson_id)
    {
        $model = StudentLesson::model()->findByAttributes(array('student_id' => $student_id, 'lesson_id' => $lesson_id));

        $is_arrival = $model->is_arrival === '0' ? 1 : 0;

        $connection = Yii::app()->db;
        $sql = "update seed_student_lesson set is_arrival = $is_arrival where student_id = $student_id and lesson_id = $lesson_id";
        $command = $connection->createCommand($sql);
        $command->execute();

        $this->redirect(Yii::app()->createUrl('master/default/lessonStudent', array('id' => $lesson_id)));
    }


    public function actionAddLesson()
    {
        $this->_seoTitle = '名师 - 增加课程';

        $model = new Lesson;

        if (isset($_POST['Lesson'])) {
            $model->attributes = $_POST['Lesson'];
            $model->teacher_id = $this->_user['masterId'];

            if ($model->validate()) {
                $file = XUpload::upload($_FILES['attach']);
                if (is_array($file)) {
                    $model->pic = $file['pathname'];
                    @unlink($_POST['oAttach']);
                    @unlink($_POST['oThumb']);
                }
            }

            if ($model->save()) {
                $this->redirect(array('mylesson'));
            }
        }

        $this->render('addlesson', array(
            'model' => $model,
        ));
    }


    public function actionUpdateLesson()
    {
        $this->_seoTitle = '名师 - 编辑课程';

        $model = Lesson::model()->findByPk($_GET['id']);

        if (isset($_POST['Lesson'])) {
            $model->attributes = $_POST['Lesson'];
			
            $file = XUpload::upload($_FILES['attach']);

            if (is_array($file)) {
                $model->pic = $file['pathname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }

            if ($model->validate() AND $model->save()) {
                $this->redirect(array('mylesson'));
            }
        }

        $this->render('addlesson', array('model' => $model));
    }

    public function actionPlace()
    {
        $this->_seoTitle = '名师 - 场地订单';

        $criteria = new CDbCriteria();
        //$placeBookings = PlaceBooking::Model()->findAllByAttributes(array('teacher_id' => $this->_user['masterId']), new CDbCriteria(array('order'=>'date DESC')));
        $criteria->order = 'date DESC';

        //分页
        $count = PlaceBooking::model()->count($criteria->addCondition("teacher_id = " . $this->_user['masterId']));
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);
        $placeBookings = PlaceBooking::model()->findAll($criteria);

        $this->render('place', array(
            'placeBookings' => $placeBookings,
            'count' => $count,
            'pager' => $pager,
        ));
    }


    public function actionPassword()
    {
        $this->_seoTitle = '名师 - 修改密码';

        $teacherModel = new TeacherChangePassword;

        if (isset($_POST['TeacherChangePassword'])) {
            $teacherModel->attributes = $_POST['TeacherChangePassword'];

            if ($teacherModel->validate()) {
                $new_password = Teacher::model()->findbyPk($this->_user['masterId']);
				

                $new_password->password = $teacherModel->password;
                $new_password->verifyPassword = $teacherModel->password;

                if ($new_password->save()) {
                    Yii::app()->user->setFlash('success', '保存成功');
					
                
				}
            }
        }

        $this->render('password', array('teacherModel' => $teacherModel));
    }


    public function actionBookPlace()
    {

        $dates = Yii::app()->request->getParam('dates');
        $id = Yii::app()->request->getParam('place_id');
        foreach ($dates as $date) {
            $model = new PlaceBooking;
            $model->place_id = $id;
            $model->teacher_id = $this->_user['masterId'];
            $model->date = $date;
            $model->status = 1;
            $model->save();
        }
        die(CJSON::encode(array('status' => 'success')));
    }

    public function actionArrivals()
    {
        $this->_seoTitle = '名师 - 学员签到';

        $this->render('arrivals', array(
            'placeBookings' => array(),
            'count' => 0,
            'pager' => ''
        ));
    }

    public function actionAddBooks()
    {
        $this->_seoTitle = '名师 - 编辑著作';

        $id = Yii::app()->request->getParam('id');

        if ($id === null) {
            $model = new Book;
        } else {
            $model = Book::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['Book'])) {
            $model->attributes = $_POST['Book'];
            $model->teacher_id = $this->_user['masterId'];

            if ($model->validate()) {
                $file = XUpload::upload($_FILES['attach']);
                if (is_array($file)) {
                    $model->pic = $file['pathname'];
                    @unlink($_POST['oAttach']);
                    @unlink($_POST['oThumb']);
                }
            }

            if ($model->save()) {
                $this->redirect(array('mybooks'));
            }
        }

        $this->render('addbooks', array(
            'model' => $model,
        ));
    }

    public function actionMyBooks()
    {
        $this->_seoTitle = '名师 - 我的著作';

        $masterId = $this->_user['masterId'];

        $criteria = new CDbCriteria();

        //分页
        $count = Book::model()->count($criteria->addCondition("teacher_id =" . $masterId));

        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);

        $books = Book::model()->findAll($criteria);

        $this->render('mybooks', array(
            'books' => $books,
			'status' => $this->isStatus(),
            'count' => $count,
            'pager' => $pager,
        ));
    }
	
	public function actionReview()
	{
		$message = false;
		$place = Place::model()->findByPk($_GET['id']);
		$host = Host::model()->findByPk($place['host_id']);
		
		$model = PlaceReview::model()->findByAttributes(array('place_id' => $_GET['id'], 'teacher_id' => $this->_user['masterId']));
		
		if(!count($model)){
			$model = new PlaceReview;
		}
		
		if(isset($_POST['PlaceReview']))
		{
			$model->attributes=$_POST['PlaceReview'];
			
			$model->place_id = $_GET['id'];
			$model->teacher_id = $this->_user['masterId'];
			
			if($model->save()){
				$message = true;
			}
		}
		
		$this->render('review',array(
			'place' => $place,
			'host' => $host,
			'message' => $message,
			'model' => $model,
		));
	}
	
	public function isStatus()
	{
		$teacherStatus = Teacher::model()->findByPk(array('id' => $this->_cookiesGet('userId')));
		
		$teacherStatus->status;
		
		return $teacherStatus->status;
	}
}

//end file