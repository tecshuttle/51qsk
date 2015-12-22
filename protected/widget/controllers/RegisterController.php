<?php

/**
 * 首页控制器
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */
class RegisterController extends XFrontBase {

    /**
     * 首页
     */
    public function actionIndex() {

        $teacherModel = new Teacher;
        $studentModel = new Student;
        $hostModel = new Host;

        if (XUtils::method() == 'POST') {
			/*switch($_POST){
				case isset($_POST['Teacher']): $nowModel = new Teacher; $nowAttributes = $_POST['Teacher']; $nowRedirect = '/master';  break;
				case isset($_POST['Student']): $nowModel = new Student; $nowAttributes = $_POST['Student']; $nowRedirect = '/student/info/sinfo'; break;
				case isset($_POST['Host']): $nowModel = new Host; $nowAttributes = $_POST['Host']; $nowRedirect = '/host/default/Info'; break;
				default: $nowModel = 0;
			}
			if($nowModel){
				$nowModel->attributes = $nowAttributes;


                if ($nowModel->validate() && $nowModel->save()) {

                    parent::_stateWrite(
                            array(
                        'masterId' => $nowModel->id,
						
                        'name' => $nowModel->name,
                            ), array('prefix' => '_master')
                    );

                    $cookie = new CHttpCookie('userName', $nowModel->name);
                    Yii::app()->request->cookies['userName'] = $cookie;
                    $this->redirect(array($nowRedirect));
                }
			}*/
            if (isset($_POST['Teacher'])) {

                $teacherModel->attributes = $_POST['Teacher'];


                if ($teacherModel->validate() && $teacherModel->save()) {

                    parent::_stateWrite(
                            array(
                        'masterId' => $teacherModel->id,
						
                        'name' => $teacherModel->name,
                            ), array('prefix' => '_master')
                    );

					if($teacherModel->name == ''){
						$teacherModel->name = '导师';
					}
					
                    $cookie = new CHttpCookie('userName', $teacherModel->name);
                    Yii::app()->request->cookies['userName'] = $cookie;
					$this->_cookiesSet('userId', $teacherModel->id);
					$this->_cookiesSet('userType', 'student');
					
					Yii::app()->user->setFlash('TSSuccess','注册成功！请完善个人信息并提交身份认证即可发布课程');
                    $this->redirect(array('/master'));
                }
            } 
			else if (isset($_POST['Student'])) {
                
				$studentModel->attributes = $_POST['Student'];

                //echo CActiveForm::validate($studentModel);
               

			   if ($studentModel->validate() && $studentModel->save()) {

                    parent::_stateWrite(
                            array(
                        'studentId' => $studentModel->id,
                        'name' => $studentModel->name,
                            ), array('prefix' => '_student')
                    );
					
					if($studentModel->name == ''){
						$studentModel->name = '学员';
					}
					
                    $cookie = new CHttpCookie('userName', $studentModel->name);
                    Yii::app()->request->cookies['userName'] = $cookie;
					$this->_cookiesSet('userId', $studentModel->id);
					$this->_cookiesSet('userType', 'student');
                    $this->redirect(array('/student/info/sinfo'));
                
				}
            } 
			else if (isset($_POST['Host'])) {
                
				$hostModel->attributes = $_POST['Host'];
			
				//echo CActiveForm::validate($hostModel);
				if ($hostModel->validate() && $hostModel->save()) {
                    parent::_stateWrite(
                            array(
                        'hostId' => $hostModel->id,
                        'name' => $hostModel->name,
                            ), array('prefix' => '_host')
                    );
					if($hostModel->name == ''){
						$hostModel->name = '场地主';
					}
					
                    $cookie = new CHttpCookie('userName', $hostModel->name);
                    Yii::app()->request->cookies['userName'] = $cookie;
					$this->_cookiesSet('userId', $hostModel->id);
					$this->_cookiesSet('userType', 'host');
                    $this->redirect(array('/host'));
                }
            }
        }


        $this->render('index', array('teacherModel' => $teacherModel, 'studentModel' => $studentModel, 'hostModel' => $hostModel));
    }

    /* Performs the AJAX validation.
     * @param Student $model the model to be validated
     */

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
