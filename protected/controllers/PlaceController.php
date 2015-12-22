<?php

class PlaceController extends XFrontBase
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria();

        //根据分类查找场地信息
        $city = Yii::app()->request->getParam('city');
        $food = Yii::app()->request->getParam('food');
        $sex = Yii::app()->request->getParam('sex');

        if (!empty($city)) {
            $criteria->addCondition("city = '{$city}'");
        }
        if (!empty($food)) {
            $criteria->addCondition("food = '{$food}'");
        }
        if (!empty($sex)) {
            $criteria->addCondition("sex = '{$sex}'");
        }

        $criteria->addCondition('status = 1');

        //分页类
        $criteria->order = 'id ASC';
        $count = Place::model()->count($criteria); //count() 函数计算数组中的单元数目或对象中的属性个数。
        $pager = new CPagination($count);
        $pager->pageSize = 5; //每页显示的行数

        $pager->applyLimit($criteria);
        $places = Place::model()->findAll($criteria); //查询所有的数据

        $this->render('index', array(
            'places' => $places,
            'city' => $city,
            'food' => $food,
            'sex' => $sex,
            'pager' => $pager
        ));
    }

    public function actionView($id)
    {
        $place = Place::model()->findByPk($id);

        $this->_seoTitle = '场地 - ' . $place->name;

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'place' => $place
        ));
    }
	
	public function actionPay($id)
    {
        $place = $this->loadModel($id);
		
        $this->render('pay', array(
			'place' => $place
        ));
    }

    private function loadModel($id)
    {
        $model = Place::model()->findByPk($id);

        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

}

//end file
