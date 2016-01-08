<section class="admin-content pull-right match-item">

    <h3><i class="fa fa-pencil-square-o"></i>我的课程</h3>

    <div class="admin-top-bar admin-form">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'lesson-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
        )); ?>
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
            <label for="Lesson_name" class="col-xs-2 control-label"><span style="color:red">*</span>课程名称：</label>

            <div class="col-xs-6">
                <?php echo $form->textField($model, 'name', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="inlineTuitionFree" class="col-xs-2 control-label">学费：</label>

            <div class="col-xs-2">
                <label class="radio-inline">
                    <input id="inlineTuitionFree" type="radio" class="click-free" <?php echo $model->price == 0 ? 'checked="checked"' : '' ?> name="inlineTuition" value="free"> 公益
                </label>

            </div>

            <div class="col-xs-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <label class="input-group-control-label">
                            <input id="inlineTuitionToll" type="radio" <?php echo $model->price != 0 ? 'checked="checked"' : '' ?> class="click-subscription" name="inlineTuition" value="subscription">
                            收费
                        </label>
                    </span>

                    <!--默认添加禁用状态-->
                    <!--点击收费,输入框激活-->
                    <?php echo $form->textField($model, 'price', array('class' => 'form-control subscription', 'id' => 'textPrice')); ?>
                </div>
                <?php echo $form->error($model, 'price'); ?>
                <span class="form-control-feedback" aria-hidden="true">元</span>
            </div>

        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label"><span style="color:red">*</span>课程分类：</label>

            <div class="col-xs-6">
                <?php
                $catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));

                $cats = CHtml::listData($catalogs, "id", "catalog_name");

                echo CHtml::dropDownList('Lesson[catalog_id]', '', $cats,
                    array(
                        'empty' => '请选择课程分类',
                        'class' => 'form-control selectpicker show-menu-arrow',
                        'data-size' => '12',
                        'title' => '请选择课程分类',
                        'options' => array($model->catalog_id => array('selected' => true)),
                    ));
                ?>
                <?php echo $form->error($model, 'catalog_id'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Lesson_start_date_time" class="col-xs-2 control-label"><span style="color:red">*</span>开课日期：</label>

            <div class="col-xs-6">
                <div class="input-group cp-datetime">
                    <?php echo $form->textField($model, 'start_date_time', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'start_date_time'); ?>
                    <span class="input-group-addon">至</span>
                    <?php echo $form->textField($model, 'end_date_time', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'end_date_time'); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label"><span style="color:red">*</span>所在城市：</label>

            <div class="col-xs-6">
                 <?php echo $form->dropDownList($model, 'city', array('1' => '北京', '2' => '上海', '3' => '深圳', '4' => '广州'), array('id' => 'inputCity', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择您所在的地区')); ?>
                <?php echo $form->error($model, 'city'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPlace" class="col-xs-2 control-label">授课场地：</label>

            <div class="col-xs-6">

				<?php
					$placeBooking = PlaceBooking::model()->findAllByAttributes(array('teacher_id'=>$this->_user['masterId']));
					
					if($placeBooking == null){
						echo $form->textField($model, 'place_id', array('class' => 'form-control', 'placeholder' => '您暂未预定场地', 'value' => '', 'readonly' => 'readonly')); 
						echo $form->error($model, 'place_id'); 
					}else{
					
						foreach($placeBooking as $pbs){
							$place = Place::model()->findAllByAttributes(array('id' => $pbs->place_id));
							foreach($place as $ps){
								$value = (int)$ps->id;
								$text = $ps->name
								//.'('.$ps->stateArea -> name.
								//						$ps -> cityArea -> name.
								//							$ps->districtArea -> name.
								//								$ps->address.')'
								;
								$placeList[$value] = (String)$text;
							}
						}

						echo $form->dropDownList($model, 'place_id', $placeList, array('id' => 'inputPlace', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择您所预订的场地'));
						echo $form->error($model, 'place_id'); 
					}?>
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="inlineNumNon-exclusive" class="col-xs-2 control-label">人数上限：</label>

            <div class="col-xs-2">
                <label class="radio-inline">
                    <input <?php echo $model->max_students == '' ? 'checked="checked"' : '' ?> type="radio" class="click-non-exclusive" name="inlineNum" id="inlineNumNon-exclusive" value="non">
                    不限
                </label>
            </div>

            <div class="col-xs-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <label class="input-group-control-label">
                            <input <?php echo $model->max_students != '' ? 'checked="checked"' : '' ?> type="radio" class="click-limited" name="inlineNum" id="inlineNumLimited" value="limited">
                            限
                        </label>
                    </span>

                    <!--默认添加禁用状态-->
                    <!--点击限,输入框激活-->
                    <?php echo $form->textField($model, 'max_students', array('class' => 'form-control num', 'id' => 'textPeople')); ?>
                </div>
                <span class="form-control-feedback" aria-hidden="true">人</span>
                <?php echo $form->error($model, 'max_students'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Lesson_sex" class="col-xs-2 control-label">性别限制：</label>

            <div class="col-xs-6">
				<span id="Lesson_sex">
					<label class="radio-inline">
						<input <?php echo $model->sex == 2 ? 'checked="checked"' : '' ?>id="Lesson_sex_2" value="2" type="radio" name="Lesson[sex]">
						不限
					</label>
					<label class="radio-inline">
						<input <?php echo $model->sex == 1 ? 'checked="checked"' : '' ?>id="Lesson_sex_1" value="1" type="radio" name="Lesson[sex]">
						男
					</label>
					<label class="radio-inline">
						<input <?php echo $model->sex == 0 ? 'checked="checked"' : '' ?>id="Lesson_sex_0" value="0" type="radio" name="Lesson[sex]">
						女
					</label>
					<label class="radio-inline">
						<input <?php echo $model->sex == 3 ? 'checked="checked"' : '' ?>id="Lesson_sex_3" value="3" type="radio" name="Lesson[sex]">
						儿童
					</label>
				</span>
            </div>
        </div>

        <div class="form-group">
            <label for="Lesson_hasfood" class="col-xs-2 control-label">包含餐费：</label>

            <div class="col-xs-6">
				<span id="Lesson_hasfood">
					<label class="radio-inline">
						<input <?php echo $model->hasfood == 2 ? 'checked="checked"' : '' ?>id="Lesson_hasfood_2" value="2" type="radio" name="Lesson[hasfood]">
						部分
					</label>
					<label class="radio-inline">
						<input <?php echo $model->hasfood == 1 ? 'checked="checked"' : '' ?>id="Lesson_hasfood_1" value="1" type="radio" name="Lesson[hasfood]">
						是
					</label>
					<label class="radio-inline">
						<input <?php echo $model->hasfood == 0 ? 'checked="checked"' : '' ?>id="Lesson_hasfood_0" value="0" type="radio" name="Lesson[hasfood]">
						否
					</label>
				</span>
            </div>
        </div>

        <div class="form-group">
            <label for="attach" class="col-xs-2 control-label">课程封面：</label>

            <div class="col-xs-6">
                <input name="attach" type="file" id="attach" class="filestyle" data-buttonText="上传封面"/>
                <?php if ($model->pic): ?>
                    <a class="attach-preview" href="<?php echo $this->_baseUrl . '/' . $model->pic ?>" target="_blank">
                        <img src="<?php echo $this->_baseUrl . '/' . $model->pic ?>" width="100" align="absmiddle"/>
                    </a>
                <?php endif ?>
                <p class="help-block">
					大小勿超过<?php $conf = Config::get('', 'base');
					echo $conf['upload_max_size'] ?>K,规格限为428*320,格式限为jpg，bmp
				</p>
                <?php
						$picMessage = Yii::app()->user->getFlash('picMessage');
						if($picMessage != null){
								echo '<div class="errorMessage">'.$picMessage.'</div>';
						}?>
            </div>
        </div>

        <div class="form-group">
            <label for="Lesson_summary" class="col-xs-2 control-label"><span style="color:red">*</span>课程简介：</label>

            <div class="col-xs-10">
                <?php echo $form->textArea($model, 'summary', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写课程简介')); ?>
                <?php echo $form->error($model, 'summary'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label">课程详情：</label>

            <div class="col-xs-10">
                <?php echo $form->textArea($model, 'intro', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写课程详细介绍')); ?>
                <?php $this->widget('application.widget.kindeditor.KindEditor', array('target' => array('#Lesson_intro' => array('uploadJson' => $this->createUrl('upload'))))); ?>
                <?php echo $form->error($model, 'intro'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-red btn-sm btn-lger-padding">确认提交</button>
            </div>
        </div>


    </div>
    <?php $this->endWidget(); ?>
    <!--/.Admin-form END-->

</section>
<!--/.Admin-content END-->

<!--文件上传扩展|日期选择UI-->
<script src="<?= $this->_theme->baseUrl; ?>/assets/js/bootstrap-filestyle.min.js"></script>
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

<!--学费和人数上限切换-->
<script>
    $(".click-free").click(function () {
        $(".subscription").attr("readonly", "readonly"); //设置禁用状态
        $(".subscription:text").val(""); //清除文本框的值
    });
    $(".click-subscription").click(function () {
        $(".subscription").removeAttr("readonly"); //移除禁用属性
    });
    //学费切换 END

    $(".click-non-exclusive").click(function () {
        $(".num").attr("readonly", "readonly"); //设置禁用状态
        $(".num:text").val(""); //清除文本框的值
    });
    $(".click-limited").click(function () {
        $(".num").removeAttr("readonly"); //移除禁用属性
    });
    //人数上限切换 END

    $("#inlineTuitionFree").click(function () {
        var val = $('input:radio[name="inlineTuition"]:checked').val();
        if (val == 'free') {
            $("#textPrice").val(0);
        }
    });
    //学费切换

    $("#inlineNumNon-exclusive").click(function () {
        var val = $('input:radio[name="inlineNum"]:checked').val();
        if (val == 'non') {
            $("#textPeople").val(null);
        }
    });
</script>
<!--/.site-main end -->