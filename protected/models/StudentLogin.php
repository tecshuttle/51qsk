<?php

/**
 * This is the model class for table "{{student}}".
 *
 * The followings are the available columns in table '{{student}}':
 * @property string $id
 * @property string $user
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $shipping_address
 * @property string $address
 * @property integer $sex
 * @property string $phone
 * @property string $point
 * @property integer $status
 */
class StudentLogin extends XBaseModel
{
	public $captcha;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{student}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user, password, captcha', 'required'),
			array('user, phone', 'match', 'pattern' => '/^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$/', 'message'=>'用户名或手机号请输入正确的手机号'),
			array('captcha', 'captcha', 'allowEmpty'=>!extension_loaded('gd'), 'on'=>'login, insert'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
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
			'user' => '用户名',
			'name' => 'Name',
			'email' => 'Email',
			'password' => '密码',
			'shipping_address' => 'Shipping Address',
			'address' => 'Address',
			'sex' => 'Sex',
			'phone' => 'Phone',
			'point' => 'Point',
			'status' => 'Status',
			'captcha' => '验证码'
		);
	}



}
