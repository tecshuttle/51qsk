<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-login-register md-login" role="main">
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
										两千年来，中国一直在用翠鸟的蓝色羽毛作为镶嵌的精致艺术品和装饰，从发夹，头饰，和扇子到屏风。
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
			                        <p class="text-justify">烧蓝作为中国古代金银器的一种，传世的实物并不很多， 主要原因是黄金和白银均属稀有贵金属，又都具有很高的经济价值，绝大多数为皇宫所用。作为宫廷陈设用品， 体现出封建皇帝的尊贵地位。
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
							delay: 10000,
							speed: 300
						});
					});
				</script>					

			</div>
			<div class="col-xs-6">
				<div class="cp-tab-login-reg-wrap">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist" id="loginRegTab">
						<li class="active" role="presentation">
							<a href="#student" aria-controls="student" role="tab" data-toggle="tab">
								学员登录
							</a>
						</li>
						<li role="presentation">
							<a href="#master" aria-controls="master" role="tab" data-toggle="tab">
								名师登录
							</a>
						</li>
						<li role="presentation">
							<a href="#host" aria-controls="host" role="tab" data-toggle="tab">
								场地主登录
							</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="student">
							<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'student-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'), 'action' => $this -> createUrl('/login', array("userType" => 'student')), )); ?>
							<div class="form-group">
								<label for="inputAccounts" class="col-xs-3 control-label">手机号：</label>
								<div class="col-xs-9">
									<?php echo $form -> textField($studentModel, 'user', array('class' => 'form-control')); ?><?php echo $form -> error($studentModel, 'user'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-xs-3 control-label">密码：</label>
								<div class="col-xs-9">
									<!--IE8好像支持type="password"-->
									<?php echo $form -> passwordField($studentModel, 'password', array('class' => 'form-control')); ?><?php echo $form -> error($studentModel, 'password'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputCode" class="col-xs-3 control-label">验证码：</label>
								<div class="col-xs-9">
									<div class="row security-code">
										<div class="col-xs-6">
											<?php echo $form -> textField($studentModel, 'captcha', array('class' => 'form-control')); ?>
										</div>
										<div class="col-xs-6">
											<span class="center-block">
												<?php $this -> widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
												<?php echo $form -> error($studentModel, 'captcha'); ?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<label class="checkbox-inline">
										<input type="checkbox">
										自动登录
									</label>
									<a class="form-control-static pull-right form-control-link" href="#" title="忘记密码？">
										忘记密码？
									</a>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<button type="submit" class="btn btn-red btn-normer">
										登录
									</button>
									<a href="<?= $this -> createUrl('/register', array('userType' => 'student')); ?>" class="btn btn-gray btn-normer">
										注册
									</a>
								</div>
							</div>
							<div class="form-group">
								<p class="col-xs-offset-3 col-xs-9 form-control-static form-login-sns">
									你可以通过一下账号登陆：
									<a class="login-qq" href="#" title="QQ">
										通过腾讯QQ登录
									</a>
									<a class="login-wechat" href="#" title="微信">
										通过腾讯微信登录
									</a>
								</p>
							</div>
							<?php $this -> endWidget(); ?>
						</div>
						<!--/.学员登录 END-->
						<div role="tabpanel" class="tab-pane fade in" id="master">
							<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'teacher-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'), 'action' => $this -> createUrl('/login', array("userType" => 'master')), )); ?>
							<div class="form-group">
								<label for="inputAccounts" class="col-xs-3 control-label">手机号：</label>
								<div class="col-xs-9">
									<?php echo $form -> textField($teacherModel, 'user', array('class' => 'form-control')); ?><?php echo $form -> error($teacherModel, 'user'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-xs-3 control-label">密码：</label>
								<div class="col-xs-9">
									<!--IE8好像支持type="password"-->
									<?php echo $form -> passwordField($teacherModel, 'password', array('class' => 'form-control')); ?><?php echo $form -> error($teacherModel, 'password'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputCode" class="col-xs-3 control-label">验证码：</label>
								<div class="col-xs-9">
									<div class="row security-code">
										<div class="col-xs-6">
											<?php echo $form -> textField($teacherModel, 'captcha', array('class' => 'form-control')); ?>
										</div>
										<div class="col-xs-6">
											<span class="center-block">
												<?php $this -> widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
												<?php echo $form -> error($teacherModel, 'captcha'); ?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<label class="checkbox-inline">
										<input type="checkbox">
										自动登录
									</label>
									<a class="form-control-static pull-right form-control-link" href="#" title="忘记密码？">
										忘记密码？
									</a>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<button type="submit" class="btn btn-red btn-normer">
										登录
									</button>
									<a href="<?= $this -> createUrl('/register', array('userType' => 'master')); ?>" class="btn btn-gray btn-normer">
										注册
									</a>
								</div>
							</div>
							<div class="form-group">
								<p class="col-xs-offset-3 col-xs-9 form-control-static form-login-sns">
									你可以通过一下账号登陆：
									<a class="login-qq" href="#" title="QQ">
										通过腾讯QQ登录
									</a>
									<a class="login-wechat" href="#" title="微信">
										通过腾讯微信登录
									</a>
								</p>
							</div>
							<?php $this -> endWidget(); ?>
						</div>
						<!--/.名师登录 END-->
						<div role="tabpanel" class="tab-pane fade in" id="host">
							<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'host-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'), 'action' => $this -> createUrl('/login', array("userType" => 'host')), )); ?>
							<div class="form-group">
								<label for="inputAccounts" class="col-xs-3 control-label">手机号：</label>
								<div class="col-xs-9">
									<?php echo $form -> textField($hostModel, 'user', array('class' => 'form-control')); ?><?php echo $form -> error($hostModel, 'user'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-xs-3 control-label">密码：</label>
								<div class="col-xs-9">
									<!--IE8好像支持type="password"-->
									<?php echo $form -> passwordField($hostModel, 'password', array('class' => 'form-control')); ?><?php echo $form -> error($hostModel, 'password'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputCode" class="col-xs-3 control-label">验证码：</label>
								<div class="col-xs-9">
									<div class="row security-code">
										<div class="col-xs-6">
											<?php echo $form -> textField($hostModel, 'captcha', array('class' => 'form-control')); ?>
										</div>
										<div class="col-xs-6">
											<span class="center-block">
												<?php $this -> widget('CCaptcha', array('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '<i class="fa fa-refresh"></i>', 'imageOptions' => array('alt' => '点击换图', 'align' => 'absmiddle'))); ?>
												<?php echo $form -> error($hostModel, 'captcha'); ?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<label class="checkbox-inline">
										<input type="checkbox">
										自动登录
									</label>
									<a class="form-control-static pull-right form-control-link" href="#" title="忘记密码？">
										忘记密码？
									</a>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-9">
									<button type="submit" class="btn btn-red btn-normer">
										登录
									</button>
									<a href="<?= $this -> createUrl('/register', array('userType' => 'host')); ?>" class="btn btn-gray btn-normer">
										注册
									</a>
								</div>
							</div>
							<div class="form-group">
								<p class="col-xs-offset-3 col-xs-9 form-control-static form-login-sns">
									你可以通过一下账号登陆：
									<a class="login-qq" href="#" title="QQ">
										通过腾讯QQ登录
									</a>
									<a class="login-wechat" href="#" title="微信">
										通过腾讯微信登录
									</a>
								</p>
							</div>
							<?php $this -> endWidget(); ?>
						</div>
						<!--/.场地主登录 END-->
					</div>
				</div>
				<!--/.cp-tab-login-reg-wrap END-->
			</div>
		</div>
	</div>
</main>
<script>$(function() {
			$('#loginRegTab a[href="#<?= Yii::app() -> request -> getParam('userType'); ?>"]').tab('show');
});</script>
<!--/.site-main end -->