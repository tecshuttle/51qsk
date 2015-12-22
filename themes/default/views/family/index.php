<!--图文-->
			<figure class="md-family-banner" role="banner">
				<div class="container">
					<figcaption>
						<h2>亲子成长</h2>
						<p>
							在以往的亲子成长活动中，孩子们通过系统学习与自己动手的过程，度过了难以言喻的欢乐时光。</p>
						<p>
							每一位父母，看到宝贝发自内心的愉悦与技能成长，由衷感到无比欣慰。</p>
						<p>
							我们带着孩子去上课，收获的却比孩子更要多。</p>
						<p>
							对于孩子们的美感教育，基于家长自身的美感认知培养，才能发挥得淋漓尽致。</p>
						<p>
							参与亲子成长训练营，和孩子们一起，从零开始，您会发现，在陪伴宝贝自我技能提升的同时，父母也变成了孩子们的伙伴和导师，互相学习，您与宝贝的相通话题越来越广，在生动而活跃的宝贝教育体系延伸中，我们都是学生，我们一起成长。</p>

					</figcaption>
				</div>
			</figure>

			<!--/*==========================▼site-main▼=========================*/-->
			<main class="site-main md-family" role="main">
				<div class="container">

					<div class="cp-tabpanel" role="tabpanel">

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" id="myTab">
							<li role="presentation" class="active"><a href="#tab" aria-controls="home" role="tab" data-toggle="tab">近期活动</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="tab">
								<?php if (empty($allFamily)): ?>
									<div style="text-align: center; padding: 3em;">暂无活动</div>
								<?php endif; ?>
								
								<?php foreach ($allFamily as $family): ?>
								<!--列表-->
								<section class="list-activities cp-media-lg cp-border-dotted">
									<div class="media-body">
										<div class="row">
											<div class="col-xs-9">
												<h3 class="media-heading"><?= $family['name'] ?></h3>

												<ul class="list-inline">
													<li>时间：<?= $family->time?></li>
													<li>地点：<?php 
														switch($family->city){
															case 1:
																echo '深圳';break;
															case 2:
																echo '广州';break;
															case 3:
																echo '上海';break;
															default:
																echo '北京';
														}
													?></li>
													<li>主办方：<?= $family->sponsor?></li>

												</ul>

												<ul class="list-inline">
													<li>价格：<?= $family->price ?> 元</li>
													<li> <?= $family->max_people === null ? '人数不限' : "限 $family->max_people 人" ?></li>
												</ul>
											</div>
											<div class="col-xs-3">
												<a href="<?= Yii::app()->createUrl('family/pay', array('id' => $family->id)); ?>" class="btn btn-red btn-lg btn-lg-padding pull-right" role="button">
													我要报名
												</a>
											</div>
										</div>

										<p class="text-justify"> <?= $family->profile?> </p>
									</div>
									<!--幻灯-->

									<figure class="cp-slider">

										<!--bxslider-wrapper-->
										<!--设计图是三列,低于等于三张图左右方向按钮禁用-->
										<div class="bxslider cp-popup-gallery">
											<?php foreach((array)$imageList as $key=>$row):?>
											<?php if($row):?>
												<!--title为图片的标题-->
												<a href="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" target="_blank">
													<!--href为小图-->
													<img src="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" align="absmiddle">
													<!--img为鼠标点击大图-->
												</a>
											<?php endif?>
											<?php endforeach?>
										</div>

									</figure>

								</section>
								<!--/.list-activities end-->
								<?php endforeach;?>
							</div>

						</div>

					</div>
					<!--/.cp-tabpanel end-->

				</div>
			</main>

			<!--幻灯片扩展-->
			<link rel="stylesheet" href="//cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" media="screen">
			<script src="//cdn.bootcss.com/bxslider/4.2.5/jquery.bxslider.min.js"></script>
			<script src="//cdn.bootcss.com/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
			<script>
				$(function() {
					$('.bxslider').bxSlider({
						infiniteLoop: false,
						minSlides: 3,
						maxSlides: 3,
						slideWidth: 298,
						slideMargin: 6,
						pager: false
					});
				});
				(function($) {
					$('.cp-popup-gallery').each(function() { // the containers for all your galleries
						$(this).magnificPopup({
							delegate: 'a',
							type: 'image',
							tLoading: '图片正在读取中 #%curr%...',
							// Delay in milliseconds before popup is removed
							removalDelay: 300,
							mainClass: 'cp-popup-gallery-wrap',
							gallery: {
								enabled: true,
								navigateByImgClick: true,
								preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
								tCounter: '<span class="mfp-counter">%curr% / %total%</span>' // markup of counter
							},
							zoom: {
								enabled: true,
								duration: 300,
								easing: 'ease-in-out', // CSS transition easing function
							},
							image: {
								tError: '<a href="%url%">该图片  #%curr%</a> 读取失败,请尝试刷新页面.',
								titleSrc: function(item) {
										return item.el.attr('title');
									}
									//标题参数，根据需求来删减
							}
						});
					});
				})(jQuery);
			</script>