<section class="admin-content pull-right match-item" style="height: 667px;">

							<h3><i class="fa fa-list-ul"></i>场地评分</h3>

							<div class="admin-comment">

								<header>
									<figure class="media">
										<a class="media-left" href="<?= $this->createUrl('/place/view', array('id' => $place['id'])) ?>">
											<img class="media-object" src="<?= $place['pic_adr'] ?>">
										</a>
										<figcaption class="media-body">
											<h4><?= $place->name?></h4>
											<p>场地主：
												<?= $host->name;?>
											</p>
											<?php $complex = ($model->service + $model->feel + $model->equipment + $model->traffic)/4*2?>
											<p><input type="text" value="<?php echo round($complex)/2;?>" class="form-control rating" readonly="readonly"></p>
										</figcaption>
									</figure>
								</header>

								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'place-review-form',
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
												<label class="col-xs-4 control-label">交通便利：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'traffic', array('class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'traffic'); ?>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">设施齐全：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'equipment', array('class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'equipment'); ?>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">美观舒适：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'feel', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'feel'); ?>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-4 control-label">服务质量：</label>
												<div class="col-xs-8">
													<?php echo $form->textField($model, 'service', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control rating')); ?>
													<?php echo $form->error($model, 'service'); ?>
												</div>
											</div>
										</div>

									</div>

									<div class="form-group">
										<div class="col-xs-12">
											<?php echo $form->textarea($model, 'comment', array('size'=>60, 'maxlength'=>500, 'class' => 'form-control', 'placeholder' => '写给场地主的话')); ?>
											<?php echo $form->error($model, 'comment'); ?>
											<p class="form-control-static text-right">还可以输入500字</p>
										</div>

									</div>

									<div class="form-group">
										<div class="col-xs-offset-8 col-xs-4">
											<button type="submit" class="btn btn-red btn-normer btn-lger-padding pull-right">
												<?= $message == false ? '提交评论' : '保存成功'?>
											</button>
										</div>

									</div>

								<?php $this->endWidget(); ?>

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