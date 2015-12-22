<?php
/**
 * 公共登录
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class PublicController extends Controller
{

    /**
     * 会员登录
     */
    public function actionLogin ()
    {
        $model = new Admin('login');
        if (XUtils::method() == 'POST') {
            $model->attributes = $_POST['Admin'];
            if ($model->validate()) {
                $data = $model->find('username=:username', array ('username' => $model->username ));
                if ($data === null) {
                    $model->addError('username', '用户不存在');
                    AdminLogger::_create(array ('catalog' => 'login' , 'intro' => '登录失败，用户不存在:' . CHtml::encode($model->username) , 'user_id' => 0 ));
                } elseif (! $model->validatePassword($data->password)) {
                    $model->addError('password', '密码不正确');
                    AdminLogger::_create(array ('catalog' => 'login' , 'intro' => '登录失败，密码不正确:' . CHtml::encode($model->username). '，使用密码：'.CHtml::encode($model->password) , 'user_id' => 0 ));
                } elseif ($data->group_id == 2) {
                    $model->addError('username', '用户被锁定，请联系网站管理');
                } else {
					parent::_stateWrite(
						array(
							$this->module->id . 'Id'=>$data->id,
							'userName'=>$data->username,
						),array('prefix'=> '_' . $this->module->id)
					);

                    $data->last_login_ip = XUtils::getClientIP();
                    $data->last_login_time = time();
                    $data->login_count = $data->login_count+1;
                    $data->save();
                    AdminLogger::_create(array ('catalog' => 'login' , 'intro' => '用户登录成功:'.CHtml::encode($model->username) ));
                    $this->redirect(array('default/index'));
                }
            }
        }
        $this->render('login', array ('model' => $model ));
    }
	
	    /**
     * 会员登录
     */
    public function actionTestLogin ()
    {
		parent::_stateWrite(
			array(
				$this->module->id . 'Id'=>'11',
				'userName'=>'testest',
			),array('prefix'=> '_' . $this->module->id)
		);
		
		print_r(parent::_sessionGet('_' . $this->module->id));
    }

    /**
     * 退出登录
     */
    public function actionLogout ()
    {
        parent::_sessionRemove($this->module->id);
        $this->redirect(array ('public/login' ));
    }
}

?>