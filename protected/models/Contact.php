<?php

/**
 * This is the model class for table "{{contact}}".
 *
 * The followings are the available columns in table '{{contact}}':
 * @property string $id
 * @property string $name
 * @property string $company
 * @property string $cellphone
 * @property string $email
 * @property string $message
 */
class Contact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{contact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cellphone, email, message', 'required'),
			array('name', 'length', 'max'=>20),
			array('company, email', 'length', 'max'=>250),
			array('cellphone', 'length', 'max'=>50),
			array('cellphone', 'match', 'pattern' => '/^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$/', 'message'=>'用户名或手机号请输入正确的手机号'),
			array('message', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, company, cellphone, email, message', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'company' => 'Company',
			'cellphone' => 'Cellphone',
			'email' => 'Email',
			'message' => 'Message',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('cellphone',$this->cellphone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
