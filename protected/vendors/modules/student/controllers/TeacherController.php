<?php

class TeacherController extends XUserBase
{

    public $layout = '//layouts/student';

    public function init()
    {
        parent::init();
    }

    public function actionFocus($id)
    {
        $model = new StudentTeacher;

        $model->student_id = $this->_user['studentId'];
        $model->teacher_id = $id;
        $model->save();

        $this->redirect($this->createUrl('/teacher/view', array('id' => $id)));
    }

    public function actionDelete($id)
    {
        $student_id = $this->_user['studentId'];

        $model = StudentTeacher::model()->findByAttributes(array('student_id' => $student_id, 'teacher_id' => $id));
        $model->delete();

        $this->redirect($this->createUrl('/student/teacher/'));
    }


    public function actionIndex()
    {
        $this->_seoTitle = '学员 - 关注导师';

        $student_id = $this->_user['studentId'];
        $teachers = $this->getTeachers($student_id);

        $this->render('index', array('teachers' => $teachers));
    }


    private function getTeachers($student_id)
    {
        $teachers = Yii::app()->db->createCommand()
            ->select('t.*, cat.catalog_name')
            ->from('seed_teacher t')
            ->leftjoin('seed_student_teacher st', 't.id=st.teacher_id')
            ->leftjoin('seed_catalog as cat', 'cat.id=t.catalog_id')
            ->where('st.student_id=:student_id', array(':student_id' => $student_id))
            ->queryAll();

        return $teachers;
    }
}

//end file