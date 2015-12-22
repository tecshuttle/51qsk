<section class="admin-content pull-right match-item">

    <h3><i class="fa fa-pencil-square-o"></i>修改密码</h3>

    <div class="admin-top-bar admin-form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'student-password',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal'),
            'action' => $this->createUrl('/student/password/pawd'),
        ));
        ?>
        <form class="form-horizontal">
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
                <label for="inputOldPassword" class="col-xs-2 control-label"><span style="color:red">*</span>原密码：</label>
                <div class="col-xs-6">
                    <?php echo $form->passwordField($studentModel, 'oldPassword', array('class' => 'form-control', 'id' => 'inputOldPassword')); ?><?php echo $form->error($studentModel, 'oldPassword'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-xs-2 control-label"><span style="color:red">*</span>新密码：</label>
                <div class="col-xs-6">
                    <?php echo $form->passwordField($studentModel, 'password', array('class' => 'form-control', 'id' => 'inputPassword')); ?><?php echo $form->error($studentModel, 'password'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRepeatPassword" class="col-xs-2 control-label"><span style="color:red">*</span>重复新密码：</label>
                <div class="col-xs-6">
                    <?php echo $form->passwordField($studentModel, 'verifyPassword', array('class' => 'form-control', 'id' => 'inputRepeatPassword')); ?><?php echo $form->error($studentModel, 'verifyPassword'); ?>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-9"><?php echo Yii::app()->user->getFlash('success'); ?></div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-9">
                    <button type="submit" class="btn btn-red btn-sm btn-lger-padding">提交</button>
                </div>
            </div>
        </form>
    <?php $this->endWidget(); ?>
    </div>
    <!--/.Admin-form END-->

</section>