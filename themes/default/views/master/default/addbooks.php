<section class="admin-content pull-right match-item">
	<h3>
		<i class="fa fa-pencil-square-o">
		</i>我的著作
	</h3>
	<div class="admin-top-bar admin-form">
		<?php $form = $this -> beginWidget('CActiveForm', array('enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'))); ?>
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
			<label for="Book_name" class="col-xs-2 control-label"><span style="color:red">*</span>著作名称：</label>
			<div class="col-xs-6">
				<?php echo $form -> textField($model, 'name', array('size' => 10, 'maxlength' => 40, 'class' => 'form-control')); ?>
				<?php echo $form -> error($model, 'name'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="Book_year" class="col-xs-2 control-label"><span style="color:red">*</span>出版年份：</label>
			<div class="col-xs-6">
				<?php 
					for($i = 1980; $i <= 2020; $i++)
						$year[$i] = $i;
				?>
				<?php echo $form -> dropDownList($model, 'year', $year, array('size' => 10, 'maxlength' => 10, 'class' => 'form-control selectpicker show-menu-arrow')); ?>
				<?php echo $form -> error($model, 'year'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="attach" class="col-xs-2 control-label">著作封面：</label>
			<div class="col-xs-6">
				<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="上传封面"/>
				<?php if ($model->pic):
				?>
				<a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
					<img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle">
				</a>
				<?php endif ?>
				<p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,<br/>请上传141*202规格，格式限为jpg，bmp的图片</p>
				<?php echo $form -> error($model, 'pic'); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-9">
				<button type="submit" class="btn btn-red btn-sm btn-lger-padding">
					确认提交
				</button>
			</div>
		</div>
	</div>
	<?php $this -> endWidget(); ?>
	<!--/.Admin-form END-->
</section>
<!--/.Admin-content END-->

<!--图片上传扩展-->
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>

