<section class="admin-content pull-right match-item">

    <h3><i class="fa fa-pencil-square-o"></i>个人信息</h3>
	<h4><div class="form-group"><?php echo Yii::app()->user->getFlash('success').Yii::app()->user->getFlash('TSSuccess'); ?></div></h4>
    <div class="admin-top-bar admin-form admin-info admin-info-teacher">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')

        )); ?>
            <div class="form-group">
			<div class="col-xs-6 col-xs-offset-2">
				<p class="form-control-static">
					<span class="text-danger">
						<i class="fa fa-exclamation-circle"></i>
					</span>
					<span class="text-important">*</span>
					为必填项
				</p>
			</div>
		</div>
        <div class="form-group">
            <label for="TeacherUpdate_name" class="col-xs-2 control-label"><span style="color:red">*</span>讲师姓名：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="TeacherUpdate_phone" class="col-xs-2 control-label">手机号码：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'id' => 'inputPhone','readonly'=>'readonly','value'=>$model->user)); ?>
				<?php echo $form->error($model, 'phone'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="TeacherUpdate_email" class="col-xs-2 control-label">邮箱地址：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder'=>'接收我方提供的课程管理分析数据')); ?>
				<?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="TeacherUpdate_experience" class="col-xs-2 control-label">从业年限：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'experience', array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'experience'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="TeacherUpdate_degree" class="col-xs-2 control-label">资格证：</label>

            <div class="col-xs-6">

                <input name="degree" type="file" id="degree" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->degree): ?>
                    <a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->degree ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $model->degree ?>" width="100" align="absmiddle">
                    </a>
                <?php endif ?>

                <p class="help-block">格式限为jpg，bmp</p>
				<?php
					$degreeMessage = Yii::app()->user->getFlash('degreeMessage');
					if($degreeMessage != null){
							echo '<div class="errorMessage">'.$degreeMessage.'</div>';
					}?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputBest" class="col-xs-2 control-label"><span style="color:red">*</span>擅长领域：</label>

            <div class="col-xs-6">
                <?php
                $catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));

                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('TeacherUpdate[catalog_id]', '', $cats,
                    array(
                        'empty' => '请选择擅长领域',
                        'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择擅长领域',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
                <?php echo $form->error($model, 'catalog_id'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="attach" class="col-xs-2 control-label"><span style="color:red">*</span>讲师头像：</label>

            <div class="col-xs-6">

                <input name="attach" type="file" id="123" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->pic): ?>
                    <a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle">
                    </a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,<br/>请上传200*241规格，格式限为jpg，bmp的图片</p>
				<?php
					$picMessage = Yii::app()->user->getFlash('picMessage');
					if($picMessage != null){
							echo '<div class="errorMessage">'.$picMessage.'</div>';
					}?>
            </div>
        </div>

        <div class="form-group">
            <label for="TeacherUpdate_profile" class="col-xs-2 control-label"><span style="color:red">*</span>讲师介绍：</label>

            <div class="col-xs-10">
                <?php echo $form->textArea($model, 'profile', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写讲师介绍')); ?>
                <?php echo $form->error($model, 'profile'); ?>

            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-red btn-sm btn-lger-padding">保存</button>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>
    <!--/.Admin-form END-->

</section>
<!--/.Admin-content END-->

<!--文件上传扩展-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
