<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>场地管理</h3>
	<div class="searchArea">
		<ul class="action left">
			<li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span>添加</span></a></li>
		</ul>
	</div>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <thead>
      <tr class="tb_header">
        <th width="10%">ID</th>
        <th width="15%">活动名</th>
        <th width="8%">活动时间</th>
		<th width="8%">活动城市</th>
		<th width="8%">价格</th>
		<th width="15%">人数限制</th>
		<th width="5%">发布状态</th>
		<th width="8%">操作</th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>

      <td ><?php echo $row->name?></td>
      <td><?php echo $row->time?></td>
	  <td>
	  <?php 
									switch($row->city){
										case 1:
											echo '深圳';break;
										case 2:
											echo '广州';break;
										case 3:
											echo '上海';break;
										default:
											echo '北京';
									}
								?></td>
	  <td><?php echo $row->price?></td>
	  <td><?php echo $row->max_people?></td>
	  <td><?php 
									switch($row->status){
										case 1:
											echo '是';break;
										default:
											echo '否';
									}
								?></td>
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
