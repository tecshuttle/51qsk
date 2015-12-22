<section class="admin-content pull-right match-item">

    <h3><i class="fa fa-pencil-square-o"></i>修改密码</h3>
    <?php if (Yii::app()->user->hasFlash('msg')) { ?>

        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('msg'); ?>
        </div>

    <?php } ?>
    <div class="admin-top-bar admin-form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'place-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        ));
        ?>
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
            <label for="HostChangePassword_oldPassword" class="col-xs-2 control-label"><span style="color:red">*</span>原密码：</label>

            <div class="col-xs-6">
                <?php echo $form->passwordField($model, 'oldPassword', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'oldPassword'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="HostChangePassword_password" class="col-xs-2 control-label"><span style="color:red">*</span>新密码：</label>

            <div class="col-xs-6">
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="HostChangePassword_verifyPassword" class="col-xs-2 control-label"><span style="color:red">*</span>重复新密码：</label>

            <div class="col-xs-6">
                <?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'verifyPassword'); ?>
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