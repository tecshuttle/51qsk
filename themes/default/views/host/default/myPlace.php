<section class="admin-content pull-right match-item">
    <h3><i class="fa fa-list-ul"></i>我的场地</h3>

    <div class="md-palce admin-top-bar admin-list">
			<?php if($status == 1):?>
            <section class="list-teacher cp-media-sm cp-border-dotted">

                <figure class="media">
				<?php if($place->id != ''):?>
                    <div class="media-left">
                        <a href="<?= Yii::app()->createUrl('place/view', array('id' => $place->id)) ?>">
                            <img class="media-object" src="<?php echo $place -> pic_adr; ?>">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <h3 class="media-heading"><a href="#"><?php echo $place -> name; ?></a></h3>

                        <?php if ($place->status == 0) : ?>
                            <span class="center-block" style="color:orange;">审核未通过</span>
                        <?php else: ?>
                            <span class="center-block" style="color:limegreen;">审核通过</span>
                        <?php endif; ?>

                        <span class="center-block"><?php echo $place -> address; ?></span>
                        <span class="center-block"><?php echo $place -> service; ?></span>
                        <ul class="list-inline">
                            <li>面积：<?php echo $place -> space; ?>㎡</li>
                            <li>可容纳：<?php echo $place -> people; ?>人</li>

                            <a class="btn btn-red btn-normer btn-lg-padding pull-right" href="<?= Yii::app()->createUrl('host/default/Updateplace', array('id' => $place->id)) ?>" role="button">
                                编辑场地
                            </a>
                        </ul>
                    </figcaption>
				<?php else:?>
					<figcaption class="media-body">
						<?php if (count($place) === 0) : ?>
							<div class="text-right">
							<span class="text-danger">
								<i class="fa fa-exclamation-circle"></i>&nbsp;暂无场地&nbsp;&nbsp;&nbsp;
								</span>
								<a class="btn btn-red btn-normer btn-lg-padding" href="<?= Yii::app()->createUrl('host/default/addplace') ?>" role="button">
									发布场地
								</a>
							</div>
						<?php endif; ?>
					</figcaption>
				<?php endif;?>
                </figure>
					<?php if($teachers != null):?>
					<h3><i class="fa fa-heart-o"></i> 客户评分</h3>
					 <div class="admin-top-bar admin-table admin-size-sm admin-master-order-list">

								<table class="table">
									<thead>
										<tr>
											<th>预订人</th>
											<th>交通便利</th>
											<th>设施齐全</th>
											<th>美观舒适</th>
											<th>服务质量</th>
											<th>综合</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($placeReview as $pReview):?>
										<tr>
											<td width="60">
												<?php
													$t = Teacher::model()->findByPk($pReview['teacher_id']);
													echo $t['name'];
												?>
											</td>
											<td width="50"><?= $pReview['traffic']?></td>
											<!--使用转义字符是个好的习惯-->
											<td width="50"><?= $pReview['equipment']?></td>
											<!--务必为已过期添加s标签-->
											<td width="50"><?= $pReview->feel?>
											</td>
											<td width="50">
												<?= $pReview['service']?>
											</td>
											<td width="50">
												<?php 
													$complex = ($pReview['service']+$pReview->feel+$pReview['equipment']+$pReview['traffic'])/4*2;
													echo round($complex)/2;
												?>
											</td>

										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

					</div>

				<h4><i class="fa fa-file-text-o"></i>&nbsp;订单详情</h4>
                        <div class="admin-top-bar admin-table admin-size-sm admin-master-order-list">
								<table class="table">
									<thead>
										<tr>
											<th>预订人</th>
											<th>联系方式</th>
											<th>预定时间</th>
											<th>定金</th>
											<th>状态</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($teachers as $teacher):?>
										<tr>
											<td width="100"><?= $teacher['name']?></td>
											<td width="100"><?= $teacher['phone']?></td>
											<!--使用转义字符是个好的习惯-->
											<td width="200"><?= $teacher['date']?></td>
											<!--务必为已过期添加s标签-->
											<td width="100"><span class="color-red"><?= $place->price?></span>
											</td>
											<td width="80">
												<span class="history"><?= $teacher['status'] ? '已支付' : '待支付'?></span>
											</td>

										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

							</div>
				<?php endif;?>
            </section>
			<?php else:?>
				<section class="list-teacher cp-media-sm cp-border-dotted">
					<span class="h4 text-danger">
						<i class="fa fa-exclamation-circle"></i>&nbsp;您暂未通过审核
					</span>
				</section>
			<?php endif;?>
    </div>
</section>
