<section class="admin-content pull-right match-item">
    <h3><i class="fa fa-pencil-square-o"></i>个人信息</h3>
	<h4><div class="form-group"><?php echo Yii::app()->user->getFlash('success'); ?></div></h4>
    <div class="admin-top-bar admin-form admin-info">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
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
            <label for="inputPhone" class="col-xs-2 control-label">手机号：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($studentInfo, 'phone', array('class' => 'form-control', 'id' => 'inputPhone','readonly'=>'readonly','value'=>$studentInfo->user)); ?>
                <?php echo $form->error($studentInfo, 'phone'); ?>
            </div>
        </div>

		 <div class="form-group">
            <label for="inputNameCode" class="col-xs-2 control-label"><span style="color:red">*</span>真实姓名：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($studentInfo, 'name', array('class' => 'form-control', 'id' => 'inputNameCode','placeholder' => '请提交真实姓名用于上课时签到')); ?>
                <?php echo $form->error($studentInfo, 'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="ytStudent_sex" class="col-xs-2 control-label">性别：</label>

            <div class="col-xs-6">
                <label class="radio-inline">
                    <?php echo $form->radioButton($studentInfo, 'sex', array('value' => 0)) ?>
                    女
                </label>
                <label class="radio-inline">
                    <?php echo $form->radioButton($studentInfo, 'sex', array('value' => 1)) ?>
                    男
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCity" class="col-xs-2 control-label">地区：</label>

            <div class="col-xs-6">

                <!--
                <select id="inputCity" class="form-control selectpicker show-menu-arrow" data-size="12" title="请选择您所在的地区">
                -->

                <!--第一种排序方式-->
                <!--
                <option>北京</option>
                <option>上海</option>
                <option>深圳</option>
                <option>广州</option>
                -->

                <!--设计说这里只有一级，没有三级联级-->
                <!--程序猿自行选择排序方式-->

                <!--第二种排序方式，省份作为节点-->
                <!--
                <optgroup label="广东省">
                    <option>深圳市</option>
                    <option>广州市</option>
                    <option>深圳市</option>
                    <option>广州市</option>
                </optgroup>

                <optgroup label="湖南省">
                    <option>长沙市</option>
                    <option>衡阳市</option>
                </optgroup>

            </select>
            -->
                <?php echo $form->dropDownList($studentInfo, 'address', array('1' => '北京', '2' => '上海', '3' => '深圳', '4' => '广州'), array('id' => 'inputCity', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择您所在的地区')); ?>
            </div>
        </div>


        <div class="form-group">
            <label for="Student_email" class="col-xs-2 control-label"><span style="color:red">*</span>邮箱：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($studentInfo, 'email', array('class' => 'form-control')); ?>
                <?php echo $form->error($studentInfo, 'email'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="attach" class="col-xs-2 control-label"><span style="color:red">*</span>头像：</label>

            <div class="col-xs-6">
                <input name="attach" type="file" id="attach" class="filestyle" data-buttonText="上传头像"/>
                <?php if ($studentInfo->pic): ?>
                    <a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $studentInfo->pic ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $studentInfo->pic ?>" width="100" align="absmiddle"/>
                    </a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,<br/>请上传430*320规格，格式限为jpg，bmp的图片</p>
                
				<?php
						$picMessage = Yii::app()->user->getFlash('picMessage');
						if($picMessage != null){
								echo '<div class="errorMessage">'.$picMessage.'</div>';
						}?>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress" class="col-xs-2 control-label"><span style="color:red">*</span>收件地址：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($studentInfo, 'shipping_address', array('class' => 'form-control', 'id' => 'inputAddress', 'placeholder' => '以便收取智慧刊物')); ?><?php echo $form->error($studentInfo, 'shipping_address'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-red btn-sm btn-lger-padding">保存</button>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>
    <!--/.Admin-form END-->

</section>
<!--/.Admin-content END-->

<!--图片上传扩展-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>