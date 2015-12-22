<section class="admin-content pull-right match-item">
	<h3>
		<i class="fa fa-pencil-square-o">
		</i>
		我的场地
	</h3>
	<div class="admin-top-bar admin-form">
		<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'place-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
		)); ?>

		<!--星号为必填项-->
		<div class="form-group">
			<div class="col-xs-6 col-xs-offset-2">
				<p class="form-control-static">
					<span class="text-danger">
						<i class="fa fa-exclamation-circle"></i>
					</span>
					<span class="text-important">*</span>
					为必填项
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="Place_name" class="col-xs-2 control-label"><span style="color:red">*</span>场地名称：</label>
			<div class="col-xs-6">
				<?php echo $form->textField($model, 'name', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'name'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="Place_catalog_id" class="col-xs-2 control-label">所属类别：</label>
			<div class="col-xs-6">
				<?php
				$catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));
				$cats = CHtml::listData($catalogs, "id", "catalog_name");
				echo CHtml::dropDownList('Place[catalog_id]', '', $cats,
				array(
				'class' => 'form-control selectpicker show-menu-arrow',
				'data-size' => '12',
				'title' => '请选择所属类别',
				'options' => array($model->catalog_id => array('selected' => true)),
				));
				?>
				<?php echo $form->error($model, 'catalog_id'); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-2 control-label">所在城市：</label>
			<div class="col-xs-6">
				<?php
				$state_data = Area::model()->findAll("grade=:grade", array(":grade" => 1));
                $state = CHtml::listData($state_data, "area_id", "name");

                $s_default = ($model->state == 0 OR $model->state == '') ? '' : $model->state;
                echo CHtml::dropDownList('Place[state]', $s_default, $state,
                    array(
                        'empty' => '请选择省份',
						'class' => 'form-control',
                        'data-size' => '12',
                        'title' => '请选择省份',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => '?r=host/DeliveryAddress/dynamiccities',
                            'update' => '#Place_city', //selector to update
                            'data' => 'js:"AddressResult_state="+jQuery(this).val()'
                        )
                    )
                );

                //empty since it will be filled by the other dropdown
                $c_default = ($model->city == 0 OR $model->city == '') ? '' : $model->city;
                if ($model->name != '') {
                    $city_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->state));

                    $city = CHtml::listData($city_data, "area_id", "name");
                }
                $city_update = $model->name == '' ? array() : $city;

                echo '&nbsp;&nbsp;';

                echo CHtml::dropDownList('Place[city]', $c_default, $city_update,
                    array(
                        'empty' => '请选择城市',
						'class' => 'form-control',
                        'data-size' => '12',
                        'title' => '请选择城市',
                        'ajax' => array(
                            'type' => 'POST', //request type
                            'url' => '?r=host/DeliveryAddress/dynamicdistrict', //url to call
                            'update' => '#Place_district', //selector to update
                            'data' => 'js:"AddressResult_city="+jQuery(this).val()'
                        )
                    )
                );


                $d_default = ($model->district == 0 OR $model->district == '') ? '' : $model->district;
                if ($model->name != '') {
                    $district_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->city));
                    $district = CHtml::listData($district_data, "area_id", "name");
                }

                $district_update = $model->name == '' ? array() : $district;
                echo '&nbsp;&nbsp;';
                echo CHtml::dropDownList('Place[district]', $d_default, $district_update,
                    array(
                        'empty' => '请选择地区',
						'class' => 'form-control',
                        'data-size' => '12',
                        'title' => '请选择地区',
                    )
                );

				?>
			</div>
		</div>
		<div class="form-group">
			<label for="Place_address" class="col-xs-2 control-label"><span style="color:red">*</span>详细地址：</label>
			<div class="col-xs-6">
				<?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'address'); ?>
			</div>
		</div>
		<div class="form-group has-feedback">
			<label for="Place_space" class="col-xs-2 control-label"><span style="color:red">*</span>面积：</label>
			<div class="col-xs-6">
				<?php echo $form->textField($model, 'space', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'space'); ?>
				<span class="form-control-feedback" aria-hidden="true">平方</span>
			</div>
		</div>
		<div class="form-group has-feedback">
			<label for="Place_people" class="col-xs-2 control-label"><span style="color:red">*</span>容纳人数：</label>
			<div class="col-xs-6">
				<?php echo $form->textField($model, 'people', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'people'); ?>
				<span class="form-control-feedback" aria-hidden="true">人</span>
			</div>
		</div>
		<div class="form-group has-feedback">
			<label for="Place_price" class="col-xs-2 control-label"><span style="color:red">*</span>日租价格：</label>
			<div class="col-xs-6">
				<?php echo $form->textField($model, 'price', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
				<span class="form-control-feedback" aria-hidden="true">元</span>
				<?php echo $form->error($model, 'price'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="attach" class="col-xs-2 control-label">场地主页图：</label>
			<div class="col-xs-6">
				<input name="attach" type="file" id="attach" class="filestyle" data-buttonText="选择图片"/>
				<?php if ($model->pic):
				?>
				<a class="attach-preview"  href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
					<img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle">
				</a>
				<?php endif
				?>
				<p class="help-block">
					大小勿超过<?php $conf = Config::get('', 'base');
					echo $conf['upload_max_size'] ?>K,规格限为192*470,格式限为jpg，bmp
				</p>
				<?php
						$picMessage = Yii::app()->user->getFlash('picMessage');
						if($picMessage != null){
								echo '<div class="errorMessage">'.$picMessage.'</div>';
						}?>
			</div>
		</div>
		<div class="form-group">
			<label for="pic_adr" class="col-xs-2 control-label">场地主图：</label>
			<div class="col-xs-6">
				<input name="pic_adr" type="file" id="pic_adr" class="filestyle" data-buttonText="选择图片"/>
				<?php if ($model->pic_adr):
				?>
				<a class="attach-preview"  href="<?php echo $this->_baseUrl . '/' . $model->pic_adr ?>" target="_blank">
					<img src="<?php echo $this->_baseUrl . '/' . $model->pic_adr ?>" width="100" align="absmiddle">
				</a>
				<?php endif
				?>
				<p class="help-block">
					大小勿超过<?php $conf = Config::get('', 'base');
					echo $conf['upload_max_size'] ?>K,规格限为498*364,格式限为jpg，bmp
				</p>
				<?php
						$picAdrMessage = Yii::app()->user->getFlash('picAdrMessage');
						if($picAdrMessage != null){
								echo '<div class="errorMessage">'.$picAdrMessage.'</div>';
						}?>
			</div>
		</div>
		<div class="form-group">
			<label for="pic_other" class="col-xs-2 control-label">场地介绍图：</label>
			<div class="col-xs-6">
				<p>
					<a class="uploadifyAction  btn btn-default" href="javascript:uploadifyAction('fileListWarp')" >
						<i class="fa fa-plus-circle">
						</i>&nbsp;添加图片
					</a>
				</p>
				<p class="help-block">为了更好地让大家了解场地情况，请务必上传规格为300*200以上，比例约为3:2的图片
				</p>
				<ul id="fileListWarp" class="clearfix list-unstyled fileListWarp">
					<?php foreach((array)$imageList as $key=>$row):
					?>
					<?php if($row):
					?>
					<li class="pull-left" id="image_<?php echo $row['fileId']?>">
						<a class="center-block" href="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" target="_blank">
							<img src="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" width="150" height="100">
						</a>
						<a class="icon-remove" href='javascript:uploadifyRemove("<?php echo $row['fileId']?>", "image_")'>
							<i class="fa fa-trash-o">
							</i>&nbsp;删除
						</a>
						<input name="imageList[fileId][]" type="hidden" value="<?php echo $row['fileId']?>">
						<input name="imageList[file][]" type="hidden" value="<?php echo $row['file']?>">
					</li>
					<?php endif
					?>
					<?php endforeach
					?>
				</ul>
			</div>
		</div>
		<div class="form-group">
			<label for="Place_summary" class="col-xs-2 control-label"><span style="color:red">*</span>场地简介：</label>
			<div class="col-xs-10">
				<?php echo $form->textArea($model, 'summary', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写场地简介')); ?>
				<?php echo $form->error($model, 'summary'); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-2 control-label">场地详细介绍：</label>
			<div class="col-xs-10">
				<?php echo $form->textArea($model, 'intro', array('rows' => 20, 'class' => 'form-control', 'placeholder' => '请认真填写场地详细介绍','class' => 'form-control')); ?>
				<?php $this->widget('application.widget.kindeditor.KindEditor', array('target' => array('#Place_intro' => array('uploadJson' => $this->createUrl('upload'))))); ?>
				<?php echo $form->error($model, 'intro'); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-9">
				<button type="submit" class="btn btn-red btn-sm btn-lger-padding">
					确认增加
				</button>
			</div>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</section>
<!--图片上传扩展-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_baseUrl?>/static/js/zebra_dialog/css/zebra_dialog.css">
<script src="<?php echo $this->_baseUrl?>/static/js/zebra_dialog/zebra_dialog.js"></script>
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