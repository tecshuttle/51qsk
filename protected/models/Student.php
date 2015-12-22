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
class Student extends XBaseModel
{
	public $captcha;
	public $verifyPassword;
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
			//array('user, password, verifyPassword, phone, address, shipping_address, name', 'required', 'on'=>'insert'),
			array('user, password, verifyPassword, captcha', 'required', 'on'=>'create'),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => '重复密码必须和密码一致'),
			array('user, phone', 'match', 'pattern' => '/^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$/', 'message'=>'用户名或手机号请输入正确的手机号'),
			array('user, phone', 'unique', 'on'=>'insert', 'message'=>'用户名或手机号已存在'),
            array('captcha', 'captcha', 'allowEmpty' => !extension_loaded('gd'), 'on' => 'login, insert'),
			array('user, password, register_time', 'required'),
			array('sex, status', 'numerical', 'integerOnly'=>true),
			array('user', 'length', 'max'=>50),
			array('name', 'length', 'max'=>10),
			array('email, phone', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32,'min' =>6),
			array('shipping_address, address', 'length', 'max'=>100),
			array('point', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user, name, email, password, shipping_address, address, sex, phone, point, status, register_time', 'safe', 'on'=>'search'),
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
			'teachers' => array(self::MANY_MANY, 'Teacher', 'repair_mapping(student_id, teacher_id)'),
			'reviews' => array(self::HAS_MANY, 'Review', 'student_id'),
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
			'name' => '姓名',
			'email' => 'Email',
			'password' => '密码',
			'shipping_address' => '收货地址',
			'address' => 'Address',
			'sex' => 'Sex',
			'phone' => 'Phone',
			'point' => 'Point',
			'status' => 'Status',
			'register_time' => '注册时间'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('shipping_address',$this->shipping_address,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('point',$this->point,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('register_time',$this->register_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
    {
        $this->password = $this->hashPassword($this->password);
        return parent::beforeSave();
    }
}
