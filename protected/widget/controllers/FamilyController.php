<?php

class FamilyController extends XFrontBase
{
    public function actionIndex()
    {
        $this->_seoTitle = '我要去上课 - 亲子成长';

        $criteria = new CDbCriteria();
        $criteria->addCondition("catalog_id = 24");

        //分页
        $count = Lesson::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 5;
        $pager->applyLimit($criteria);

        $lessons = Lesson::model()->findAll($criteria->addCondition("status = 1"));

        $this->render('index', array(
            'lessons' => $lessons,
            'count' => $count,
            'pager' => $pager
        ));
    }
}

//end file