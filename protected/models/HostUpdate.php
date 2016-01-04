<?php

/**
 * This is the model class for table "{{host}}".
 *
 * The followings are the available columns in table '{{host}}':
 * @property string $id
 * @property string $user
 * @property string $password
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property integer $status
 */
class HostUpdate extends XBaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{host}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, email, phone, business_name, pic, status,', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
		    

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user' => 'User',
			'password' => 'Password',
			'name' => '主理人姓名',
			'phone' => 'Phone',
			'address' => '详细地址',
			'email' => '邮箱',
			'business_name'=>'企业名称',
			'pic'=>'企业认证图',
			'status' => 'Status',
			'head_portrait'=>'头像'
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Host the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

}
