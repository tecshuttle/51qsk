<?php

class LoginController extends XFrontBase
{

    /**
     * 首页
     */
    public function actionIndex()
    {
        $teacherModel = new TeacherLogin;
        $studentModel = new StudentLogin;
        $hostModel = new HostLogin;

        if (XUtils::method() == 'POST') {

            if (isset($_POST['TeacherLogin'])) {
                $teacherModel->attributes = $_POST['TeacherLogin'];
                //echo CActiveForm::validate($teacherModel);
                //exit;
                if ($teacherModel->validate()) {

                    $data = $teacherModel->find('user=:user', array('user' => $teacherModel->user));

                    if ($data === null) {
                        $teacherModel->addError('user', '用户不存在');
                    } elseif (!$teacherModel->validatePassword($data->password)) {
                        $teacherModel->addError('password', '密码不正确');
                    } 
					//elseif() {} 
					else {

                        $this->_stateWrite(
                            array(
                                'masterId' => $data->id,
                                'name' => $data->name,
                            ), array('prefix' => '_master')
                        );


                        $this->_cookiesSet('userId', $data->id);
                        $this->_cookiesSet('userName', $data->name);
                        $this->_cookiesSet('userType', 'master');

                        $this->redirect(array('/master'));
                    }
                }
            } else if (isset($_POST['StudentLogin'])) {
                $studentModel->attributes = $_POST['StudentLogin'];
                //echo CActiveForm::validate($studentModel);检查何处不符合规则
                //exit;
                if ($studentModel->validate()) {

                    $data = $studentModel->find('user=:user', array('user' => $studentModel->user));

                    if ($data === null) {
                        $studentModel->addError('user', '用户不存在');
                    } elseif (!$studentModel->validatePassword($data->password)) {
                        $studentModel->addError('password', '密码不正确');
                    } else {
                        $this->_stateWrite(
                            array(
                                'studentId' => $data->id,
                                'name' => $data->name,
                            ), array('prefix' => '_student')
                        );

                        $this->_cookiesSet('userId', $data->id);
                        $this->_cookiesSet('userName', $data->name);
                        $this->_cookiesSet('userType', 'student');


                        $this->redirect(array('/student'));
                    }
                }
            } else if (isset($_POST['HostLogin'])) {
                $hostModel->attributes = $_POST['HostLogin'];
                //echo CActiveForm::validate($hostModel);检查何处不符合规则
                //exit;
                if ($hostModel->validate()) {

                    $data = $hostModel->find('user=:user', array('user' => $hostModel->user));

                    if ($data === null) {
                        $hostModel->addError('user', '用户不存在');
                    } elseif (!$hostModel->validatePassword($data->password)) {
                        $hostModel->addError('password', '密码不正确');
                    } else {

                        $this->_stateWrite(
                            array(
                                'hostId' => $data->id,
                                'name' => $data->name,
                            ), array('prefix' => '_host')
                        );

                        $this->_cookiesSet('userId', $data->id);
                        $this->_cookiesSet('userName', $data->name);
                        $this->_cookiesSet('userType', 'host');

                        $this->redirect(array('/host'));
                    }
                }
            }
        }

        $this->render('index', array('teacherModel' => $teacherModel, 'studentModel' => $studentModel, 'hostModel' => $hostModel));
    }

}

//end file