<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 lte9" lang="zh-cn"><![endif]-->
<!--[if IE 9]><html class="ie9 lte9" lang="zh-cn"><![endif]-->
<!--[if !(IE 8) | !(IE 9)]><!-->
<html lang="zh-cn">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=1030, initial-scale=1.0">
	<meta name="renderer" content="webkit">
	<meta name="force-rendering" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="keywords" content="<?php echo $this->_seoKeywords ?>">
    <meta name="description" content="<?php echo $this->_seoDescription ?>">
    <title><?php echo $this->_seoTitle ?></title>

    <!-- Core css -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $this->_theme->baseUrl ?>/assets/css/style.min.css" media="screen">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap-select/1.7.1/css/bootstrap-select.css"  media="screen">
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" media="screen">

    <!-- Core javaScript -->
   	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
   	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <?php Yii::app() -> clientScript -> registerScriptFile($this -> _theme -> baseUrl . '/assets/js/ie10-viewport-bug-workaround.js', CClientScript::POS_END); ?>
    <?php Yii::app() -> clientScript -> registerScriptFile($this -> _theme -> baseUrl . '/assets/js/site.js', CClientScript::POS_END); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE 8]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
      <script src="//cdn.bootcss.com/selectivizr/1.0.2/selectivizr-min.js"></script>
    <![endif]-->

    <!------Kill IE------>
    <!--[if lte IE 7 ]>
    <link rel="stylesheet" href="assets/iealert/iealert.min.css">
    <script src="assets/iealert/iealert.min.js"></script>
    <script>
        $(document).ready(function () {
            $("body").iealert();
        });
    </script>
    <![endif]-->
</head>

<body>

