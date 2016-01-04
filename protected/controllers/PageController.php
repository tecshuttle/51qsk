<?php

class PageController extends XFrontBase
{
    /**
     * 浏览
     */
    public function actionShow($name)
    {
		$contactModel = new Contact;
        $title_alias = CHtml::encode(strip_tags($name));

        $bagecmsPageModel = Page::model()->find('title_alias=:titleAlias', array('titleAlias' => $title_alias));

        if (false == $bagecmsPageModel) {
            throw new CHttpException(404, '内容不存在');
        }

        $this->_seoTitle = empty($bagecmsPageModel->seo_title) ? $bagecmsPageModel->title . ' - ' . $this->_conf['site_name'] : $bagecmsPageModel->seo_title;

        $tpl = empty($bagecmsPageModel->template) ? 'show' : $bagecmsPageModel->template;
		
        if (isset($_POST['Contact'])) {
            $contactModel->attributes = $_POST['Contact'];

            if ($contactModel->validate() and $contactModel->save()) {
				Yii::app()->user->setFlash('success','提交成功！');
            }
        }

        $this->render($tpl, array('bagecmsPage' => $bagecmsPageModel, 'title_alias' => $title_alias, 'contactModel' => $contactModel));
    }

}

//end file
