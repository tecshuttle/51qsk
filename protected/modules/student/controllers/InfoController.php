<?php

class InfoController extends XUserBase
{

    public $layout = '//layouts/student';

    public function init()
    {
        parent::init();
    }

    public function actionSinfo()
    {
        $this->_seoTitle = '学员 - 个人信息';

        $student_id = $this->_user['studentId'];
		
        $studentInfo = StudentUpdate::model()->findByPk($student_id);

        //F::dump($sinfo);
		if (isset($_POST['StudentUpdate'])) {
            $studentInfo->attributes = $_POST['StudentUpdate'];
			
			$file = XUpload::upload($_FILES['attach']);
				
				if (is_array($file)) {
					$studentInfo->pic = $file['pathname'];
					@unlink($_POST['oAttach']);
					@unlink($_POST['oThumb']);
				}
				if ($studentInfo->pic == null){
					Yii::app()->user->setFlash('picMessage','头像不能为空');
				}

            if ($studentInfo->validate()) {
				if ($studentInfo->save() && ($studentInfo->pic != null)) {
					$cookie = new CHttpCookie('userName', $studentInfo->name);
					Yii::app()->request->cookies['userName'] = $cookie;
					
					Yii::app()->user->setFlash('success', '保存成功！');
					
				}
            }
        }

        $this->render('student_info', array('studentInfo' => $studentInfo));
    }
	
}

//end file
