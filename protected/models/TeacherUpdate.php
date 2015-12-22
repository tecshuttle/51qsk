<?php

//todo: 这个model与teacher类似，择机删除。

class TeacherUpdate extends XBaseModel
{
    public function tableName()
    {
        return '{{teacher}}';
    }


    public function rules()
    {
        return array(
            array('name, phone, profile, experience, catalog_id, email', 'required'),
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
            'name' => '讲师姓名',
            'password' => 'Password',
            'address' => 'Address',
            'sex' => '性别',
            'email' => '邮箱',
            'phone' => 'Phone',
            'status' => 'Status',
            'popularity' => '人气',
            'experience' => '从业经验',
            'profile' => '讲师介绍',
            'catalog_id' => '擅长领域',
            'city' => 'City',
            'country' => 'Country',
            'state' => 'State',
            'district' => 'District',
            'review' => '好评值',
			'degree' => '资格证',
			'pic' => '头像',
        );
    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

//end file
