<?php

class DefaultController extends XUserBase
{

    public $layout = '//layouts/host';

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $this->redirect(array('/host/default/Info'));
    }

	public function actionMyPlaceComment()
	{
		$this->render('myplacecomment', array(
            
        ));
	}
	
	public function isStatus()
	{
		$hostStatus = Host::model()->findByPk(array('id' => $this->_cookiesGet('userId')));
		
		$hostStatus->status;
		
		return $hostStatus->status;
	}
	
    public function actionMyPlace()
    {
		$placeCriteria = new CDbCriteria();
		$placeBookingCriteria = new CDbCriteria();
		$placeReviewCriteria = new CDbCriteria();
		
		//我的场地
        $placeCriteria->order = 'id DESC';
        $placeCriteria->addCondition("host_id = '{$this->_cookiesGet('userId')}'");

        $place = Place::model()->find($placeCriteria);
		
		//客户评分
		$placeReviewCriteria->order = 'id DESC';
		$placeReviewCriteria->addCondition("place_id = '{$place['id']}'");
		
		$placeReview = PlaceReview::model()->findAll($placeReviewCriteria);
		//场地信息
		//$placeBookingCriteria->select = "'t.*'";
		//$placeBookingCriteria->join = 'LEFT JOIN seed_place_booking as sl ON t.id=sl.teacher_id';
		//$placeBookingCriteria->addCondition('sl.place_id=:place_id');
		//$placeBookingCriteria->params[':place_id']=$place->id;
		
		//场地信息分页
        //$count = Teacher::model()->count($placeBookingCriteria);
        //$pager = new CPagination($count);
        //$pager->pageSize = 5;
        //$pager->applyLimit($placeBookingCriteria);
        $teachers = $this->getTeachers($place->id);
				
        $this->render('myPlace', array(
            'place' => $place,
			'teachers' => $teachers,
			'placeReview' => $placeReview,
			//是否通过审核
			'status' => $this->isStatus(),
			//'count' => $count,
			//'pager' => $pager
        ));
    }

    public function actionAddPlace()
    {
        $model = new Place;
		$imageList = $this->_gets->getPost( 'imageList' );
		$imageListSerialize = XUtils::imageListSerialize($imageList);

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
            $model->host_id = $this->_user['hostId'];
			$model->pic_other = $imageListSerialize['dataSerialize'];

            $file = XUpload::upload($_FILES['attach'], array('thumb' => true, 'thumbSize' => array(192, 470)));
			$adr = XUpload::upload($_FILES['pic_adr'], array('thumb' => true, 'thumbSize' => array(498, 364)));
	
            if (is_array($file)) {
                $model->pic = $file['paththumbname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }
			if (is_array($adr)) {
                $model->pic_adr = $adr['paththumbname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }
            if ($model->validate() && $model->save()) {
                $this->redirect(array('/host/default/myplace'));
            }
        }

        $this->render('addplace', array(
            'model' => $model,
			'imageList'=>$imageListSerialize['data']
        ));
    }

    public function actionUpdatePlace()
    {
        $model = Place::model()->findByPk($_GET['id']);
		$imageList = $this->_gets->getParam( 'imageList' );
        $imageListSerialize = XUtils::imageListSerialize($imageList);

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
			$model->pic_other = $imageListSerialize['dataSerialize'];

            $file = XUpload::upload($_FILES['attach'], array('thumb' => true, 'thumbSize' => array(192, 470)));
			$adr = XUpload::upload($_FILES['pic_adr'], array('thumb' => true, 'thumbSize' => array(498, 364)));
	
            if (is_array($file)) {
                $model->pic = $file['paththumbname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }
			if (is_array($adr)) {
                $model->pic_adr = $adr['paththumbname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }
			
            if ($model->validate() && $model->save()) {
                $this->redirect(array('/host/default/myplace'));
            }
        }
		
		if ( $imageList )
            $imageList =  $imageListSerialize['data'];
        elseif($model->pic_other)
            $imageList = unserialize($model->pic_other);
			
        $this->render('addplace', array('model' => $model,'imageList'=>$imageList));
    }

    public function actionInfo()
    {

        $model = HostUpdate::model()->findByPk($this->_user['hostId']);
	


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

		if (isset($_POST['HostUpdate'])) {
            $model->attributes = $_POST['HostUpdate'];

            $file = XUpload::upload($_FILES['attach'], array('thumb' => true, 'thumbSize' => array(300, 200)));

            if (is_array($file)) {
                $model->pic = $file['paththumbname'];
                @unlink($_POST['oAttach']);
                @unlink($_POST['oThumb']);
            }

            if ($model->validate() AND $model->save()) {
				$cookie = new CHttpCookie('userName', $model->name);
                Yii::app()->request->cookies['userName'] = $cookie;
				
                $this->redirect(array('/host/default/Info'));
            }
        }

        $this->render('info', array(
            'model' => $model,
        ));
    }

    public function actionPassword()
    {

        $model = new HostChangePassword;

        // ajax validator
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['HostChangePassword'])) {
            $model->attributes = $_POST['HostChangePassword'];
            if ($model->validate()) {
                $new_password = Host::model()->findbyPk($this->_user['hostId']);

                $new_password->password = $model->password;
                $new_password->verifyPassword = $model->password;
                $new_password->save();
                Yii::app()->user->setFlash('msg', '保存成功');
            }
        }

        $this->render('password', array('model' => $model));
    }


    public function actionBookprice()
    {
        $dates = Yii::app()->request->getParam('dates');
        $id = Yii::app()->request->getParam('place_id');

        foreach ($dates as $date) {
            $model = new PlaceBooking;
            $model->place_id = $id;
            $model->teacher_id = $this->_user['masterId'];
            $model->date = $date;
            $model->status = 1;
            $model->save();
        }

        die(CJSON::encode(array('status' => 'success')));
    }
	
	private function getTeachers($place_id)
    {
        $teachers = Yii::app()->db->createCommand()
            ->select('l.*, sl.*')
            ->from('seed_teacher l')
            ->leftjoin('seed_place_booking sl', 'l.id=sl.teacher_id')
            ->where('sl.place_id=:place_id', array(':place_id' => $place_id))
            ->queryAll();

        return $teachers;
    }
}

//end file