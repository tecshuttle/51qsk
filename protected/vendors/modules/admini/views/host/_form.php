<?php if (CHtml::errorSummary($model)):?>

<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message">
       <?php echo CHtml::errorSummary($model); ?>
        </span></div></td>
  </tr>
</table>
<?php endif?>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform'))); ?>
<table class="form_table">
	<tr>
		<td class="tb_title">用户名：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'user',array('size'=>50,'maxlength'=>50)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">密码：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
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
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
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
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
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
	
	<?php echo $form->passwordField($model, 'verifyPassword', array('id' => 'inputRepeatPassword', 'hidden'=>'hidden')); ?>

	<tr class="submit">
      <td > <input name="submit" type="submit" id="submit" value="提交" class="button" /></td>
   </tr>
</table>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});

$(function(){
	$("#xform").validationEngine();	
	$(document).ready(function(){
		var repeatPassword = $("#Host_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	});
	
	$("#Host_password").blur(function(){ 
		var repeatPassword = $("#Host_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	}); 
});
</script>
<?php $form=$this->endWidget(); ?>
