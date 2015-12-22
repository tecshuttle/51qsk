<?php

class CustomizeController extends XFrontBase
{
    public function actionIndex()
    {
        $this->_seoTitle = '我要去上课 - 企业定制';

        $model = new Customize;

        if (isset($_POST['Customize'])) {
            $model->attributes = $_POST['Customize'];
            if ($model->validate() and $model->save()) {
				Yii::app()->user->setFlash('success','需求已提交成功！感谢您的信任！我们会第一时间联络您进行详尽的信息收集！');
            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }
}

//end file