<section class="admin-content pull-right match-item">

							<!--注意|H3有些小图标不一样-->
							<h3><i class="fa fa-pencil-square-o"></i>修改密码</h3>
							<?php if(Yii::app()->user->hasFlash('msg')){ ?>

                            <div class="flash-success">
	                           <?php echo Yii::app()->user->getFlash('msg'); ?>
                            </div>

                            <?php } ?>
                            <div class="admin-top-bar admin-form">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
            'id' => 'place-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal'),
        ));
        ?>

									<div class="form-group">
										<label for="inputOldPassword" class="col-xs-2 control-label">原密码：</label>
										<div class="col-xs-6">
											 <?php echo $form->passwordField($teacherModel, 'oldPassword', array('class' => 'form-control', 'id' => 'inputOldPassword')); ?>
											 <?php echo $form->error($teacherModel, 'oldPassword');?>

										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword" class="col-xs-2 control-label">新密码：</label>
										<div class="col-xs-6">
											 <?php echo $form->passwordField($teacherModel, 'password', array('class' => 'form-control', 'id' => 'inputPassword')); ?>
											 <?php echo $form->error($teacherModel, 'password'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="inputRepeatPassword" class="col-xs-2 control-label">重复新密码：</label>
										<div class="col-xs-6">
											<?php echo $form->passwordField($teacherModel, 'verifyPassword', array('class' => 'form-control', 'id' => 'inputRepeatPassword')); ?>
											<?php echo $form->error($teacherModel, 'verifyPassword'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-offset-2 col-xs-9">
											<button type="submit" class="btn btn-red btn-sm btn-lger-padding">提交</button>
										</div>
									</div>

								<?php $this->endWidget(); ?>

							</div>
							<!--/.Admin-form END-->

						</section>
						<!--/.Admin-content END-->