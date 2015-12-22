<section class="admin-content pull-right match-item">
	<!--注意|H3有些小图标不一样-->
	<h3>
		<i class="fa fa-pencil-square-o">
		</i>我的著作
	</h3>
	<div class="admin-top-bar admin-form">
		<?php $form = $this -> beginWidget('CActiveForm', array('enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'))); ?>
		<div class="form-group">
			<label for="Book_name" class="col-xs-2 control-label">著作名称：</label>
			<div class="col-xs-6">
				<?php echo $form -> textField($model, 'name', array('size' => 10, 'maxlength' => 40, 'class' => 'form-control')); ?>
				<?php echo $form -> error($model, 'name'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="Book_year" class="col-xs-2 control-label">出版年份：</label>
			<div class="col-xs-6">
				<select id="inputDatetime" class="form-control selectpicker show-menu-arrow" data-size="12" title="请选择出版年份">
					<option>2000</option>
					<option>2001</option>
                    <option>2010</option>
					<option>2015</option>
				</select>
				<?php echo $form -> textField($model, 'year', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
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
				<p class="help-block">
					大小勿超过5M,格式限为jpg，bmp
				</p>
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
<!--下拉选择UI|占位符扩展|图片上传扩展-->
<link rel="stylesheet" type="text/css" href="<?= $this -> _theme -> baseUrl; ?>/assets/css/bootstrap-select.min.css" media="screen">
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/bootstrap-select.min.js"></script>
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/bootstrap-select-zh-cn.js"></script>
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/jquery.placeholders.min.js"></script>
