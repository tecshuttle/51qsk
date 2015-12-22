<section class="admin-content pull-right match-item">

							<h3><i class="fa fa-list-ul"></i>场地订单</h3>

							<div class="admin-top-bar admin-table admin-size-sm admin-table-list admin-order-list">
							<?php if($status == 1):?>
								<table class="table">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>场地名称</th>
											<th>预定时间</th>
											<th>定金</th>
											<th>状态</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($placeBookings as $PlaceBooking) {?>
										<tr>
											<td width="150">
												<a href="#">
													<img class="img-responsive" src="<?php echo $PlaceBooking->place->pic_adr?>">
												</a>
											</td>
											<td width="150"><?php echo $PlaceBooking->place->name?></td>
											<td width="200"><?php echo $PlaceBooking->date?></td>
											<td width="100"><?php echo $PlaceBooking->place->price?></td>
											<td width="120">
												<span class="center-block history">已付定金</span>
												<a class="btn btn-red btn-sm btn-sm-padding" href="<?=Yii::app()->createUrl('master/default/review',array('id' => $PlaceBooking['place_id']))?>">去评价</a>
											</td>
										</tr>
										<?php }?>


									</tbody>
								</table>

								<!--分页-->
								<nav class="text-center cp-pagination">
									<?php if ($pager->pageCount > 1 || true) { ?>
									<ul class="pagination pagination-sm">
										<li><a href="<?php echo Yii::app()->createUrl('master/default/place', array_merge($_GET, array('page' => 1)))?>">页首</a>
										</li>
										<li>
										<?php if ($pager->currentPage == 0) {?>
											<a disabled href="#" aria-label="Previous">
												<span aria-hidden="true">上一页</span>
											</a>
										<?php }else {?>
											<a disabled href="<?php echo Yii::app()->createUrl('master/default/place', array_merge($_GET, array('page' => $pager->currentPage)))?>" aria-label="Previous">
												<span aria-hidden="true">上一页</span>
											</a>
										<?php }?>

										<?php
										$page = intval($pager->currentPage + 1) == 0 ? 1 : intval($pager->currentPage + 1); //当前页码

										$num = 5; //显示页码个数
										$total = $pager->pageCount; //总页数

										$start = 0; //开始页码
										$end = 0; //末尾页码

										if ($page > $total) {
											$page = $total;
										}

										$nums1 = intval($num / 2); //开始项当前的个数
										$nums2 = $num % 2 == 0 ? $nums1 - 1 : $nums1; //末尾项当前的个数 判断是偶数还是奇数,是偶数就减1

										if ($page <= $num - $nums2) //当前页数小于或等于显示页码减去末尾项,当前位置还处于页码范围
										{
											$start = 1;
											$end = $num;
										} else {
											$start = $page - $nums1;
											$end = $page + $nums2;
										}

										/*当计算出来的末尾项大于总页数*/
										if ($end > $total) {
											$start = ($total - $num) + 1 > 0 ? ($total - $num) + 1 : 1; //开始项等于总页数减去要显示的数量然后再自身加1

											$end = $total;
										}
										for ($i = $start;
											 $i <= $end;
											 $i++) {
										?>
										<li <?= $i == $page ? 'class="active"' : '' ?>><a
												href='<?php echo Yii::app()->createUrl('master/default/place', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
										</li>
										<?php }?>
										<li>
										<?php if ($pager->currentPage >= $pager->pageCount - 1) {?>
											<a href="#" aria-label="Next">
												<span aria-hidden="true">下一页</span>
											</a>
										<?php } else{?>
											<a href="<?php echo Yii::app()->createUrl('master/default/place', array_merge($_GET, array('page' => $pager->currentPage + 2)))?>" aria-label="Next">
												<span aria-hidden="true">下一页</span>
											</a>
										<?php }?>
										</li>
										<li><a href="<?php echo Yii::app()->createUrl('master/default/place', array_merge($_GET, array('page' => $pager->pageCount)))?>">页尾</a>
										</li>

									</ul>
									<?php }?>
								</nav>
								<?php else:?>
										<section class="list-teacher cp-media-sm cp-border-dotted">
											<span class="h4 text-danger">
												<i class="fa fa-exclamation-circle"></i>&nbsp;您暂未通过审核
											</span>
										</section>
								<?php endif;?>

							</div>
							<!--/.Admin-table END-->

						</section>
						<!--/.Admin-content END-->