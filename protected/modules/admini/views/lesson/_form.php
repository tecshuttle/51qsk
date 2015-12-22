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
		<td class="tb_title">课程名：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'name',array('size'=>10,'maxlength'=>10)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">所属类别：</td>
    </tr>
    <tr >
		<td >
		<?php
				$catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));

                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('Lesson[catalog_id]', '', $cats,
                    array(
                        'empty' => '请选择课程分类',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">星级：</td>
    </tr>
    <tr >
		<td >
		<?php
			for($i = 0; $i <= 5; $i = $i + 0.5){
				$ranks["$i"] = $i;
			}

			echo $form->dropDownList($model,'rank',$ranks);
		?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">价格：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'price',array('size'=>50,'maxlength'=>50)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">实际报到人数：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'arrivals',array('size'=>11,'maxlength'=>11)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">开课时间：</td>
    </tr>
    <tr >
		<td >
			<?php echo $form->textField($model,'start_date_time'); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">下课时间</td>
    </tr>
    <tr >
		<td >
			<?php echo $form->textField($model,'end_date_time'); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">所属导师：</td>
    </tr>
    <tr >
		<td >
		<?php
			$lesson = Lesson::model()->findByPk($model->id);
			$teachers = $lesson->teachers;
			echo $teachers->name;
		?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">性别限制：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->dropDownList($model,'sex',array('0'=>'男','1'=>'女','2'=>'不限','3'=>'儿童')); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">供餐：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->dropDownList($model,'hasfood',array('2'=>'全部','1'=>'是','0'=>'否')); ?>
		</td>
	</tr>


	<tr>
		<td class="tb_title">城市：</td>
    </tr>
    <tr >
		<td >
        <?php echo $form->dropDownList($model, 'city', array('1' => '北京', '2' => '上海', '3' => '深圳', '4' => '广州')); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">课程概括：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>200)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">人气：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'hot'); ?>
		</td>
	</tr>
	<tr>
		<td class="tb_title">已报名学员：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'actual_students'); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">最大报名学员数：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'max_students',array('size'=>10,'maxlength'=>10)); ?>
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
		<td class="tb_title">课程详情：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->textField($model,'intro',array('size'=>60,'maxlength'=>500)); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">授课状态：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->dropDownList($model,'status',array('0'=>'未授课','1'=>'已授课')); ?>
		</td>
	</tr>

	<tr>
		<td class="tb_title">审核状态：</td>
    </tr>
    <tr >
		<td >
		<?php echo $form->dropDownList($model,'check_status',array('0'=>'未通过','1'=>'已通过')); ?>
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

<link rel="stylesheet" type="text/css"
	href="//cdn.bootcss.com/jquery-datetimepicker/2.4.5/jquery.datetimepicker.min.css" media="screen">
<script src="//cdn.bootcss.com/jquery-datetimepicker/2.4.5/jquery.datetimepicker.min.js"></script>
<script>
$('#Lesson_start_date_time').datetimepicker({
	lang:'zh',
});
$('#Lesson_end_date_time').datetimepicker({
	lang:'zh'
});
</script>


<?php $form=$this->endWidget(); ?>
