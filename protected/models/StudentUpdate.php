<?php

//todo: 这个model与teacher类似，择机删除。

class StudentUpdate extends XBaseModel
{
    public function tableName()
    {
        return '{{student}}';
    }


    public function rules()
    {
        return array(
            array('user, email, sex, phone, address, shipping_address, name, pic', 'required'),
        );
    }


    public function relations()
    {
        return array();
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
			'user' => '用户名',
			'name' => '姓名',
			'email' => 'Email',
			'password' => '密码',
			'shipping_address' => '收货地址',
			'address' => '地址',
			'sex' => 'Sex',
			'phone' => 'Phone',
			'point' => 'Point',
			'status' => 'Status',
			'pic' => '头像',
        );
    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

//end file
