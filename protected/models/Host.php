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
 * @property string $email
 * @property integer $status
 * @property string $address
 * @property string $pic
 */
class Host extends XBaseModel
{
	public $captcha;
	public $verifyPassword;
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
			array('user, password, verifyPassword, captcha', 'required', 'on'=>'insert'),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => '重复密码必须和密码一致'),
			array('user, phone', 'match', 'pattern' => '/^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$/', 'message'=>'用户名或手机号请输入正确的手机号'),
			array('user, phone', 'unique', 'on'=>'insert', 'on'=>'insert','message'=>'用户名或手机号已存在'),
			array('captcha', 'captcha', 'allowEmpty'=>!extension_loaded('gd'), 'on'=>'insert'),
			array('user, password', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user, phone, business_name', 'length', 'max'=>50),
			array('address', 'length', 'max'=>255),
			array('password', 'length', 'max'=>32,'min'=>6),
			array('name', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user, password, name, phone, email, status, address, pic, business_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
			'places' => array(self::HAS_ONE, 'Place', 'host_id'),
			'catalogs' => array(self::HAS_MANY, 'Catalog', 'catalog_id'),
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
			'password' => '密码',
			'name' => '真实姓名',
			'phone' => '手机号码',
			'email' => 'Email',
			'status' => 'Status',
			'address' => '具体地址',
			'pic' => '图片',
			'business_name' => 'Business Name',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('business_name',$this->business_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
		
	public function beforeSave()
    {
        $this->password = $this->hashPassword($this->password);
        return parent::beforeSave();
    }
}
