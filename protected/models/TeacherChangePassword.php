<?php

class TeacherChangePassword extends Teacher
{
    public $oldPassword;
    public $password;
    public $verifyPassword;

    public function rules()
    {
        return Yii::app()->controller->id == 'recovery' ? array(
            array('password, verifyPassword', 'required'),
            array('password, verifyPassword', 'length', 'max' => 16, 'min' => 6, 'message' => "密码错误(长度至少为6个字母)"),
            array('password', 'match', 'pattern' => '/^[A-Za-z_0-9]+$/u', 'message' => "名字可由字母，数字或下划线组成，且必须以字母开头"),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => "密码不一致"),
        ) : array(
            array('oldPassword, password, verifyPassword', 'required'),
            array('oldPassword, password, verifyPassword', 'length', 'max' => 16, 'min' => 5, 'message' => "密码错误 (长度至少为6个字母)"),
            array('password', 'match', 'pattern' => '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/', 'message' => '密码必须由字母和数字构成'),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => "密码填写不一致"),
            array('oldPassword', 'verifyOldPassword'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'oldPassword' => "旧密码",
            'password' => "新密码",
            'verifyPassword' => "重复新密码",
        );
    }

    public function verifyOldPassword($attribute, $params)
    {
        if (Teacher::model()->findByPk(Yii::app()->controller->_user['masterId'])->password != $this->hashPassword($this->$attribute))
            $this->addError($attribute, "原密码不正确");
    }
}

//end file