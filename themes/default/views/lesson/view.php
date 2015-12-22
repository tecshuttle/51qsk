<?php $this->renderPartial('/_include/site_nav') ?>
<main class="site-main md-subject-detail" role="main">
    <div class="container">

        <header class="cp-detail-header">
            <figure class="media cp-media-lager">
                <div class="media-left">
                    <img class="media-object" src="<?= $lesson->pic ?>" style="max-width: 305px;">
                </div>

                <figcaption class="media-body">
                    <h3 class="media-heading"><?= $lesson->name ?></h3>

                    <span class="center-block date">
                        开课时间：<?= DATE_FORMAT(DATE_CREATE($lesson->start_date_time), 'Y年m月d日 H:i') ?>-<?= DATE_FORMAT(DATE_CREATE($lesson->end_date_time), 'H:i') ?>
                    </span>

                    <ul class="list-inline master">
                        <li>
                            主讲导师：<a href="<?= Yii::app()->createUrl('teacher/view', array('id' => $teacher->id)) ?>"><?= $teacher->name ?></a>
                        </li>
                        <li>
                            课堂地址：
							<?php if($lesson->place_id == 0){
								echo '待定';
							}else{ 
								echo ' <a href="#place_city" aria-controls="place_city" role="tab" data-toggle="tab">'. $place->cityArea->name .'</a>';
							} ?>
                        </li>
						<li>
							供餐：<?php
							if ($lesson -> hasfood == 0) {
								echo '否';
							} else if ($lesson -> hasfood == 1) {
								echo '是';
							} else {
								echo '部分';
							}
						?>
						</li>
                    </ul>

					 <ul class="list-inline master">

                    </ul>

                    <p class="text-justify"> <?= $lesson->summary ?> </p>

                    <div class="row sign-up">
                        <div class="col-xs-6">
                            <span class="center-block price">价格：￥<b><?= $lesson -> price == 0 ? '公益' : $lesson -> price; ?></b></span>
                    <span class="center-block number">
                        已报名 <?= $lesson -> actual_students; ?> 人 /
                        限 <?= $lesson -> max_students; ?> 人
                    </span>
						<?php if ($this->_cookiesGet('userType') === 'student'): ?>
							<br/>
							<?php if ($is_focus === null) : ?>

								<a href="<?= $this->createUrl('/student/lesson/focus', array('id' => $lesson->id)) ?>" class="btn btn-red btn-sm btn-sm-padding" title="收藏课程" role="button">收藏课程</a>
							<?php else: ?>
								<a href="javascript:void(-1)" class="btn btn-red btn-sm btn-sm-padding" title="已收藏" role="button">已收藏</a>
							<?php endif; ?>

                        </div>

						<?php if($lesson->status == 1):?>
                        <div class="col-xs-6">
							<?php if (count($isJoin) > 0): ?>
                                <a href="javascript: void(-1)" class="btn btn-red btn-lg btn-lg-padding pull-right" title="已报名" role="button">已报名</a>
                            <?php else: ?>
                                <?php if ($this->_cookiesGet('userName') === null): ?>
                                    <a data-toggle="modal" href="#myModal" class="btn btn-red btn-lg btn-lg-padding pull-right" title="我要报名" role="button">我要报名</a>
                                <?php else: ?>
                                    <a href="<?= Yii::app()->createUrl('lesson/pay', array('id' => $lesson->id))?>" class="btn btn-red btn-lg btn-lg-padding pull-right" title="我要报名" role="button">我要报名</a>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
						<?php endif; ?>
						<?php else: ?>
                        </div>
							<?php if($lesson->status == 1):?>
							<div class="col-xs-6">
								<a href="<?= $this -> createUrl('/login', array('userType' => 'student')); ?>" class="btn btn-red btn-lg btn-lg-padding pull-right" title="登录学员账户即可报名" role="button">登录学员账户即可报名</a>
							</div>
							<?php endif; ?>
						<?php endif; ?>
                    </div>

                </figcaption>
            </figure>
        </header>


        <div class="cp-tabpanel cp-tabpanel-detail" role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="detailTab">
                <li role="presentation" class="active">
                    <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">课程详情</a>
                </li>
                <li role="presentation">
                    <a href="#place_city" aria-controls="place_city" role="tab" data-toggle="tab">教学环境</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                    <article class="cp-detail-article">
                        <?= $lesson -> intro; ?>
                    </article>
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="place_city">

                    <article class="md-subject-article">
                        <figure class="cp-slider">
                            <!--bxslider-wrapper-->
                            <!--设计图是三列,低于等于三张图左右方向按钮自动禁用-->
							<div class="bxslider cp-popup-gallery" >
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
							<?php if($row == null):?>
								<a href="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p1.jpg">
										<!--href为小图-->
										<img src="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p1.jpg">
										<!--img为鼠标点击大图-->
								</a>
								<a  href="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p2.jpg">
										<img src="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p2.jpg">
								</a>
								<a  href="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p3.jpg">
										<img src="<?= $this -> _theme -> baseUrl; ?>/assets/img/product/place-p1.jpg">
								</a>
							<?php endif;?>
							</div>
							
                        </figure>
                        <!--/.cp-slider end-->

                        <!--会所地图-->
                        <figure class="cp-map">
                            <figcaption>
                                <h3>会所地址</h3>
                                <h5>
								<?= 
									$place->cityArea->name.
									$place->districtArea->name.
									$place->address
									?>
								</h5>
                            </figcaption>
                            <div class="cp-map-content">
                                <img class="img-responsive" src="">
                            </div>

                        </figure>

                    </article>

                </div>

            </div>
        </div>
    </div>
</main>


<!--幻灯片扩展|模态弹出层扩展-->
<link rel="stylesheet" href="//cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" media="screen">
<script src="//cdn.bootcss.com/bxslider/4.2.5/jquery.bxslider.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
<script src="//cdn.bootcss.com/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
<script>$(function() {
			$('#taba a[href="#place_city"]').tab('show');
});</script>
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
<!--/.site-main end -->