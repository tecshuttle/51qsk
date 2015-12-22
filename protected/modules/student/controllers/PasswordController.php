<?php

class PasswordController extends XUserBase
{

    public $layout = '//layouts/student';

    public function init()
    {
        parent::init();
    }

    public function actionPawd()
    {
        $this->_seoTitle = '学员 - 修改密码';

        $studentModel = new StudentChangePassword;

        if (isset($_POST['StudentChangePassword'])) {
            $studentModel->attributes = $_POST['StudentChangePassword'];
            if ($studentModel->validate()) {
                $new_password = Student::model()->findbyPk($this->_user['studentId']);

                $new_password->password = $studentModel->password;
                $new_password->verifyPassword = $studentModel->password;
                if ($new_password->save()) {
                    Yii::app()->user->setFlash('success', '保存成功');
                    //这里提示保存成功后重定向到登陆页！
                }
            }
        }

        $this->render('password', array('studentModel' => $studentModel));
    }
}

//end file