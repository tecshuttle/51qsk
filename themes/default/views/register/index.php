<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-login-register md-register" role="main">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">

               				<!--图文介绍|动画-->			
				<div class="js-fading-slider">
					<ul class="clearfix list-unstyled">
						<li>
							<figure class="text-center">
								<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/beautify-p1.png" alt="点翠">
								
								<!--描述-->
								<figcaption>
									<h4>点翠</h4>
									<p class="text-justify">
										两千年来，中国一直在用翠鸟的蓝色羽毛作为镶嵌的 精致艺术品和装饰，从发夹，头饰，和扇子到屏风。
									</p>
								</figcaption>
							</figure>																						
						</li>
						<li>
							<figure class="text-center">
								<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/beautify-p2.png" alt="烧蓝">
								
								<!--描述-->
								<figcaption>
			                        <h4>烧蓝</h4>
			                        <p class="text-justify">烧蓝作为中国古代金银器的一种，传世的实物并不很多， 主要原因是黄金和白银均属稀有贵金属，又都具有很高 的经济价值，绝大多数为皇宫所用。作为宫廷陈设用品， 体现出封建皇帝的尊贵地位。
			                        </p>
			                    </figcaption>
							</figure>	
						</li>
						<li>
							<figure class="text-center">
								<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/beautify-p1.png" alt="点翠">
								
								<!--描述-->
								<figcaption>
									<h4>点翠</h4>
									<p class="text-justify">
										两千年来，中国一直在用翠鸟的蓝色羽毛作为镶嵌的 精致艺术品和装饰，从发夹，头饰，和扇子到屏风。
									</p>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure class="text-center">
								<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/beautify-p2.png" alt="烧蓝">
								
								<!--描述-->
								<figcaption>
			                        <h4>烧蓝</h4>
			                        <p class="text-justify">烧蓝作为中国古代金银器的一种，传世的实物并不很多， 主要原因是黄金和白银均属稀有贵金属，又都具有很高 的经济价值，绝大多数为皇宫所用。作为宫廷陈设用品， 体现出封建皇帝的尊贵地位。
			                        </p>
			                    </figcaption>
							</figure>
						</li>								
					</ul>
				</div>
				<!--/.js-fading-slider END-->
														
				<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/unslider-min.js"></script>
				<script>
					jQuery(document).ready(function($) {
						$('.js-fading-slider').unslider({
							animation: 'fade',
							autoplay: true,
							arrows: false,
							nav: false,
							delay: 6000,
							speed: 300
						});
					});
				</script>

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
								<?php
										$studentUserError = Yii::app()->user->getFlash('StudentUserError');
										if($studentUserError != null){
										   echo '<div class="errorMessage">'.$studentUserError.'</div>';
									}?>
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
                                        <input type="checkbox" name="studentAgree">同意条款
                                    </label>

                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
								<?php
										$sagreeMessage = Yii::app()->user->getFlash('studentAgreeMessage');
										if($sagreeMessage != null){
										   echo '<div class="errorMessage">'.$sagreeMessage.'</div>';
									}?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
									<a href="<?= $this -> createUrl('/login', array('userType' => 'student')); ?>" class="btn btn-gray btn-normer">
										登录
									</a>
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
								<?php
										$teacherUserError = Yii::app()->user->getFlash('TeacherUserError');
										if($teacherUserError != null){
										   echo '<div class="errorMessage">'.$teacherUserError.'</div>';
									}?>
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
                                        <input name="teacherAgree" type="checkbox">同意条款
                                    </label>
                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
									<?php
										$tagreeMessage = Yii::app()->user->getFlash('teacherAgreeMessage');
										if($tagreeMessage != null){
										   echo '<div class="errorMessage">'.$tagreeMessage.'</div>';
									}?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
									<a href="<?= $this -> createUrl('/login', array('userType' => 'master')); ?>" class="btn btn-gray btn-normer">
										登录
									</a>
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

									<?php
										$hostUserError = Yii::app()->user->getFlash('HostUserError');
										if($hostUserError != null){
										   echo '<div class="errorMessage">'.$hostUserError.'</div>';
									}?>
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
                                        <input name="hostAgree" type="checkbox">同意条款
                                    </label>
                                    <a class="form-control-static pull-left form-control-link" href="#" title="统一条款|点击查看">点击查看</a>
									<?php
										$hagreeMessage = Yii::app()->user->getFlash('hostAgreeMessage');
										if($hagreeMessage != null){
										   echo '<div class="errorMessage">'.$hagreeMessage.'</div>';
									}?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-red btn-normer">注册</button>
									<a href="<?= $this -> createUrl('/login', array('userType' => 'host')); ?>" class="btn btn-gray btn-normer">
										登录
									</a>
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
<!--/.site-main end -->