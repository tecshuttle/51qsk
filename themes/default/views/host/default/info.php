<section class="admin-content pull-right match-item">
	<!--注意|H3有些小图标不一样-->
	<h3>
		<i class="fa fa-info-circle">
		</i>企业信息
	</h3>
	<h4><div class="text-danger"><?php echo Yii::app()->user->getFlash('success');?></div></h4>
	<?php if(Yii::app()->user->hasFlash('msg')){
	?>
	<div class="flash-success">
		<?php echo Yii::app() -> user -> getFlash('msg'); ?>
	</div>
	<?php } ?>
	<div class="admin-top-bar admin-form admin-info">
		<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'place-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'), ));
		?>
		<form class="form-horizontal">
		<!--星号为必填项-->
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
				<label for="head_portrait" class="col-xs-2 control-label"><span style="color:red">*</span>头像上传：</label>
					<div class="col-xs-6">
						<input name="head_portrait" type="file" id="head_portrait" class="filestyle" data-buttonText="上传"/>
						<?php if ($model->head_portrait): ?>
							<a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->head_portrait ?>" target="_blank">
								<img src="<?php echo $this->_baseUrl . '/' . $model->head_portrait ?>" width="100" align="absmiddle"/>
							</a>
						<?php endif ?>
						<p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
							echo $conf['upload_max_size'] ?>K,格式限为jpg，bmp的图片<br/>(此处需上传企业经营许可营业执照等)</p>
						<?php echo $form->error($model, 'head_portrait'); ?>
					</div>
			</div>
			<div class="form-group">
				<label for="HostUpdate_business_name" class="col-xs-2 control-label"><span style="color:red">*</span>企业名称：</label>
				<div class="col-xs-6">
					<?php echo $form -> textField($model, 'business_name', array('class' => 'form-control')); ?>
					<?php echo $form -> error($model, 'business_name'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="HostUpdate_address" class="col-xs-2 control-label"><span style="color:red">*</span>详细地址：</label>
				<div class="col-xs-6">
					<?php echo $form -> textField($model, 'address', array('class' => 'form-control')); ?>
					<?php echo $form -> error($model, 'address'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="HostUpdate_name" class="col-xs-2 control-label"><span style="color:red">*</span>主理人姓名：</label>
				<div class="col-xs-6">
					<?php echo $form -> textField($model, 'name', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
					<?php echo $form -> error($model, 'name'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="HostUpdate_phone" class="col-xs-2 control-label">手机号：</label>
				<div class="col-xs-6">
				    <?php echo $form -> textField($model, 'phone', array('class' => 'form-control', 'id' => 'inputPhone','readonly'=>'readonly','value'=>$model->user)); ?>
					<?php echo $form -> error($model, 'phone'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="HostUpdate_email" class="col-xs-2 control-label"><span style="color:red">*</span>邮箱地址：</label>
				<div class="col-xs-6">
					<?php echo $form -> emailField($model, 'email', array('class' => 'form-control')); ?>
					<?php echo $form -> error($model, 'email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="attach" class="col-xs-2 control-label"><span style="color:red">*</span>企业认证：</label>
					<div class="col-xs-6">
						<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="上传"/>
						<?php if ($model->pic): ?>
							<a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
								<img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle"/>
							</a>
						<?php endif ?>
						<p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
							echo $conf['upload_max_size'] ?>K,格式限为jpg，bmp的图片<br/>(此处需上传企业经营许可营业执照等)</p>
						<?php echo $form->error($model, 'pic'); ?>
					</div>
			</div>
			<div class="form-group">
				<div class="col-xs-offset-2 col-xs-9">
					<button type="submit" class="btn btn-red btn-sm btn-lger-padding">
						确认提交
					</button>
				</div>
			</div>
		</form>
	</div>
	<?php $this -> endWidget(); ?>
	<!--/.Admin-form END-->
</section>

<!--占位符扩展-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
