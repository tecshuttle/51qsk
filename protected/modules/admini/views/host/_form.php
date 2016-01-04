<?php if (CHtml::errorSummary($model)):?>

<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message">
       <?php echo CHtml::errorSummary($model); ?>
        </span></div></td>
  </tr>
</table>
<?php endif?>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype' => 'multipart/form-data'))); ?>
<table class="form_table">
	<tr>
		<td class="tb_title">企业名称：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'business_name',array('size'=>50,'maxlength'=>50)); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">真实姓名：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'name',array('size'=>10,'maxlength'=>10)); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">联系方式：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>50)); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">邮箱：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->emailField($model,'email'); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">地址：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>50)); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">审核状态：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->dropDownList($model,'status',array('0'=>'未通过','1'=>'通过')); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">企业认证：</td>
    </tr>
    <tr >
		<td >
		<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->pic): ?>
                    <a href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle"/>
                    </a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,格式限为jpg，bmp</p>
		</td>
	</tr>
		
	<tr class="submit">
      <td > <input name="submit" type="submit" id="submit" value="提交" class="button" /></td>
   </tr>
</table>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});

// $(function(){
	// $("#xform").validationEngine();	
	// $(document).ready(function(){
		// var repeatPassword = $("#Host_password").attr("value");
		// $("#inputRepeatPassword").val(repeatPassword);
	// });
	
	// $("#Host_password").blur(function(){ 
		// var repeatPassword = $("#Host_password").attr("value");
		// $("#inputRepeatPassword").val(repeatPassword);
	// }); 
// });
</script>
<?php $form=$this->endWidget(); ?>
