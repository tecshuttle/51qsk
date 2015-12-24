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
				
				$studentUser = Student::model()->countByAttributes(array('user'=>$teacherModel->user));
				$hostUser = Host::model()->countByAttributes(array('user'=>$teacherModel->user));
				//echo CActiveForm::validate($hostModel);
				//判断账号与其他角色账号是否相同
				if($studentUser != 0 || $hostUser != 0){
					Yii::app()->user->setFlash('TeacherUserError','您的手机号已在其他角色注册');
				}
				$tAgree = Yii::app()->request->getPost('teacherAgree');
				if($tAgree === NULL){
					Yii::app()->user->setFlash('teacherAgreeMessage','同意条款未勾选');
				}
				
				if ($teacherModel->validate() && $studentUser == 0 && $hostUser == 0 && $tAgree === 'on' && $teacherModel->save()) {

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
				$teacherUser = Teacher::model()->countByAttributes(array('user'=>$studentModel->user));
				$hostUser = Host::model()->countByAttributes(array('user'=>$studentModel->user));
				//echo CActiveForm::validate($hostModel);
				//判断账号与其他角色账号是否相同
				if($teacherUser != 0 || $hostUser != 0){
					Yii::app()->user->setFlash('StudentUserError','您的手机号已在其他角色注册');
				}
				
				$sAgree = Yii::app()->request->getPost('studentAgree');
				if($sAgree === NULL){
					Yii::app()->user->setFlash('studentAgreeMessage','同意条款未勾选');
				}
				
				$studentModel->register_time = date('Y-m-d H:m:s',time());
				if ($studentModel->validate() && $teacherUser == 0 && $hostUser == 0 && $sAgree === 'on' && $studentModel->save()) {

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
			
				$teacherUser = Teacher::model()->countByAttributes(array('user'=>$hostModel->user));
				$studentUser = Student::model()->countByAttributes(array('user'=>$hostModel->user));
				//echo CActiveForm::validate($hostModel);
				//判断账号与其他角色账号是否相同
				if($studentUser != 0 || $teacherUser != 0){
					Yii::app()->user->setFlash('HostUserError','您的手机号已在其他角色注册');
				}
				
				$hAgree = Yii::app()->request->getPost('hostAgree');
				if($hAgree === NULL){
					Yii::app()->user->setFlash('hostAgreeMessage','同意条款未勾选');
				}
				
				if ($hostModel->validate() && $studentUser == 0 && $teacherUser == 0 && $hAgree === 'on' && $hostModel->save()) {
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
