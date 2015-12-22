<?php
/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class HostChangePassword extends Host {
	public $oldPassword;
	public $password;
	public $verifyPassword;
	
	public function rules() {
		return Yii::app()->controller->id == 'recovery' ? array(
			array('password, verifyPassword', 'required'),
			array('password, verifyPassword', 'length', 'max'=>16, 'min' => 6,'message' => "不正确的密码（最小长度为6个符号）."),
			array('password', 'match', 'pattern' => '/^[A-Za-z_0-9]+$/u','message' => "密码必须由字母和数字构成."),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "输入的密码不正确."),
		) : array(
			array('oldPassword, password, verifyPassword', 'required'),
			array('oldPassword, password, verifyPassword', 'length', 'max'=>16, 'min' => 5,'message' => "不正确的密码（最小长度为6个符号）."),
			array('password', 'match', 'pattern' => '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/','message' => '密码必须由字母和数字构成'),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "输入的密码不正确."),
			array('oldPassword', 'verifyOldPassword'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'oldPassword'=> "旧密码",
			'password'=> "新密码",
			'verifyPassword'=> "重复新密码",
		);
	}
	
	/**
	 * Verify Old Password
	 */
	 public function verifyOldPassword($attribute, $params)
	 {
		if (Host::model()->findByPk(Yii::app()->controller->_user['hostId'])->password != $this->hashPassword($this->$attribute))
		
			 $this->addError($attribute, "原密码不正确.");
	 }
}