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

class LogoutController extends XFrontBase
{
    public function actionIndex()
    {
        $this->_xsession = new CHttpSession();

        //删除全部session
        Yii::app()->session->clear();  //删除session变量
        Yii::app()->session->destroy(); //删除服务器的session信息

        $this->_cookiesRemove('userType');
        $this->_cookiesRemove('userName');
        $this->_cookiesRemove('userId');
        $this->redirect(array('/'));
        exit;
    }

}

//end file