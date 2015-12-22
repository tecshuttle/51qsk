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
 * @property integer $sex
 * @property string $email
 * @property integer $status
 */
class HostLogin extends XBaseModel
{
	public $captcha;
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
			'name' => 'Name',
			'phone' => 'Phone',
			'address' => 'Address',
			'sex' => 'Sex',
			'email' => 'Email',
			'status' => 'Status',
			'captcha' => '验证码'
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);

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
