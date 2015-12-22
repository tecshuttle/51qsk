<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>学员管理</h3>
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
        <th width="5%">ID</th>
        <th width="10%">用户名</th>
        <th width="8%">真实姓名</th>
        <th width="10%">联系电话</th>
		<th width="10%">邮箱</th>
		<th width="3%">审核状态</th>
		<th width="8%">操作</th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td><input id = "inputId" type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td >
        <?php echo $row->user?></td>
      <td><?php echo $row->name?></td>
      <td><?php echo $row->phone?></td>
	  <td><?php echo $row->email?></td>
	  <td>
		<select id="checkSelect_<?php echo $row->id?>" onchange="func()">
			<option value="0" <?php if($row->status == 0){ echo 'selected = "selected"';}?> >未通过</option>
			<option value="1" <?php if($row->status == 1){ echo 'selected = "selected"';}?> >已通过</option>
		</select>
	  </td>
      <td >
	  <a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
	  <a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
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
            <option value="verify">显示</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

<script>
	function func(){
		var status = 0;
		var id = 0;
		
		id = $("#inputId").val();
		//alert(id);
		status = $("#checkSelect_" + id).find("option:selected").attr("value");
		
		alert(status);
		
		$.ajax({
                type: "GET", //访问WebService使用Post方式请求 
                contentType: "application/json",
                url: "register/getCardInfo", //调用WebService的地址和方法名称组合 ---- WsURL/方法名 
                data: {
					'id': id,
					'status':status,
				}, //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到 
                dataType: 'json', //WebService 会返回Json类型 
                success: function () { 
					alert('success');
				}//回调函数，result，返回值
	}
</script>
<?php $this->renderPartial('/_include/footer');?>
