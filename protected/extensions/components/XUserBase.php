<?php
/**
 * 后台管理基础类，后台控制器必须继承此类
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class XUserBase extends XFrontBase
{
    public $_user;
    public function init ()
    {
        parent::init();
        if (isset($_POST['sessionId'])) {
            $session = Yii::app()->getSession();
            $session->close();
            $session->sessionID = $_POST['sessionId'];
            $session->open();
        }

        $this->_user = parent::_sessionGet('_' . $this->module->id);
        if (empty($this->_user[$this->module->id . 'Id']))
            $this->redirect($this->createUrl('/login', array('userType' => $this->module->id )));
    }
	
	    /**
     * 编辑器文件上传
     */
    public function actionUpload ()
    {
        if (XUtils::method() == 'POST') {
            $file = XUpload::upload($_FILES['imgFile']);
            if (is_array($file)) {
                $model = new Upload();
                $model->user_id = intval($admini['userId']);
                $model->file_name = CHtml::encode($file['pathname']);
                $model->thumb_name = CHtml::encode($file['paththumbname']);
                $model->real_name = CHtml::encode($file['name']);
                $model->file_ext = $file['extension'];
                $model->file_mime = $file['type'];
                $model->file_size = $file['size'];
                $model->save_path = $file['savepath'];
                $model->hash = $file['hash'];
                $model->save_name = $file['savename'];
                $model->create_time = time();
                if ($model->save()) {
                    exit(CJSON::encode(array ('error' => 0 , 'url' => Yii::app()->baseUrl . '/' . $file['pathname'] )));
                } else {
                    @unlink($file['pathname']);
                    @unlink($file['paththumbname']);
                    exit(CJSON::encode(array ('error' => 1 , 'message' => '上传错误' )));
                }
            
            } else {
                exit(CJSON::encode(array ('error' => 1 , 'message' => '上传错误:'.$file )));
            }
        }
    }
}

?>