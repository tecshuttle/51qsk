<?php

/**
 * This is the model class for table "{{family}}".
 *
 * The followings are the available columns in table '{{family}}':
 * @property string $id
 * @property string $name
 * @property string $time
 * @property integer $city
 * @property string $address
 * @property string $price
 * @property string $max_people
 * @property string $actual_people
 * @property string $profile
 * @property string $pic
 * @property integer $status
 * @property string $sponsor
 * @property string $pic_other
 */
class Family extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{family}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, time, actual_people, profile', 'required'),
			array('city, status', 'numerical', 'integerOnly'=>true),
			array('name, time, address', 'length', 'max'=>25),
			array('price, max_people, actual_people', 'length', 'max'=>10),
			array('profile, sponsor, pic_other', 'length', 'max'=>5000),
			array('pic', 'length', 'max'=>5000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, time, city, address, price, max_people, actual_people, profile, pic, status, sponsor, pic_other', 'safe', 'on'=>'search'),
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
			'time' => 'Time',
			'city' => 'City',
			'address' => 'Address',
			'price' => 'Price',
			'max_people' => 'Max People',
			'actual_people' => 'Actual People',
			'profile' => 'Profile',
			'pic' => 'Pic',
			'status' => 'Status',
			'sponsor' => 'Sponsor',
			'pic_other' => 'Pic Other',
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
		$criteria->compare('time',$this->time,true);
		$criteria->compare('city',$this->city);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('max_people',$this->max_people,true);
		$criteria->compare('actual_people',$this->actual_people,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sponsor',$this->sponsor,true);
		$criteria->compare('pic_other',$this->pic_other,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Family the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
