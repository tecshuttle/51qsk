<main class="site-main" role="main">
				<div class="container">

					<section class="admin-confirmed-order">

						<div class="panel-heading">
							<h3 class="panel-title">确认订单信息</h3>
						</div>
						<div class="panel-body  cp-media-sm">

							<figure class="media">
								<div class="media-left">
									<a href="javascript:void(0)">
										<img class="media-object" src="<?= $lesson->pic ?>" >
									</a>
								</div>

								<figcaption class="media-body">
									<span class="center-block"><?= $lesson->name ?></span>
									<span class="center-block"><?= '<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">'. $place->address .'</a>'?></span>
									<span class="center-block clearfix">
									<span class="pull-left">价格：￥<?= $lesson->price == 0 ? '公益' : $lesson->price; ?></span>
									<span class="pull-left">开课时间：<?= DATE_FORMAT(DATE_CREATE($lesson->start_date_time), 'Y/m/d H:m') ?></span>
									</span>
									<span class="center-block clearfix">
										<?php $teacher = Teacher::model()->findByPk($lesson->teacher_id)?>
										<span class="pull-left">预订人：<?= $teacher->name?></span>
									</span>
								</figcaption>

							</figure>

						</div>

						<div class="panel-heading">
							<h3 class="panel-title">确认付款方式</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group text-center">
									<label class="radio-inline">
										<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
										<!--支付图标-->
										<span class="payment-icon-container">
											<!--设计图只有支付宝-payment-alipay-->
											<!--后期增加支付方式 修改替换payment-alipay-->
                                          <span title="支付宝" class="payment-icon payment-alipay"></span>
										<!--当图片无法显示时，将显示支付名称-->
										<span class="payment-name">支付宝</span>
										</span>
									</label>
								</div>
								<div class="form-group">
									<div class="pay-container">
										<span class="pay-money"><span>实付金额：</span><b>￥<?= $lesson->price == 0 ? 0 : $lesson->price; ?>	</b>
										</span>
										<a href="javascript: (lessonJoin(this, <?= $lesson->id ?>, <?= $this->_cookiesGet('userId') ?>, '<?= $joinUrl ?>'));" class="btn btn-red btn-normer btn-lg-padding" title="确认并付款" role="button">确认并付款</a>
									</div>
								</div>
							</form>
						</div>

					</section>
					<!--/.Admin-confirmed-order END-->

				</div>
			</main>
			
			<script src="<?= $this->_theme->baseUrl; ?>/assets/js/main/lesson.js"></script>