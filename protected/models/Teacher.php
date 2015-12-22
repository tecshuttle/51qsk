<?php


class Teacher extends XBaseModel
{

    public $captcha;
    public $verifyPassword;

    public function tableName()
    {
        return '{{teacher}}';
    }


    public function rules()
    {
        return array(
            array('user, password, verifyPassword, captcha, phone', 'required', 'on' => 'create'),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => '重复密码必须和密码一致'),
            array('user, phone', 'match', 'pattern' => '/^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$/', 'message'=>'用户名或手机号请输入正确的手机号'),
			array('user, phone', 'unique', 'on'=>'insert', 'message'=>'用户名或手机号已存在'),
            array('user', 'unique', 'on' => 'insert'),
            array('captcha', 'captcha', 'allowEmpty' => !extension_loaded('gd'), 'on' => 'login, insert'),
            array('user, password', 'required'),
            array('sex, status, popularity, review', 'numerical', 'integerOnly' => true),
            array('user', 'length', 'max' => 50),
            array('name, city, country, state, district', 'length', 'max' => 10),
            array('password', 'length', 'max' => 32,'min' =>6),
            array('address', 'length', 'max' => 100),
            array('email', 'length', 'max' => 20),
            array('experience, catalog_id', 'length', 'max' => 11),
            array('profile', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user, name, password, address, sex, email, phone, status, popularity, experience, profile, catalog_id, city, country, state, district, review', 'safe', 'on' => 'search'),
        );
    }


    public function relations()
    {
        return array(
			'books' => array(self::HAS_MANY, 'Book', 'teacher_id'),
			'students' => array(self::MANY_MANY, 'Student', 'repair_mapping(teacher_id, student_id)'),
			'reviews' => array(self::HAS_MANY, 'Review', 'teacher_id'),
			'lessons' => array(self::HAS_MANY, 'Lesson', 'teacher_id'),
		);
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user' => '用户名',
            'name' => '真实姓名',
            'password' => '密码',
            'address' => 'Address',
            'sex' => '性别  0-女   1-男',
            'email' => '邮箱',
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
        );
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user', $this->user, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('sex', $this->sex);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('popularity', $this->popularity);
        $criteria->compare('experience', $this->experience, true);
        $criteria->compare('profile', $this->profile, true);
        $criteria->compare('catalog_id', $this->catalog_id, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('district', $this->district, true);
        $criteria->compare('review', $this->review);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function beforeSave()
    {
        $this->password = $this->hashPassword($this->password);
        return parent::beforeSave();
    }
}

//end file