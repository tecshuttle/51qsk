<?php

class PointsController extends XUserBase {

    public $layout = '//layouts/student';

    public function init() {
        parent::init();
    }

    public function actionFocus($id) {
        //echo "$id";
        //print_r($this->_user);


        $model = new StudentTeacher;
        $model->student_id = $this->_user['studentId'];
        $model->teacher_id = $id;
        $model->save();
        $this->redirect('index');
        //print_r($model );
        //exit;
    }

    public function actionExchange() {
        //$model = new StudentTeacher;
        $student_id = $this->_user['studentId'];
        $teacher_id = StudentTeacher::model()->findAllByAttributes(array('student_id' => $student_id));

        $this->render('exchange', array('teacher_id' => $teacher_id));
    }

}
