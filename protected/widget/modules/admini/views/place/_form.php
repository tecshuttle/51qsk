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
    <td class="tb_title">场地类型：</td>
  </tr>
  <tr >
    <td >
		<?php
                $catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));
                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('Place[catalog_id]', '', $cats,
                    array(
                        'empty' => '请选择所属类别',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
				
	</td>
  </tr>
  <tr>
    <td class="tb_title">所属场地主：</td>
  </tr>
  <tr >
    <td>
		<?php
			echo $model->hosts->name;
		?>
	</td>
  </tr>
    <td class="tb_title">场地名称：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?></td>
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
    <td class="tb_title">简介：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>255)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">详情：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'intro',array('rows'=>6, 'cols'=>50)); ?></td>
  </tr>
   <tr>
    <td class="tb_title">性别限制：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'sex',array('0'=>'男','1'=>'女','2'=>'不限')); ?></td>
  </tr>
   <tr>
    <td class="tb_title">是否供餐：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'food',array('0'=>'否','1'=>'是')); ?></td>
  </tr
  <tr>
    <td class="tb_title">价格：</td>
  </tr>
  <tr >
    <td >￥<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">服务：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'service',array('size'=>20,'maxlength'=>20)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">可容纳人数：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'people',array('size'=>11,'maxlength'=>11)); ?>人</td>
  </tr>
  <tr>
    <td class="tb_title">面积：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'space',array('size'=>20,'maxlength'=>20)); ?>m²</td>
  </tr>
  <tr>
    <td class="tb_title">地址：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">主页图片：</td>
  </tr>
  <tr >
    <td >
		<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->pic): ?>
                    <a href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
                    	<img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle">
                    	</a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,规格限为192*470,格式限为jpg，bmp</p>
                <?php echo $form->error($model, 'pic'); ?>
	</td>
  </tr>
  <tr>
    <td class="tb_title">场地主图：</td>
  </tr>
  <tr><td>
		<input name="pic_adr" type="file" id="pic_adr" class="filestyle" data-buttonText="选择图片"/>
                <?php if ($model->pic_adr): ?>
                    <a class="attach-preview"  href="<?php echo $this->_baseUrl . '/' . $model->pic_adr ?>" target="_blank">
                    	<img src="<?php echo $this->_baseUrl . '/' . $model->pic_adr ?>" width="100" align="absmiddle">
                    	</a>
                <?php endif ?>
                <p class="help-block">大小勿超过<?php $conf = Config::get('', 'base');
                    echo $conf['upload_max_size'] ?>K,规格限为498*364,格式限为jpg，bmp</p>
                <?php echo $form->error($model, 'pic_adr'); ?>
  </td></tr>
  
  <tr>
    <td class="tb_title">审核状态：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('0'=>'未通过','1'=>'通过')); ?></td>
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
