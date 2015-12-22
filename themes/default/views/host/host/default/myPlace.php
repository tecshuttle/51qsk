<section class="admin-content pull-right match-item">
    <h3><i class="fa fa-list-ul"></i>我的场地</h3>

    <div class="md-palce admin-top-bar admin-list">
            <section class="list-teacher cp-media-sm cp-border-dotted">
                <figure class="media">
                    <div class="media-left">
                        <a href="<?= Yii::app()->createUrl('place/view', array('id' => $place->id)) ?>">
                            <img class="media-object" src="<?php echo $place->pic; ?>">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <h3 class="media-heading"><?php echo $place->name; ?></a></h3>

                        <?php if ($place->status == 0) : ?>
                            <span class="center-block" style="color:orange;">审核未通过</span>
                        <?php else: ?>
                            <span class="center-block" style="color:limegreen;">审核通过</span>
                        <?php endif; ?>

                        <span class="center-block"><?php echo $place->address; ?></span>
                        <span class="center-block"><?php echo $place->service; ?></span>
                        <ul class="list-inline">
                            <li>面积：<?php echo $place->space; ?>㎡</li>
                            <li>可容纳：<?php echo $place->people; ?>人</li>

                            <a class="btn btn-red btn-normer btn-lg-padding pull-right" href="<?= Yii::app()->createUrl('host/default/Updateplace', array('id' => $place->id)) ?>" role="button">
                                编辑场地
                            </a>
                        </ul>
                    </figcaption>
                </figure>
				
					<h3><i class="fa fa-list-ul"></i> 客户评分</h3>
					 <div class="admin-top-bar admin-table admin-size-sm admin-master-order-list">

							<div class="admin-comment">
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
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
							<!--/.Admin-comment END-->
					</div>
				
				<h3><i class="fa fa-list-ul"></i> 订单详情</h3>
				<figure class="media">
                    <figcaption class="media-body">
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
										<?php endforeach;?>
									</tbody>
								</table>

							</div>
							<!--/.Admin-table END-->
                    </figcaption>
                </figure>
            </section>
			
			

        <?php if (count($place) === 0) : ?>
            <footer class="text-center add-dom">
                <a class="btn btn-red btn-normer btn-lg-padding" href="<?= Yii::app()->createUrl('host/default/addplace') ?>" role="button">
                    发布场地
                </a>
            </footer>
        <?php endif; ?>

    </div>
</section>
