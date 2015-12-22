<section class="admin-content pull-right match-item" style="height: 667px;">

							<h3><i class="fa fa-list-ul"></i>我的课程</h3>

							<div class="admin-comment">

								<header>
									<figure class="media">
										<a class="media-left" href="<?= $this->createUrl('/lesson/view', array('id' => $lesson['id'])) ?>">
											<img class="media-object" src="<?= $lesson['pic'] ?>">
										</a>
										<figcaption class="media-body">
											<h4><?= $lesson->name?></h4>
											<p>讲师：
											<?php $teacher = Teacher::model() -> findByPk($lesson['teacher_id']);

											echo $teacher->name;
												?>
											</p>
											<p>时间：<s><?= $lesson -> start_date_time . '&nbsp&nbsp至&nbsp&nbsp' . $lesson -> end_date_time ?></s></p>
											<p><input type="text" value="<?= $lesson['rank']?>" class="form-control rating" readonly="readonly"></p>
										</figcaption>
									</figure>
								</header>

								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'student-teacher-form',
									// Please note: When you enable ajax validation, make sure the corresponding
									// controller action is handling ajax validation correctly.
									// There is a call to performAjaxValidation() commented in generated controller code.
									// See class documentation of CActiveForm for details on this.
									'enableAjaxValidation'=>false,
									'htmlOptions' => array('class' => 'form-horizontal')
								)); ?>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">课程内容：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'detail', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'detail'); ?>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">讲师发挥：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'eduction', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'eduction'); ?>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">教学环境：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'environment', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'environment'); ?>
												</div>
											</div>
										</div>

									</div>

									<div class="form-group">
										<div class="col-xs-12">
											<?php echo $form->textarea($model, 'comment', array('rows'=>8, 'maxlength'=>500, 'class' => 'form-control', 'placeholder' => '写给场地主的话')); ?>
											<?php echo $form->error($model, 'comment'); ?>
											<!--<p class="form-control-static text-right">还可以输入500字</p>-->
										</div>

									</div>

									<div class="form-group">
										<div class="col-xs-offset-8 col-xs-4">
											<button type="submit" class="btn btn-red btn-normer btn-lger-padding pull-right">
												<?= $message == false ? '提交评论' : '保存成功'?>
											</button>
										</div>
									</div>

								<?php $this->endWidget();?>

							</div>
							<!--/.Admin-comment END-->

						</section>

<!--星级评分UI-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-star-rating.min.js"></script>
<script>
	$('.rating').rating({
	min: '0',
	max: '5',
	step: '0.5',
	size: 'xs',
	glyphicon: false,
	defaultCaption: '{rating} 分',
	starCaptions: {
		0.5: '0.5分',
			1: '1分',
			1.5: '1.5分',
			2: '2分',
			2.5: '2.5分',
			3: '3分',
			3.5: '3.5分',
			4: '4分',
			4.5: '4.5分',
			5: '5分'
	},
	clearCaption: '未评分',
    clearButtonTitle: '重新评价',
	hoverOnClear: false
});
</script>
