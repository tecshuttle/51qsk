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
    <td class="tb_title">用户名：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'user',array('size'=>50,'maxlength'=>50)); ?>
	</td>
  </tr>
	
	<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'hidden'=>'hidden')); ?>

  <tr>
    <td class="tb_title">真实姓名：</td>
  </tr>
  <tr >
    <td>
		<?php echo $form->textField($model,'name',array('size'=>10,'maxlength'=>10)); ?>
	</td>
  </tr>
  <tr>
    <td class="tb_title">性别：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->dropDownList($model, 'sex', array('1'=>'男','0'=>'女')); ?>
	</td>
  </tr>
  
   <tr>
    <td class="tb_title">手机：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
	</td>
  </tr>
  
  <tr>
    <td class="tb_title">邮箱：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->emailField($model,'email',array('size'=>20,'maxlength'=>20)); ?>
	</td>
  </tr>
  
  <tr>
    <td class="tb_title">收件地址：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'shipping_address',array('size'=>60,'maxlength'=>100)); ?>
	</td>
  </tr>
  
  <tr>
    <td class="tb_title">居住地址：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
	</td>
  </tr>
  
  <tr>
    <td class="tb_title">图片：</td>
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
  
   <tr>
    <td class="tb_title">point：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'point',array('size'=>60,'maxlength'=>255)); ?>
	</td>
  </tr>
  
   <tr>
    <td class="tb_title">审核状态：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->dropDownList($model, 'status', array('0'=>'未通过', '1'=>'已通过'))?>
	</td>
  </tr>
  
   <tr class="submit">
      <td > <input name="submit" type="submit" id="submit" value="提交" class="button" /></td>
   </tr>

   <?php echo $form->passwordField($model, 'verifyPassword', array('id' => 'inputRepeatPassword', 'hidden'=>'hidden')); ?>

  
</table>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
	$(document).ready(function(){
		var repeatPassword = $("#Student_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	});
	
	$("#Student_password").blur(function(){ 
		var repeatPassword = $("#Student_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	}); 
});
</script>
<?php $form=$this->endWidget(); ?>
