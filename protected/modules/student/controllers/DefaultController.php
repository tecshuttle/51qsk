<?php

class DefaultController extends XUserBase {

    public $layout = '//layouts/student';

    public function init() {
        parent::init();
    }

    public function actionIndex() {
        //$this->render('index');
        $this->redirect($this->createUrl('lesson/list'));
        
    }

}
