<h3><i class="fa fa-list-ul"></i>我的课程</h3>
<div class="admin-table admin-tab admin-size-sm admin-table-list admin-class-list">
								<table class="table">
									<caption>
										<a href="<?= Yii::app()->createUrl('student/lesson/collectionLesson') ?>">收藏课程</a>
										<a class="active" href="<?= Yii::app()->createUrl('student/lesson/list') ?>">已报名课程</a>
										<a href="<?= Yii::app()->createUrl('student/lesson/expiredLesson') ?>">过期课程</a>
									</caption>
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>课程名称</th>
											<th>时间</th>
											<th>状态</th>
											<th>验证码<th>
										</tr>
									</thead>
									<tbody>
									
									<?php foreach ($lessons as $lesson): ?>
										<tr>
											<td width="150">
												<a href="<?= $this->createUrl('/lesson/view', array('id' => $lesson['id'])) ?>">
													<img class="img-responsive" src="<?= $lesson['pic'] ?>">
												</a>
											</td>

											<td width="200">
												<a href="<?= $this->createUrl('/lesson/view', array('id' => $lesson['id'])) ?>">
													<?= $lesson['name'] ?>
												</a>
											</td>

											<td width="220">
												<?= substr($lesson['start_date_time'], 0, 10) ?><br/>
												<?= substr($lesson['end_date_time'], 0, 10) ?>
											</td>

											<td width="150"><?= $lesson['is_arrival'] == 0 ? '未签到' : '已签到' ?></td>
											<td width="150"><?= $lesson['qrcode'] ?></td>
										</tr>
										
									<?php endforeach; ?>
									</tbody>
								</table>

								<!--分页-->
									<nav class="text-center cp-pagination">
										<!--active为选中类-->
										<!--disabled为禁用属性-->
										<!--当前页属于首页或者末页时，应当为"上一页"和"下一页"添加disabled禁用属性-->
										<?php if ($pager->pageCount > 1 || true) { ?>
											<ul class="pagination pagination-sm">
												<li>
													<a href="<?php echo Yii::app()->createUrl('student/lesson/list', array_merge($_GET, array('page' => 1))) ?>">页首</a>
												</li>
												<li>
													<?php if ($pager->currentPage == 0) { ?>
														<a disabled href="#" aria-label="Previous">
															<span aria-hidden="true">上一页</span>
														</a>
													<?php } else { ?>
														<a disabled href="<?php echo Yii::app()->createUrl('student/lesson/list', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
															<span aria-hidden="true">上一页</span>
														</a>
													<?php } ?>

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
														href='<?php echo Yii::app()->createUrl('student/lesson/list', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
												</li>
												<?php } ?>
												<li>
													<?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
														<a href="#" aria-label="Next">
															<span aria-hidden="true">下一页</span>
														</a>
													<?php } else { ?>
														<a href="<?php echo Yii::app()->createUrl('student/lesson/list', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
															<span aria-hidden="true">下一页</span>
														</a>
													<?php } ?>
												</li>
												<li>
													<a href="<?php echo Yii::app()->createUrl('student/lesson/list', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
												</li>

											</ul>
										<?php } ?>
									</nav>
							</div>	
