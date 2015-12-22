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
    <td class="tb_title">活动名：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>25)); ?>
	</td>
  </tr>
  <tr>
    <td class="tb_title">活动时间：</td>
  </tr>
  <tr >
    <td>
		<?php echo $form->textField($model,'time',array('size'=>25,'maxlength'=>25)); ?>
	</td>
  </tr>
    <td class="tb_title">活动城市：</td>
  </tr>
  <tr >
    <td >
	<?php echo $form->dropDownList($model,'city',array('1'=>'深圳','2'=>'广州','3'=>'上海','4'=>'北京')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">详细地址：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'address',array('size'=>25,'maxlength'=>25)); ?>
	</td>
  </tr>
  <tr>
    <td class="tb_title">价格：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">人数限制：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'max_people',array('size'=>10,'maxlength'=>10)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">主办方：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'sponsor',array('size'=>60,'maxlength'=>255)); ?>
  </tr>
   <tr>
    <td class="tb_title">活动介绍图：</td>
  </tr>
  <tr >
    <td >
		<div>
        <p><a href="javascript:uploadifyAction('fileListWarp')" ><img src="<?php echo $this->_baseUrl?>/static/admin/images/create.gif" align="absmiddle">添加图片</a></p>
        <ul id="fileListWarp">
          <?php 
			$imageList = unserialize($model->pic_other);
			foreach((array)$imageList as $key=>$row):?>
          <?php if($row):?>
          <li id="image_<?php echo $row['fileId']?>"><a href="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" target="_blank"><img src="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" width="40" height="40" align="absmiddle"></a>&nbsp;<br>
            <a href='javascript:uploadifyRemove("<?php echo $row['fileId']?>", "image_")'>删除</a>
            <input name="imageList[fileId][]" type="hidden" value="<?php echo $row['fileId']?>">
            <input name="imageList[file][]" type="hidden" value="<?php echo $row['file']?>">
          </li>
          <?php endif?>
          <?php endforeach?>
        </ul>
      </div></td>
  </tr>
   <tr>
    <td class="tb_title">活动介绍：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->textField($model,'profile',array('size'=>60,'maxlength'=>255)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">是否发布：</td>
  </tr>
  <tr >
    <td >
		<?php echo $form->dropDownList($model,'status',array('0'=>'未通过','1'=>'通过')); ?></td>
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
<script>
function uploadifyAction(fileField,frameId) {
    $.Zebra_Dialog('', {
        source: {
            'iframe': {
                'src': '<?php echo $this->createUrl('uploadify/basic')?>',
                'height': 300,
                'name': 'host_place',
                'id': 'host_place'
            }
        },
        width: 600,
        'buttons': [
			{
				caption: '确认',
				callback: function() {
					var htmls = $(window.frames['host_place'].document).find("#fileListWarp").html();
					if(htmls){
						$("#" + fileField).append(htmls);
					}else{
						 alert('没有文件被选择');
					}
				}
			},

			{
				caption: '取消',
				callback: function() {
					return;
				}
			}
		],

        'type': false,
        'title': '附件上传',
        'modal': false
    });
}
</script>

<script type="text/javascript">
function uploadifyRemove(fileId,attrName){
	if(confirm('本操作不可恢复，确定继续？')){
		$.post("<?php echo $this->createUrl('uploadify/remove')?>",{imageId:fileId},function(res){
			$("#"+attrName+fileId).remove();
		},'json');
	}
}
</script>
<?php $form=$this->endWidget(); ?>
