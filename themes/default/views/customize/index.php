<!--图文-->
<figure class="md-company-banner" role="banner">
    <div class="container">
        <figcaption class="text-center">
            <h2>同游共学</h2>

            <p>
                您的企业文化理念中，一定常常为团队伙伴的精神生活丰实进行了诸多的关怀。员工在繁忙工作之余，除了集体培训活动，还可以在放松身心灵的度假时光中，学习提升个人质素的中华文化课程，培养团队成员雅致的兴趣爱好，亦或系统掌握调养身心的养生知识，与名师探讨中华武术，学习关爱亲友的智慧方法等。我们的顾问，会与您面对面探讨现阶段您企业在员工关怀方面的特定需求，提供情景优美的提升身心灵修养的优质场地，在色声香极致高雅的环境中，开展适合您企业的定制课程。放下商业化的技能培训，只是简单回到人性的潜能开发，释放压力，深入体悟东方智慧为每一位参与定制课程的团队成员所带来的个人意识优化，追求心清净而广大，在企业瓶颈期亦或飞跃期贡献潜能与创新，为企业创造更深远的价值。
            </p>

            <p>
                请大致描述您的定制需求，我们会根据您提交的内容做好合理规划，以及名家讲师及教学场地的组合预期，在我们共同探讨时，为您提供精准而详尽的选择方案。
            </p>

        </figcaption>
    </div>
</figure>

<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-company" role="main">
    <div class="container">

        <div class="cp-tabpanel">
		<div class="col-xs-offset-2 col-xs-9">
		   <h4 class="text-danger">
		       <?php
				$success = Yii::app()->user->getFlash('success');
			   if($success != null){
				   echo '<i class="fa fa-exclamation-circle"></i>'.$success;
			   }?>
		   </h4>
		</div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">为您服务</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active">
                    <!--表单提交-->
                    <section class="company-form">
                        <?php $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'customize-form',
                            'htmlOptions' => array('class' => 'form-horizontal')
                        )); ?>

                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group">
                                    <label for="Customize_name" class="col-xs-3 control-label"><span style="color:red">*</span>企业名称：</label>


                                    <div class="col-xs-9">

                                        <?php echo $form->textField($model, 'name', array('size' => 10, 'maxlength' => 30, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'name'); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="city" class="col-xs-3 control-label"><span style="color:red">*</span>企业所在城市：</label>

                                    <div class="col-xs-9">
                                        <?php
                                        echo $form->dropDownList($model, 'city',
                                            array('北京' => '北京', '上海' => '上海', '深圳' => '深圳', '广州' => '广州'),
                                            array('id' => 'city', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择企业所在城市')
                                        );
                                        ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="Customize_agent" class="col-xs-3 control-label"><span style="color:red">*</span>联系人：</label>

                                    <div class="col-xs-9">
                                        <?php echo $form->textField($model, 'agent', array('size' => 10, 'maxlength' => 30, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'agent'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="Customize_tel" class="col-xs-3 control-label"><span style="color:red">*</span>电话：</label>

                                    <div class="col-xs-9">
                                        <?php echo $form->textField($model, 'tel', array('size' => 10, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'tel'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group has-feedback">
                                    <label for="Customize_amount_student" class="col-xs-3 control-label">参与人数：</label>

                                    <div class="col-xs-9">
                                        <?php echo $form->textField($model, 'amount_student', array('size' => 10, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'amount_student'); ?>
                                        <span class="form-control-feedback" aria-hidden="true">人</span><!--单位-->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group has-feedback range">
                                    <label for="Customize_budget_min" class="col-xs-3 control-label">人均预算：</label>

                                    <div class="col-xs-9">
                                        <div class="input-group">
                                            <?php echo $form->textField($model, 'budget_min', array('size' => 10, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'budget_min'); ?>
                                            <span class="form-control-feedback" aria-hidden="true">元</span><!--单位-->

                                            <span class="input-group-addon">至</span>

                                            <?php echo $form->textField($model, 'budget_max', array('size' => 10, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'budget_max'); ?>
                                            <span class="form-control-feedback" aria-hidden="true">元</span><!--单位-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="inputClassroom" class="col-xs-3 control-label">教学环境：</label>

                                    <div class="col-xs-9">
										<?php
                                        echo $form->dropDownList($model, 'classroom',
                                            array('不限' => '不限', '度假园林' => '度假园林', '文化基地' => '文化基地', '禅意会所' => '禅意会所'),
                                            array('id' => 'classroom', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择教学环境')
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="inputPlace" class="col-xs-3 control-label">授课城市：</label>

                                    <div class="col-xs-9">
                                        <?php
                                        echo $form->dropDownList($model, 'place',
                                            array('不限' => '不限', '北京' => '北京', '上海' => '上海', '深圳' => '深圳', '广州' => '广州'),
                                            array('id' => 'place', 'class' => 'form-control selectpicker show-menu-arrow', 'data-size' => '12', 'title' => '请选择授课地点')
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="Customize_memo" class="col-xs-3 control-label"><span style="color:red">*</span>定制需求：</label>

                                    <div class="col-xs-9">
                                        <?php echo $form->textArea($model, 'memo', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '请认真填写课程简介')); ?>
                                        <?php echo $form->error($model, 'memo'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
										<button type="submit" class="btn btn-red btn-normer btn-lg-padding">提交
											</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php $this->endWidget(); ?>
                    </section>
                </div>
            </div>

        </div>

    </div>
</main>
