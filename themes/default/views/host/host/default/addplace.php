<section class="admin-content pull-right match-item">

    <!--注意|H3有些小图标不一样-->
    <h3><i class="fa fa-pencil-square-o"></i>我的场地</h3>

    <div class="admin-top-bar admin-form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'place-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        )); ?>

        <div class="form-group">
            <label for="Place_name" class="col-xs-2 control-label">场地名称：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'name', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Place_catalog_id" class="col-xs-2 control-label">所属类别：</label>

            <div class="col-xs-6">
                <?php
                $catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));
                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('Place[catalog_id]', '', $cats,
                    array(
                        'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择所属类别',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
                <?php echo $form->error($model, 'catalog_id'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label">所在城市：</label>

            <div class="col-xs-6">

				<?php
				$state_data = Area::model()->findAll("grade=:grade", array(":grade" => 1));
                $state = CHtml::listData($state_data, "area_id", "name");

                $s_default = ($model->state == 0 OR $model->state == '') ? '' : $model->state;
                echo CHtml::dropDownList('Place[state]', $s_default, $state,
                    array(
                        'empty' => '请选择省份',
						'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择省份',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => '?r=host/delivery_address/dynamiccities',
                            'update' => '#Place_city', //selector to update
                            'data' => 'js:"AddressResult_state="+jQuery(this).val()'
                        )
                    )
                );

                //empty since it will be filled by the other dropdown
                $c_default = ($model->city == 0 OR $model->city == '') ? '' : $model->city;
                if ($model->name != '') {
                    $city_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->state));
                    $city = CHtml::listData($city_data, "area_id", "name");
                }

                $city_update = $model->name == '' ? array() : $city;

                echo '&nbsp;&nbsp;';

                echo CHtml::dropDownList('Place[city]', $c_default, $city_update,
                    array(
                        'empty' => '请选择城市',
						'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择城市',
                        'ajax' => array(
                            'type' => 'POST', //request type
                            'url' => '?r=host/delivery_address/dynamicdistrict', //url to call
                            'update' => '#Place_district', //selector to update
                            'data' => 'js:"AddressResult_city="+jQuery(this).val()'
                        )
                    )
                );


                $d_default = ($model->district == 0 OR $model->district == '') ? '' : $model->district;
                if ($model->name != '') {
                    $district_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->city));
                    $district = CHtml::listData($district_data, "area_id", "name");
                }

                $district_update = $model->name == '' ? array() : $district;
                echo '&nbsp;&nbsp;';
                echo CHtml::dropDownList('Place[district]', $d_default, $district_update,
                    array(
                        'empty' => '请选择地区',
						'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择地区',
                    )
                );
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Place_address" class="col-xs-2 control-label">详细地址：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'address'); ?>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="Place_space" class="col-xs-2 control-label">面积：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'space', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'space'); ?>
                <span class="form-control-feedback" aria-hidden="true">平方</span>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="Place_people" class="col-xs-2 control-label">容纳人数：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'people', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'people'); ?>
                <span class="form-control-feedback" aria-hidden="true">人</span>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="Place_price" class="col-xs-2 control-label">日租价格：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'price', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                <span class="form-control-feedback" aria-hidden="true">元</span>
                <?php echo $form->error($model, 'price'); ?>
            </div>
        </div>

        <div class="form-group">
            <label id="attach" class="col-xs-2 control-label">场地主图：</label>

            <div class="col-xs-6">
                <input name="attach" type="file" id="attach" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->pic): ?>
                    <a class="attach-preview"  href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
                    	<img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle">
                    	</a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,格式限为jpg，bmp</p>
                <?php echo $form->error($model, 'pic'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Place_summary" class="col-xs-2 control-label">场地简介：</label>
            <div class="col-xs-10">
                <?php echo $form->textArea($model, 'summary', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写场地简介')); ?>
                <?php echo $form->error($model, 'summary'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label">场地详细介绍：</label>

            <div class="col-xs-10">
                <?php echo $form->textArea($model, 'intro', array('rows' => 20, 'class' => 'form-control', 'placeholder' => '请认真填写场地详细介绍','class' => 'form-control')); ?>
                <?php $this->widget('application.widget.kindeditor.KindEditor', array('target' => array('#Place_intro' => array('uploadJson' => $this->createUrl('upload'))))); ?>
                <?php echo $form->error($model, 'intro'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-red btn-sm btn-lger-padding">确认增加</button>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>

</section>

<!--下拉选择UI|图片上传扩展|占位符扩展-->
<link rel="stylesheet" type="text/css" href="<?= $this->_theme->baseUrl; ?>/assets/css/bootstrap-select.min.css" media="screen">
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-select.min.js"></script>
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-select-zh-cn.js"></script>
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/jquery.placeholders.min.js"></script>