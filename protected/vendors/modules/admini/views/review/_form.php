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
		<td class="tb_title">评论内容：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textArea($model,'contents',array('rows'=>6, 'cols'=>50));  ?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">评论学员：</td>
    </tr>
    <tr >
		<td >
		<?php
			$review = Review::model()->findByPk($model->id);
			$students = $review->students;
			?>
		<?php echo $students->name;//$form->textField($model,'student_id',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); 
		?>
		</td>
	</tr>
	
	<tr>
		<td class="tb_title">被评论导师：</td>
    </tr>
    <tr >
		<td >
		<?php 
			$review = Review::model()->findByPk($model->id);
			$teachers = $review->teachers;
			 
	  ?>
		<?php echo $teachers->name; //$form->textField($model,'teacher_id',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); 
		?>
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
</script>
<?php $form=$this->endWidget(); ?>
