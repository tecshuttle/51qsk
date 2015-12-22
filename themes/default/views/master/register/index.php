
<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-login-register md-register" role="main">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">

                <!--图文介绍-->
                <figure class="text-center">
                    <span class="center-block beautify-picture">
                        <img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/beautify-p2.png" alt="烧蓝">
                    </span>
                    <figcaption>
                        <h4>点翠</h4>
                        <p class="text-justify">烧蓝作为中国古代金银器的一种，传世的实物并不很多， 主要原因是黄金和白银均属稀有贵金属，又都具有很高 的经济价值，绝大多数为皇宫所用。作为宫廷陈设用品， 体现出封建皇帝的尊贵地位。
                        </p>
                    </figcaption>
                </figure>

            </div>

            <div class="col-xs-6">

                <div class="cp-tab-login-reg-wrap">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="loginRegTab">
                        <li role="presentation" class="active">
                            <a href="#student" aria-controls="student" role="tab" data-toggle="tab">学员注册</a>
                        </li>
                        <li role="presentation"><a href="#master" aria-controls="master" role="tab" data-toggle="tab">名师注册</a>
                        </li>
                        <li role="presentation"><a href="#host" aria-controls="host" role="tab" data-toggle="tab">场地主注册</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="student">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'student-form',
                                'enableAjaxValidation' => false,
                                'htmlOptions' => array('class' => 'form-horizontal'),
                                'action' => $this->createUrl('/register', array("userType" => 'student')),
                            ));
                            ?>
                            <div class="form-group">
                                <label for="inputPhoneNum" class="col-xs-3 control-label">手机号：</label>
                                <div class="col-xs-9">
<?php echo $form->textField($studentModel, 'user', array('class' => 'form-control')); ?><?php echo $form->error($studentModel, 'user'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-xs-3 control-label">密码：</label>
                                <div class="col-xs-9">
<?php echo $form->passwordField($studentModel, 'password', array('class' => 'form-control')); ?><?php echo $form->error($studentModel, 'password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRepeatPassword" class="col-xs-3 control-label">重复密码：</label>
                                <div class="col-xs-9">
<?php echo $form->passwordField($studentModel, 'verifyPassword', array('class' => 'form-control')); ?><?php echo $form->error($studentModel, 'verifyPassword'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCode" class="col-xs-3 control-label">验证码：</label>
                                <div class="col-xs-9">
                                    <div class="row security-code">
                                        <div class="col-xs-6">
<?php echo $form->textField($studentModel, 'captcha', array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <span class="center-block">
<?php $this->widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
<?php echo $form->error($studentModel, 'captcha'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9 clearfix">
                                    <label class="checkbox-inline pull-left">
                                        <input type="checkbox">同意条款
                                    </label>
                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
									<button type="submit" class="btn btn-red btn-normer pull-right">登陆</button>
                                </div>
                            </div>

<?php $this->endWidget(); ?>

                        </div>
                        <!--/.学员注册 END-->

                        <div role="tabpanel" class="tab-pane fade in" id="master">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'master-form',
                                'enableAjaxValidation' => false,
                                'htmlOptions' => array('class' => 'form-horizontal'),
                                'action' => $this->createUrl('/register', array("userType" => 'master')),
                            ));
                            ?>
                            <div class="form-group">
                                <label for="inputPhoneNum" class="col-xs-3 control-label">手机号：</label>
                                <div class="col-xs-9">
<?php echo $form->textField($teacherModel, 'user', array('class' => 'form-control')); ?><?php echo $form->error($teacherModel, 'user'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-xs-3 control-label">密码：</label>
                                <div class="col-xs-9">
<?php echo $form->passwordField($teacherModel, 'password', array('class' => 'form-control')); ?><?php echo $form->error($teacherModel, 'password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRepeatPassword" class="col-xs-3 control-label">重复密码：</label>
                                <div class="col-xs-9">
<?php echo $form->passwordField($teacherModel, 'verifyPassword', array('class' => 'form-control')); ?><?php echo $form->error($teacherModel, 'verifyPassword'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCode" class="col-xs-3 control-label">验证码：</label>
                                <div class="col-xs-9">
                                    <div class="row security-code">
                                        <div class="col-xs-6">
                                                <?php echo $form->textField($teacherModel, 'captcha', array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <span class="center-block">
<?php $this->widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
<?php echo $form->error($teacherModel, 'captcha'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9 clearfix">
                                    <label class="checkbox-inline pull-left">
                                        <input type="checkbox">同意条款
                                    </label>
                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
                                </div>
                            </div>

<?php $this->endWidget(); ?>

                        </div>
                        <!--/.名师注册 END-->

                        <div role="tabpanel" class="tab-pane fade in" id="host">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'host-form',
                                'enableAjaxValidation' => false,
                                'htmlOptions' => array('class' => 'form-horizontal'),
                                'action' => $this->createUrl('/register', array("userType" => 'host')),
                            ));
                            ?>
                            <div class="form-group">
                                <label for="inputPhoneNum" class="col-xs-3 control-label">手机号：</label>
                                <div class="col-xs-9">
                                    <?php echo $form->textField($hostModel, 'user', array('class' => 'form-control')); ?><?php echo $form->error($hostModel, 'user'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-xs-3 control-label">密码：</label>
                                <div class="col-xs-9">
                                    <?php echo $form->passwordField($hostModel, 'password', array('class' => 'form-control')); ?><?php echo $form->error($hostModel, 'password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRepeatPassword" class="col-xs-3 control-label">重复密码：</label>
                                <div class="col-xs-9">
<?php echo $form->passwordField($hostModel, 'verifyPassword', array('class' => 'form-control')); ?><?php echo $form->error($hostModel, 'verifyPassword'); ?>
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                    <label for="inputPlaceName" class="col-xs-3 control-label">会所名：</label>
                                    <div class="col-xs-9">
                                            <input type="text" class="form-control" id="inputPlaceName" placeholder="请输入您的会所名">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputAddress" class="col-xs-3 control-label">地址：</label>
                                    <div class="col-xs-9">
                                            <input type="text" class="form-control" id="inputAddress" placeholder="请输入您的会所地址">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputScale" class="col-xs-3 control-label">规模：</label>
                                    <div class="col-xs-9">
                                            <input type="text" class="form-control" id="inputScale" placeholder="请输入您的规模">
                                    </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label for="inputCode" class="col-xs-3 control-label">验证码：</label>
                                <div class="col-xs-9">
                                    <div class="row security-code">
                                        <div class="col-xs-6">
<?php echo $form->textField($hostModel, 'captcha', array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <span class="center-block">
<?php $this->widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
<?php echo $form->error($hostModel, 'captcha'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9 clearfix">
                                    <label class="checkbox-inline pull-left">
                                        <input type="checkbox">同意条款
                                    </label>
                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
                                </div>
                            </div>

<?php $this->endWidget(); ?>

                        </div>
                        <!--/.场地主注册 END-->

                    </div>
                </div>
                <!--/.cp-tab-login-reg-wrap END-->

            </div>
        </div>

    </div>
</main>
<script>
    $(function () {
        $('#loginRegTab a[href="#<?= Yii::app()->request->getParam('userType'); ?>"]').tab('show');
    });
</script>
<!--占位符扩展-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.placeholders.min.js"></script>
<!--/.site-main end -->