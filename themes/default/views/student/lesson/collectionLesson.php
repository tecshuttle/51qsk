<h3><i class="fa fa-list-ul"></i>我的课程</h3>
<div class="admin-table admin-tab admin-size-sm admin-table-list admin-class-list">
								<table class="table">
									<caption>
										<a class="active" href="<?= Yii::app()->createUrl('student/lesson/collectionLesson') ?>">收藏课程</a>
										<a href="<?= Yii::app()->createUrl('student/lesson/list') ?>">已报名课程</a>
										<a href="<?= Yii::app()->createUrl('student/lesson/expiredLesson') ?>">过期课程</a>
									</caption>
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>课程名称</th>
											<th>时间</th>
											<th>状态</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($collectionLessons as $collectionLesson): ?>
										<tr>
											<td width="150">
												<a href="<?= $this->createUrl('/lesson/view', array('id' => $collectionLesson['lesson_id'])) ?>">
													<img class="img-responsive" src="<?= $collectionLesson['pic'] ?>">
												</a>
											</td>
											<td width="200">
												<a href="<?= $this->createUrl('/lesson/view', array('id' => $collectionLesson['lesson_id'])) ?>">
													<?= $collectionLesson['name'] ?>
												</a>
											</td>
											<td width="220">
												<?= substr($collectionLesson['start_date_time'], 0, 10) ?><br/>
												<?= substr($collectionLesson['end_date_time'], 0, 10) ?>
											</td>
											<td width="150">
											<?php echo $collectionLesson['is_arrival'] == 1 ?
												'<span class="center-block history">已上课</span>
												<a class="btn btn-red btn-sm btn-sm-padding" href=" ' .Yii::app()->createUrl('student/lesson/review',array('id' => $collectionLesson['lesson_id'])).'">去评价</a>'
												:
												'<span class="center-block not">未上课</span>';
												?>
											</td>
										</tr>
									<?php endforeach;?>

									</tbody>
								</table>

								<!--分页-->
									<nav class="text-center cp-pagination">
										<?php if ($pager->pageCount > 1 || true) { ?>
											<ul class="pagination pagination-sm">
												<li>
													<a href="<?php echo Yii::app()->createUrl('student/lesson/collectionLesson', array_merge($_GET, array('page' => 1))) ?>">页首</a>
												</li>
												<li>
													<?php if ($pager->currentPage == 0) { ?>
														<a disabled href="#" aria-label="Previous">
															<span aria-hidden="true">上一页</span>
														</a>
													<?php } else { ?>
														<a disabled href="<?php echo Yii::app()->createUrl('student/lesson/collectionLesson', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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
														href='<?php echo Yii::app()->createUrl('student/lesson/collectionLesson', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
												</li>
												<?php } ?>
												<li>
													<?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
														<a href="#" aria-label="Next">
															<span aria-hidden="true">下一页</span>
														</a>
													<?php } else { ?>
														<a href="<?php echo Yii::app()->createUrl('student/lesson/collectionLesson', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
															<span aria-hidden="true">下一页</span>
														</a>
													<?php } ?>
												</li>
												<li>
													<a href="<?php echo Yii::app()->createUrl('student/lesson/collectionLesson', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
												</li>

											</ul>
										<?php } ?>
									</nav>
							</div>