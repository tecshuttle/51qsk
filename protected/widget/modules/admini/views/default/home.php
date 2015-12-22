<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="renderer" content="webkit">
		<meta name="force-rendering" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp">
		<title>数据分析</title>

		<!--/*=====================▼开发版样式表, 用于修改和维护▼==================*/-->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/css/bootstrap-plus.css" media="screen">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/css/font-awesome.min.css" media="screen">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/css/chart.css" media="screen">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if IE 8]>
        <script src="assets/js/help/html5shiv.min.js"></script>
        <script src="assets/js/help/respond.min.js"></script>
        <script src="assets/js/help/selectivizr.min.js"></script>
        <![endif]-->

		<!------Kill IE------>
		<!--[if lte IE 7 ]>
		<link rel="stylesheet" href="assets/iealert/iealert.min.css">
		<script src="assets/iealert/jquery.min.js"></script>
		<script src="assets/iealert/dd_belatedpng.min.js"></script>
		<script src="assets/iealert/iealert.min.js"></script>
		<script>
			$(document).ready(function() {
				$("body").iealert();
			});
		</script>
		<![endif]-->

	</head>
		<!--彩色线条-->
		<div class="redBorder"></div>
		<div class="greenBorder"></div>
		<div class="yellowBorder"></div>

		<div class="chart-wrap">

			<header class="chart-header">
				<h2 class="container">数据分析</h2>
			</header>

			<main class="chart-main" role="main">
				<div class="container">
					<div class="chart-inner">

						<!--成交总金额-->
						<section class="panel panel-diy data-chart-money">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-line-chart"></i>
									成交总金额
									<small>单位(元)</small>
								</h3>
							</header>
							<div class="panel-body">
								<figure class="canvas">
									<!--ID对应下面的数据结构和参数设置-->
									<canvas id="canvas-money"></canvas>
									<figcaption class="text-help">

										<p class="text-left thumbnail-chart">
											<span class="clearfix center-block">
												<b></b><i>成交总金额</i>
											</span>
										</p>

										<p class="text-center">
											<i class="fa fa-exclamation-circle"></i>注：鼠标滑过柱形条可查看具体金额
										</p>
									</figcaption>
								</figure>
							</div>
						</section>

						<!--各分类中已报名课程和发布课程总量-->
						<section class="panel panel-diy data-chart-class">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-bar-chart"></i>
									各分类中已报名课程和发布课程总量
									<small>单位(个)</small>
								</h3>
							</header>
							<div class="panel-body">
								<figure class="canvas">
									<!--ID对应下面的数据结构和参数设置-->
									<canvas id="canvas-class"></canvas>
									<figcaption class="text-help">
										<p class="text-left thumbnail-chart">
											<span class="clearfix center-block">
												<b></b><i>已报名课程</i>
											</span>
											<span class="clearfix center-block">
												<b></b><i>发布课程总量</i>
											</span>
										</p>
										<p class="text-center">
											<i class="fa fa-exclamation-circle"></i>注：鼠标滑过柱形条可查看具体课程数量
										</p>

									</figcaption>
								</figure>
							</div>
						</section>

						<!--课程活跃度和学员活跃度-->
						<section class="panel panel-diy data-chart-visit data-chart-visit-class-student">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-pie-chart"></i>
									课程活跃度和学员活跃度
								</h3>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<figure>
											<figcaption>
												<h3>
													课程活跃度<small>单位(个)</small>
												</h3>
											</figcaption>

											<canvas id="canvas-visit-class" height="250" width="250"></canvas>
										</figure>
									</div>
									<div class="col-md-6">
										<figure>
											<figcaption>
												<h3>
													学员活跃度<small>单位(%)</small>
												</h3>
											</figcaption>

											<div class="canvas-visit" id="canvas-visit-student" data-dimension="250" data-text="75%" data-info="报名/付费/公益" data-width="30" data-fontsize="38" data-percent="75" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

										</figure>
									</div>
									<div class="col-md-6">
										<p class="text-center text-help">
											<i class="fa fa-exclamation-circle"></i>注：鼠标滑过饼状图可查看课程活跃度
										</p>
									</div>

									<div class="col-md-6">
										<p class="text-center text-help">
											<i class="fa fa-exclamation-circle"></i>注：活跃度相对于注册学员总数
										</p>
									</div>

								</div>

							</div>
						</section>

						<!--学员月活跃度-->
						<section class="panel panel-diy data-chart-visit data-chart-visit-month-student">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-pie-chart"></i>
									学员月活跃度
									<small>单位(人)</small>
								</h3>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<figure>
											<figcaption>
												<h3>七月</h3>
											</figcaption>

											<div class="canvas-visit" id="canvas-visit-july-student" data-dimension="250" data-text="65%" data-width="10" data-fontsize="38" data-percent="65" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

										</figure>
									</div>
									<div class="col-md-4">
										<figure>
											<figcaption>
												<h3>八月</h3>
											</figcaption>

											<div class="canvas-visit" id="canvas-visit-august-student" data-dimension="250" data-text="46%" data-width="10" data-fontsize="38" data-percent="46" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

										</figure>
									</div>
									<div class="col-md-4">
										<figure>
											<figcaption>
												<h3>九月</h3>
											</figcaption>

											<div class="canvas-visit" id="canvas-visit-september-student" data-dimension="250" data-text="62%" data-width="10" data-fontsize="38" data-percent="62" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

										</figure>
									</div>
								</div>
								<div class="row">

									<div class="col-md-8">
										<p class="text-center text-help">
											<i class="fa fa-exclamation-circle"></i>注：活跃度相对于注册学员总数
										</p>
									</div>

									<!-- Add the extra clearfix for only the required viewport -->
									<div class="clearfix visible-xs-block"></div>

									<div class="col-md-4">
										<p class="text-center text-help">

											<a role="button" data-toggle="collapse" href="#collapse-content" aria-expanded="false" aria-controls="collapse-content">
												<i class="fa fa-chevron-circle-down"></i>以往月活跃度
											</a>

										</p>
									</div>

									<div class="col-md-12">

										<div class="collapse" id="collapse-content">
											<div class="panel panel-default">

												<div class="row">
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-january-student" data-dimension="250" data-text="33%" data-info="一月" data-width="10" data-fontsize="38" data-percent="33" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-february-student" data-dimension="250" data-text="45%" data-info="二月" data-width="10" data-fontsize="38" data-percent="45" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-march-student" data-dimension="250" data-text="26%" data-info="三月" data-width="10" data-fontsize="38" data-percent="26" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-april-student" data-dimension="250" data-text="50%" data-info="四月" data-width="10" data-fontsize="38" data-percent="50" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-may-student" data-dimension="250" data-text="60%" data-info="五月" data-width="10" data-fontsize="38" data-percent="60" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

														<div class="canvas-visit" id="canvas-visit-june-student" data-dimension="250" data-text="35%" data-info="六月" data-width="10" data-fontsize="38" data-percent="35" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>

													<!--
													<div class="col-md-4">

															<div class="canvas-visit" id="canvas-visit-october-student" data-dimension="250" data-text="99%" data-info="十月" data-width="10" data-fontsize="38" data-percent="99" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

															<div class="canvas-visit" id="canvas-visit-november-student" data-dimension="250" data-text="10%" data-info="十一月" data-width="10" data-fontsize="38" data-percent="10" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													<div class="col-md-4">

															<div class="canvas-visit" id="canvas-visit-december-student" data-dimension="250" data-text="90%" data-info="十二月" data-width="10" data-fontsize="38" data-percent="90" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>

													</div>
													-->

												</div>

											</div>
										</div>
										<!--/.collapse END-->
									</div>
								</div>
							</div>
						</section>

						<!--访问量-->
						<section class="panel panel-diy data-chart-tally">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-hand-pointer-o"></i>访问量
									<small>单位(人)</small>
								</h3>
							</header>

							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>日期</th>
										<th>学员总数</th>
										<th>讲师总数</th>
										<th>课程总数</th>
										<th>招生中课程总数</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th scope="row">总计</th>
										<td>434</td>
										<td>53546</td>
										<td>5656</td>
										<td>333</td>
									</tr>
								</tfoot>
								<tbody>
									<tr>
										<th scope="row">2015-07-06</th>
										<td>434</td>
										<td>53546</td>
										<td>5656</td>
										<td>333</td>
									</tr>
									<tr>
										<th scope="row">2015-07-06</th>
										<td>434</td>
										<td>53546</td>
										<td>5656</td>
										<td>333</td>
									</tr>
									<tr>
										<th scope="row">2015-07-06</th>
										<td>434</td>
										<td>53546</td>
										<td>5656</td>
										<td>333</td>
									</tr>
								</tbody>
							</table>

						</section>

						<!--访问量统计-->
						<section class="panel panel-diy data-chart-tally-visit">
							<header class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-hand-pointer-o"></i>
									访问量统计
									<small>单位(人)</small>
								</h3>
							</header>

							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>日期</th>
										<th>日均访问量</th>
										<th>跳转兴趣页</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th scope="row">总访问量</th>
										<td colspan="2">434066</td>
									</tr>
								</tfoot>
								<tbody>
									<tr>
										<th scope="row">2015-05-29</th>
										<td>435444</td>
										<td>
											<!--由于兴趣页可能会有好几个，这里采用ul列表-->
											<ul class="list-unstyled">
												<li>国学经典</li>
												<li>中医养生</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th scope="row">2015-05-29</th>
										<td>434</td>
										<td>
											<!--由于兴趣页可能会有好几个，这里采用ul列表-->
											<ul class="list-unstyled">
												<li>茶道茶艺</li>
												<li>中华武术</li>
												<li>中式香道</li>
												<li>关于我们</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th scope="row">2015-05-29</th>
										<td>434</td>
										<td>
											<!--由于兴趣页可能会有好几个，这里采用ul列表-->
											<ul class="list-unstyled">
												<li>中式香道</li>
												<li>联系我们</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</section>

					</div>
				</div>
			</main>
			<!--/.site-main end -->

		</div>
		<!--/.site-wrap end-->

		<!-- Placed at the end of the document so the pages load faster -->
		<!-- Bootstrap core JavaScript -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/jquery.scrollUp.min.js"></script>
		<!--图表插件/.Chartjs-->
		<!--中文文档：http://www.bootcss.com/p/chart.js/docs/-->
		<!--英文文档：http://www.chartjs.org/docs/-->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/Chart.min.js"></script>

		<!--[if IE 8]>
            <script src="assets/js/help/excanvas.js"></script>
        <![endif]-->

		<script>
			 //▼订单总金额▼
			$(function() {
				var ctx = $('#canvas-money').get(0).getContext('2d');
				var data = {
					labels: ['国学经典', '中医养生', '禅修瑜伽', '茶道茶艺', '中式香道', '民乐曲艺', '书法绘画', '花卉艺术', '中华武术', '传统服饰', '其他'],
					datasets: [{
						fillColor: 'rgba(52, 152, 219, 0.8)',
						highlightFill: 'rgba(0, 163, 124, 0.6)',
						data: [15000, 8600, 10000, 20000, 30000, 6000, 48000, 10000, 19000, 26000, 39000]
					}]
				};
				var options = {
					barStrokeWidth: 1,
					scaleFontSize: 16,
					responsive: true
				};
				new Chart(ctx).Bar(data, options);
			});
			 //------------------------------
			 //▼已报名课程和各分类发布课程总量▼
			$(function() {
				var ctx = $('#canvas-class').get(0).getContext('2d');
				var data = {
					labels: ['国学经典', '中医养生', '禅修瑜伽', '茶道茶艺', '中式香道', '民乐曲艺', '书法绘画', '花卉艺术', '中华武术', '传统服饰', '其他'],
					datasets: [{
						fillColor: "rgba(182,201,219, 0.7)",
						strokeColor: "rgba(151, 187, 205, 1)",
						data: [208, 148, 240, 109, 396, 227, 100, 408, 400, 109, 201]
					}, {
						fillColor: 'rgba(52, 152, 219, 0.8)',
						highlightFill: 'rgba(0, 163, 124, 0.6)',
						data: [280, 408, 400, 309, 260, 307, 200, 450, 500, 405, 340]
					}]
				};
				var options = {
					barStrokeWidth: 1,
					scaleFontSize: 16,
					responsive: true
				};
				new Chart(ctx).Bar(data, options);
			});
			 //------------------------------
			 //▼课程活跃度▼
			 //数据逻辑:
			 //++++++++分子： 已报名课程
			 //++++++++分母：已报名课程总量
			$(function() {
				var pieData = [{
					value: 220,
					color: "#F38630",
					label: "国学经典"
				}, {
					value: 50,
					color: "#69D2E7",
					label: "中医养生"
				}, {
					value: 60,
					color: "#F46A56",
					label: "禅修瑜伽"
				}, {
					value: 70,
					color: "#CC9999",
					label: "茶道茶艺"
				}, {
					value: 90,
					color: "#F38630",
					label: "中式香道"
				}, {
					value: 100,
					color: "#EBF1F4",
					label: "民乐曲艺"
				}, {
					value: 120,
					color: "#FF66FF",
					label: "书法绘画"
				}, {
					value: 200,
					color: "#33CC66",
					label: "花卉艺术"
				}, {
					value: 120,
					color: "#6699FF",
					label: "中华武术"
				}, {
					value: 60,
					color: "#339999",
					label: "传统服饰"
				}, {
					value: 50,
					color: "#999999",
					label: "其他"
				}];
				var myPie = new Chart(document.getElementById("canvas-visit-class").getContext("2d")).Doughnut(pieData);
			});
		</script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/jquery.circliful.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dataAnalysisAssets/js/main.js"></script>