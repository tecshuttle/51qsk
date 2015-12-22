<?php

/**
 * This is the model class for table "{{teacher}}".
 *
 * The followings are the available columns in table '{{teacher}}':
 * @property string $id
 * @property string $user
 * @property string $name
 * @property string $password
 * @property string $address
 * @property integer $sex
 * @property string $email
 * @property string $phone
 * @property integer $status
 * @property integer $popularity
 * @property string $experience
 * @property string $profile
 * @property string $catalog_id
 * @property string $city
 * @property string $country
 * @property string $state
 * @property string $district
 * @property integer $review
 */
class TeacherLogin extends XBaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public $captcha;
	public $verifyPassword;
	
	public function tableName()
	{
		return '{{teacher}}';
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
			'password' => 'Password',
			'address' => 'Address',
			'sex' => '性别  0-女   1-男',
			'email' => 'Email',
			'phone' => 'Phone',
			'status' => 'Status',
			'popularity' => '人气',
			'experience' => '从业经验--单位：年',
			'profile' => '个人简介',
			'catalog_id' => '分类id',
			'city' => 'City',
			'country' => 'Country',
			'state' => 'State',
			'district' => 'District',
			'review' => '好评值',
			'captcha' => '验证码'
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
