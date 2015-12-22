<?php

class FamilyController extends XFrontBase
{
    public function actionIndex()
    {
        $this->_seoTitle = '我要去上课 - 亲子活动';

        $criteria = new CDbCriteria();
		
        //分页
        $count = Family::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);
		
        $allFamily = Family::model()->findAll($criteria->addCondition("status = 1"));
			$imageList = unserialize($allFamily[0]['pic_other']);
		
        $this->render('index', array(
            'allFamily' => $allFamily,
            'count' => $count,
            'pager' => $pager,
			'imageList' => $imageList
        ));
    }
	
	 public function actionPay($id)
    {
        $family = $this->loadModel($id);
			
        $this->render('pay', array(
			'family' => $family
        ));
    }

    private function loadModel($id)
    {
        $model = Family::model()->findByPk($id);

        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }
}

//end file