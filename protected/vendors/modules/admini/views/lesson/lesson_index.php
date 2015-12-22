<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>课程管理</h3>

</div>
<table border="0" cellpadding="0" cellspacing="0" class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <thead>
      <tr class="tb_header">
        <th width="5%">ID</th>
        <th width="8%">课程名</th>
        <th width="8%">所属类别</th>
		<th width="10%">价格</th>
		<th width="10%">开课时间</th>
		<th width="10%">下课时间</th>
		<th width="8%">所属导师</th>
		<th width="8%">城市</th>
		<th width="8%">最大学员数</th>
		<th width="5%">授课状态</th>	
		<th width="5%">审核状态</th>
		<th width="10%">操作</th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>

      <td ><?php echo $row->name?></td>
      <td><?php 
			$lesson = Lesson::model()->findByPk($row->id);
			$catalogs = $lesson->catalogs;
			echo $catalogs->catalog_name;
	  ?></td>
	  <td><?php echo $row->price?></td>
	  <td><?php echo $row->start_date_time?></td>
	  <td><?php echo $row->end_date_time?></td>
	  <td><?php
			$lesson = Lesson::model()->findByPk($row->id);
			$teachers = $lesson->teachers;
			echo $teachers->name;
	  ?></td>
	  <td>
		<?php
                $areas = Area::model()->findAllByAttributes(array('grade' => 2));
                $area = CHtml::listData($areas, "area_id", "name");
				
                print_r($area[$row->city]);
                ?>
	  </td>
	  <td><?php echo $row->max_students?></td>
	  <td><?php echo ($row->status == 1 ? '已授课' : '未授课')?></td>
	  <td>
		<select id="checkSelect_<?php echo $row->id?>" onchange="func()">
			<option value="0" <?php if($row->check_status == 0){ echo 'selected = "selected"';}?> >未通过</option>
			<option value="1" <?php if($row->check_status == 1){ echo 'selected = "selected"';}?> >已通过</option>
		</select>
	  </td>
      <td ><a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr class="operate">
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="delete">删除</option>
            
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>
<?php $this->renderPartial('/_include/footer');?>
