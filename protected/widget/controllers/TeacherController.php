<?php

class TeacherController extends XFrontBase
{
    public function actionView($id)
    {
        $teacher = $this->loadModel($id);
        $this->_seoTitle = '名师 - ' . $teacher->name;

        $userId = $this->_cookiesGet('userId');
        $userType = $this->_cookiesGet('userType');

        $reviewModel = new Review;

        if ($userType === 'student' and isset($_POST['Review'])) {
            $reviewModel->attributes = $_POST['Review'];

            $reviewModel->teacher_id = $id;
            $reviewModel->student_id = $userId;
            $reviewModel->ctime = time();

            if ($reviewModel->validate() and $reviewModel->save()) {
                Yii::app()->user->setFlash('success', '保存成功');
            }
        }

        $criteria = new CDbCriteria();

        $books = Book::model()->findAllByAttributes(array('teacher_id' => $id));

        $lessons = array();
        $reviews = array();
        $list = yii::app()->request->getParam('list');

        if ($list === null or $list === 'lesson') {
            $model = Lesson::model();

            $count = $model->count($criteria->addCondition("teacher_id = $id"));
            $pager = new CPagination($count);
            $pager->pageSize = 4;
            $pager->applyLimit($criteria);

            $lessons = $model->findAll($criteria);
        } else {
            $model = Review::model();

            $count = $model->count($criteria->addCondition("teacher_id = $id"));
            $pager = new CPagination($count);
            $pager->pageSize = 4;
            $pager->applyLimit($criteria);

            $reviews = Yii::app()->db->createCommand()
                ->select('s.*, r.contents, r.ctime')
                ->from('seed_review r')
                ->leftjoin('seed_student s', 's.id=r.student_id')
                ->where('r.teacher_id=:teacher_id', array(':teacher_id' => $id))
                ->order('ctime desc')
                ->limit(4, $pager->currentPage * $pager->pageSize)
                ->queryAll();
        }

        //判断学员已关注老师
        if ($userType === 'student') {
            $is_focus = StudentTeacher::model()->findByAttributes(array('student_id' => $userId, 'teacher_id' => $id));
        }

        $this->render('view', array(
            'is_focus' => $is_focus,
            'teacher' => $teacher,
            'lessons' => $lessons,
            'reviews' => $reviews,
            'books' => $books,
            'userType' => $userType,
            'reviewModel' => $reviewModel,
            'count' => $count,
            'pager' => $pager,
            'list' => $_GET['list']
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->_seoTitle = '我要去上课 - 名师库';

        $criteria = new CDbCriteria();

        //根据分类查找导师信息
        $cat = Yii::app()->request->getParam('cat');
        $district = Yii::app()->request->getParam('district');
        //$areas = Area::model()->findAll();
        $city = Yii::app()->request->getParam('city');

        if (!empty($city)) {
            $criteria->addCondition("t.city = '{$city}'");
        }

        if (!empty($cat)) {
            $criteria->addCondition("t.catalog_id = '{$cat}'");
        }

        if (!empty($district)) {
            $criteria->addCondition("t.district = '{$district}'");
        }

        //导师分类
        $catalogs = Catalog::getMenu();

        if (!empty($_GET['sort'])) {
            switch ($_GET['sort']) {
                case 'id':
                    $criteria->order = 't.id DESC';
                    break;
                case 'review':
                    $criteria->order = 't.review DESC';
                    break;
                case 'popularity':
                    $criteria->order = 't.popularity DESC';
                    break;
            }
        } else {
            $criteria->order = 't.popularity DESC';
        }

        //导师搜索
        $nameStripTags = strip_tags(Yii::app()->request->getParam('name'));
		$name = addslashes($nameStripTags);
        if (!empty($name)) {
            $teacherName = '%' . $name . '%';
            $criteria->addCondition("t.name like '{$teacherName}'");
        }

        //分页
        $count = Teacher::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);
        $teachers = Teacher::model()->findAll($criteria);
		


        $this->render('index', array(
            'teachers' => $teachers,
            //'areas'=>$areas,
			'city' => $city,
            'count' => $count,
            'pager' => $pager,
            'cat' => $cat,
            'catalogs' => $catalogs,
            'name' => $name,
            'sort' => $_GET['sort'],
            //   'key' => $_GET['key'],
        ));
    }


    public function loadModel($id)
    {
        $model = Teacher::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}

//end file