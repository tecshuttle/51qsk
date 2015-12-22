<?php
/**
 * 内容管理
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class BookController extends XAdminiBase
{
    /**
     * 首页
     *
     */
    public function actionIndex() {

        parent::_acl();
        $model = new Book();
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.id ASC';
        //$criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        //$pageParams = XUtils::buildCondition( $_GET, array ( 'title' , 'catalogId','titleAlias' ) );
        //$pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
		
        $this->render( 'book_index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 录入
     *
     */
    /* public function actionCreate() {
        parent::_acl();
        $model = new Book();
      
        if ( isset( $_POST['Book'] ) ) {
            $acl = $this->_gets->getPost( 'acl' );
            $model->attributes = $_POST['Book'];

            if ($model->save() ) {
                AdminLogger::_create( array ( 'catalog' => 'create' , 'intro' => '录入内容,ID:' . $model->id ) ); 
                $this->redirect( array ( 'index' ) );
            }
        }
        $this->render( 'book_create', array ( 'model' => $model) );
    }*/

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {
        parent::_acl();
        $model = parent::_dataLoad( new Book(), $id );
        
        if ( isset( $_POST['Book'] ) ) {
			$acl = $this->_gets->getPost( 'acl' );
            $model->attributes = $_POST['Book'];
            if ($model->validate()) {

                $file = XUpload::upload($_FILES['attach']);

                if (is_array($file)) {
                    $model->pic = $file['pathname'];
                    @unlink($_POST['oAttach']);
                    @unlink($_POST['oThumb']);
                }
            if ( $model->save() ) {
                AdminLogger::_create( array ( 'catalog' => 'update' , 'intro' => '编辑内容,ID:' . $id ) ); 
                $this->redirect( array ( 'index' ) );
            }
        }
        }
       
        $this->render( 'book_update', array ( 'model' => $model) );

    }

    /**
     * 批量操作
     *
     */
	 
    public function actionBatch() {
        if ( XUtils::method() == 'GET' ) {
            $command = trim( $_GET['command'] );
            $ids = intval( $_GET['id'] );
        } elseif ( XUtils::method() == 'POST' ) {
            $command = trim( $_POST['command'] );
            $ids = $_POST['id'];
            is_array( $ids ) && $ids = implode( ',', $ids );
        } else {
            XUtils::message( 'errorBack', '只支持POST,GET数据' );
        }
        empty( $ids ) && XUtils::message( 'error', '未选择记录' );

         switch ( $command ) {
        case 'delete':
            parent::_acl( 'book_delete' );
            AdminLogger::_create( array ( 'catalog' => 'delete' , 'intro' => '删除内容，ID:' . $ids ) ); 
            parent::_delete( new Book(), $ids, array ( 'index' ));
            break;
        default:
            throw new CHttpException(404, '错误的操作类型:' . $command);
            break;
        }
    }
}
