<?php

/**
 * This is the model class for table "{{place}}".
 *
 * The followings are the available columns in table '{{place}}':
 * @property string $id
 * @property string $catalog_id
 * @property string $name
 * @property integer $rank
 * @property string $summary
 * @property string $intro
 * @property string $sex
 * @property string $food
 * @property string $price
 * @property string $service
 * @property string $people
 * @property string $space
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $district
 * @property string $address
 * @property string $pic
 * @property string $host_id
 * @property string $status
 * @property integer $recommendation
 */
class Place extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{place}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,summary, price, people, space, address, host_id, pic_adr', 'required'),
			array('recommendation', 'numerical', 'integerOnly'=>true),
            array('rank', 'numerical'),
            array('catalog_id, name, country, state, city, status', 'length', 'max' => 50),
            array('summary, district, pic, pic_adr', 'length', 'max' => 255),
            array('pic_other', 'length', 'max' => 2000),
            array('sex, food', 'length', 'max' => 1),
            array('price, host_id', 'length', 'max' => 10),
            array('service, space', 'length', 'max' => 20),
            array('people', 'length', 'max' => 11),
            array('address', 'length', 'max' => 100),
            array('intro', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, catalog_id, name, rank, summary, intro, sex, food, price, service, people, space, country, state, city, district, address, pic, host_id, status', 'safe', 'on' => 'search'),
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

            'countryArea' => array(self::BELONGS_TO, 'Area', 'country'),
            'stateArea' => array(self::BELONGS_TO, 'Area', 'state'),
            'cityArea' => array(self::BELONGS_TO, 'Area', 'city'),
            'districtArea' => array(self::BELONGS_TO, 'Area', 'district'),
			'hosts' => array(self::BELONGS_TO, 'Host', 'host_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'catalog_id' => 'Catagory',
            'name' => '场地名称',
            'rank' => 'Rank',
            'summary' => '场地简介',
            'intro' => 'Intro',
            'sex' => 'Sex',
            'food' => 'Food',
            'price' => '日租价格',
            'service' => 'Service',
            'people' => '容纳人数',
            'space' => '面积',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'district' => 'District',
            'address' => '详细地址',
            'pic' => 'Pic',
            'host_id' => 'Host',
            'status' => 'Status',
			'pic_adr' => '主图',
			'pic_other' => 'Pic Other',
			'recommendation' => 'Recommendation',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('catalog_id', $this->catalog_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('rank', $this->rank);
        $criteria->compare('summary', $this->summary, true);
        $criteria->compare('intro', $this->intro, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('food', $this->food, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('service', $this->service, true);
        $criteria->compare('people', $this->people, true);
        $criteria->compare('space', $this->space, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('district', $this->district, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('host_id', $this->host_id, true);
        $criteria->compare('status', $this->status, true);
		$criteria->compare('pic_adr',$this->pic_adr,true);
		$criteria->compare('pic_other',$this->pic_other,true);
		$criteria->compare('recommendation',$this->recommendation, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Place the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

//end file
