<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>场地主管理</h3>
 
</div>
<table border="0" cellpadding="0" cellspacing="0" class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <thead>
      <tr class="tb_header">
        <th width="5%">ID</th>
        <th width="14%">企业名称</th>
        <th width="8%">主理人姓名</th>
		<th width="8%">联系方式</th>
		<th width="8%">邮箱</th>
		<th width="15%">地址</th>
		<th width="5%">审核状态</th>
		<th width="10%">操作</th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>

      <td ><?php echo $row->business_name?></td>
      <td><?php echo $row->name?></td>
	  <td><?php echo $row->phone?></td>
	  <td><?php echo $row->email?></td>
	  <td><?php echo $row->address?></td>
	  <td><?php 
									switch($row->status){
										case 1:
											echo '是';break;
										default:
											echo '否';
									}
								?>
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