<div class="site-wrap">

    <!--/*==========================▼site-header▼=========================*/-->
    <header class="site-header">
        <div class="container">
            <div class="row">

                <?php $status = $this -> id; ?>

                <div class="col-xs-9">

                	<!--LOGO-->
                	<a class="brand" href="<?php echo Yii::app()->homeUrl ?>" title="种子网络平台|禅意东方|展示东方文化及东方美学系列课程的网络平台">
                    	<!--H1标签内的内容可作为SEO来优化-->
                    	<h1>种子网络平台|禅意东方|展示东方文化及东方美学系列课程的网络平台</h1>
                	</a>

                    <!--site-nav-->
                    <nav class="clearfix site-nav">
                        <!--active为选中类-->
                        <a <?= $status === 'site' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->homeUrl ?>">
                            <strong>首页</strong>
                        </a>
                        <a <?= $status === 'lesson' ? 'class="active"' : '' ?> href="<?php echo $this->createUrl('/lesson') ?>">
                            <strong>课程汇总</strong>
                        </a>
                        <a <?= $status === 'teacher' ? 'class="active"' : '' ?> href="<?php echo $this->createUrl('/teacher') ?>">
                            <strong>名师库</strong>
                        </a>
                        <a <?= $status === 'family' ? 'class="active"' : '' ?> href="<?php echo $this->createUrl('/family') ?>">
                            <strong>亲子活动</strong>
                        </a>
                        <a <?= $status === 'customize' ? 'class="active"' : '' ?> href="<?php echo $this->createUrl('/customize') ?>">
                            <strong>企业定制</strong>
                        </a>
                    </nav>
                    <!--/.site-nav END-->
                </div>

                <div class="col-xs-3">

                    <div class="text-center pull-right top-info">
                        <?php if ($this->_cookiesGet('userName') == '') { ?>
                            <a href="<?php echo $this->createUrl('/login') ?>">登录</a>
							<a href="<?php echo $this->createUrl('/register') ?>">注册</a>
                        <?php } else { ?>
                            <a href="<?php echo $this->createUrl('/' . $this->_cookiesGet('userType')) ?>"><?= $this -> _cookiesGet('userName'); ?>
                                </a>
                            <a href="<?php echo $this->createUrl('/logout') ?>">退出</a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </header>
	<?php if(!($_SERVER['REQUEST_URI'] === '/' OR
				$_SERVER['REQUEST_URI'] === '/index.php' OR
					$_SERVER['REQUEST_URI'] === '/index.php?r=login' OR
						$_SERVER['REQUEST_URI'] === '/index.php?r=register' OR
							$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=about' OR
								$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=cultural' OR
									$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=team' OR
										$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=contact' OR
											$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=help' OR
												$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=law' OR
													$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=unionCollege' OR
														$_SERVER['REQUEST_URI'] === '/index.php?r=page/show&name=networkPolicy' OR
															$_SERVER['REQUEST_URI'] === '/index.php?r=customize' OR
																$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=master' OR
																	$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=student' OR
																		$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=host' OR
																			$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=student' OR
																				$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=master' OR
																					$_SERVER['REQUEST_URI'] === '/index.php?r=host/default/Info' OR
																						$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=host'
															)):?>
	<div class="cp-recom" role="banner">
				<div class="container">

					<div id="cp-recom-thumbs" class="clearfix">

						<figure class="pull-left item">
							<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/recom-p1.jpg">

							<figcaption class="text-center">
								<a class="item-info" href="#">
									<div class="item-info-inner">
										<h2>东方禅意会所</h2>
										<span class="center-block">会所地点：深圳福田区</span>
									</div>
								</a>
							</figcaption>
						</figure>

						<figure class="pull-left item">
							<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/recom-p2.jpg">

							<figcaption class="text-center">
								<a class="item-info" href="#">
									<div class="item-info-inner">
										<h2>东方禅意会所</h2>
										<span class="center-block">会所地点：深圳福田区</span>
									</div>
								</a>
							</figcaption>
						</figure>

						<figure class="pull-left item">
							<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/recom-p3.jpg">

							<figcaption class="text-center">
								<a class="item-info" href="#">
									<div class="item-info-inner">
										<h2>东方禅意会所</h2>
										<span class="center-block">会所地点：深圳福田区</span>
									</div>
								</a>
							</figcaption>
						</figure>

						<figure class="pull-left item">
							<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/recom-p4.jpg">

							<figcaption class="text-center">
								<a class="item-info" href="#">
									<div class="item-info-inner">
										<h2>东方禅意会所</h2>
										<span class="center-block">会所地点：深圳福田区</span>
									</div>
								</a>
							</figcaption>
						</figure>

						<figure class="pull-left item">
							<img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/recom-p5.jpg">

							<figcaption class="text-center">
								<a class="item-info" href="#">
									<div class="item-info-inner">
										<h2>东方禅意会所</h2>
										<span class="center-block">会所地点：深圳福田区</span>
									</div>
								</a>
							</figcaption>
						</figure>

					</div>

				</div>
			</div>
	<?php endif; ?>
	<?php echo $content; ?>
			<?php if(!($_SERVER['REQUEST_URI'] === '/index.php?r=login' OR
						$_SERVER['REQUEST_URI'] === '/index.php?r=register' OR
							$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=master' OR
								$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=student' OR
									$_SERVER['REQUEST_URI'] === '/index.php?r=register&userType=host' OR
										$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=student' OR
											$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=host' OR
												$_SERVER['REQUEST_URI'] === '/index.php?r=login&userType=master' )):?>
			<footer class="cp-thumbnail cp-subject cp-picture-effect">
				<!--热门课程-->
				<h4><i class="fa fa-fire"></i>&nbsp;热门课程</h4>
				<div class="row">

							<?php
								$lessonRecommendCriteria = new CDbCriteria;
								//推荐课程
								$lessonRecommendCriteria->limit = '3';
								$lessonRecommendCriteria->order = 'id DESC';
								$lessonRecommendCriteria->addCondition('recommendation = :recommendation');
								$lessonRecommendCriteria->params[':recommendation']=1;
								$lessonRecommend = Lesson::model()->findAll($lessonRecommendCriteria);
								foreach($lessonRecommend as $lRecommend):
									?>
								<div class="col-xs-4">
									<div class="thumbnail">
										<a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $lRecommend -> id)); ?>">
											<img class="img-responsive" src="<?php echo $lRecommend->pic ?>">
										</a>
										<div class="caption">
											<a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $lRecommend -> id)); ?>" class="btn btn-red btn-sm  pull-right" title="了解更多" role="button">了解更多</a>

											<h4 class="clearfix">
												<span class="title pull-left"><?php echo $lRecommend->name ?> </span>
												<span class="price pull-left"><i class="fa fa-jpy"></i><?php echo $lRecommend->price ?></span>
											</h4>

											<ul class="list-inline">
												<?php $teacher = Teacher::model() -> findByPk($lRecommend -> teacher_id); ?>
												<li>主讲人：
												<?php
												if ($teacher == null)
													echo 'Gly';
												else
													echo $teacher['name'];
													?></li>
												<li>时间：<?php echo $lRecommend->start_date_time ?></li>
											</ul>

										</div>
									</div>
								</div>
							<?php endforeach; ?>
				</div>
			</footer>
			<!--/.cp-thumbnail end-->
			<?php endif; ?>

	<!--图片滑过特效-->
	<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/modernizr.custom.js"></script>
	<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.hoverdir.js"></script>
	<script>$(function() {
	$('#cp-recom-thumbs > figure').each(function() {
		$(this).hoverdir();
	});
});</script>
	<!--/.cp-subject end-->


    <!--/*===================▼site-footer▼==================*/-->
    <footer class="site-footer" role="contentinfo">

        <div class="brand-footer text-center">
            <div class="container">
                <div class="brand-content">
                    <img class="img-responsive" src="<?php echo $this->_theme->baseUrl ?>/assets/img/brand-master.png" alt="网络平台|禅意东方|展示东方文化及东方美学系列课程的网络平台">
                </div>
            </div>

        </div>

        <div class="container">
            <ul class="list-unstyled" role="list">
                <li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'about')) ?>" title="了解我们">了解我们</a>
                </li>
				
                <li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'team')) ?>" title="加入我们">加入我们</a>
                </li>

                <li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'contact')) ?>" title="联系我们">联系我们</a>
                </li>

                <li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'networkPolicy')) ?>" title="网络条款">网络条款</a>
                </li>

				<li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'help')) ?>" title="帮助中心">帮助中心</a>
                </li>
				
				<li role="listitem">
                    <a href="<?php echo $this->createUrl('/page/show', array('name' => 'unionCollege')) ?>" title="书院联盟">书院联盟</a>
                </li>
            </ul>

            <p class="copyright">
                                    深圳善种缘文化科技发展有限公司&nbsp;&nbsp;&nbsp;备案号：粤ICP备15093016号
            </p>
        </div>
    </footer>

</div>

<script src="//cdn.bootcss.com/jquery.matchHeight/0.6.0/jquery.matchHeight-min.js"></script>
<script src="//cdn.bootcss.com/scrollup/2.4.0/jquery.scrollUp.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-select/1.7.1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-select/1.7.1/js/i18n/defaults-zh_CN.min.js"></script>
<script src="//cdn.bootcss.com/jquery-placeholder/2.1.3/jquery.placeholder.min.js"></script>
</body>
</html>