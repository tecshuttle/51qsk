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

	<tr>
		<td class="tb_title">真实姓名：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		</td>
	</tr>
		
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'hidden'=>'hidden')); ?>
	
  <tr hidden="hidden">
    <td >
		<?php echo $form->textField($model, 'verifyPassword', array('id' => 'inputRepeatPassword')); ?>
	</td>
  </tr>
	
	<tr>
		<td class="tb_title">邮箱：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->emailField($model, 'email'); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">手机号：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">人气：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'popularity'); ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">从业经验：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->numberField($model,'experience',array('size'=>11,'maxlength'=>11)); ?>年
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">资格证：</td>
    </tr>
    <tr >
		<td >
		<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->degree): ?>
                    <a href="<?php echo $this->_baseUrl . '/' . $model->degree ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $model->degree ?>" width="100" align="absmiddle"/>
                    </a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,格式限为jpg，bmp</p>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">类别：</td>
    </tr>
    <tr >
		<td >
			<?php
                $catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));
                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('Teacher[catalog_id]', '', $cats,
                    array(
                        'empty' => '请选择所属类别',
                        'class' => 'form-control',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">好评值：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'review'); ?>
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
                    echo $conf['upload_max_size'] ?>K,请上传200*241规格，格式限为jpg，bmp</p>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">个人简介：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'profile',array('size'=>60,'maxlength'=>200)); ?>
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
	
    <tr hidden="hidden">
		<td >
		<?php echo $form->textField($model,'lesson_id',array('size'=>10,'maxlength'=>10)); ?>
		</td>
	</tr>

	<tr class="submit">
      <td > <input name="submit" type="submit" id="submit" value="提交" class="button" /></td>
   </tr>
</table>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
	
	$(document).ready(function(){
		var repeatPassword = $("#Teacher_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	});
	
	$("#Teacher_password").blur(function(){ 
		var repeatPassword = $("#Teacher_password").attr("value");
		$("#inputRepeatPassword").val(repeatPassword);
	}); 
});
</script>
<script type="text/javascript">
	
</script>
<?php $form=$this->endWidget(); ?>
