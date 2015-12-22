<section class="admin-content pull-right match-item">
    <h3><i class="fa fa-list-ul"></i>我的课程</h3>

    <div class="admin-top-bar admin-table admin-size-sm admin-table-list admin-class-list">
	<?php if($status == 1):?>
        <table class="table">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>课程名称</th>
                <th>时间</th>
                <th>报名数</th>
                <th>二维码</th>
            </tr>
            </thead>

        <div class="text-left add-dom">
            <a class="btn btn-red btn-normer btn-lg-padding" href="<?= Yii::app()->createUrl('master/default/addlesson') ?>" role="button">
                <i class="fa fa-plus"></i>增加课程
            </a>
        </div>

            <tbody>
            <?php foreach ($lessons as $lesson):
                $students = Student::model()->findAll();
                ?>

                <tr>
                    <td width="150">
                        <a href="<?= Yii::app()->createUrl('lesson/view', array('id' => $lesson->id)); ?>">
                            <img class="img-responsive" src="<?= $lesson->pic ?>">
                        </a>
                    </td>
                    <td width="150">
                        <a href="<?= Yii::app()->createUrl('master/default/updateLesson', array('id' => $lesson->id)); ?>">
                            <?= $lesson->name ?>
                        </a>
                        <br/>
                        <a href="<?= Yii::app()->createUrl('master/default/lessonStudent', array('id' => $lesson->id)); ?>" class="center-block color-red dropdown-toggle">
                            查看学员<i class="fa fa-angle-double-right"></i>
                        </a>
                    </td>

                    <td width="140"><?= DATE_FORMAT(DATE_CREATE($lesson->start_date_time), 'Y.m.d') . '<br/> 至 <br/>' . DATE_FORMAT(DATE_CREATE($lesson->end_date_time), 'Y.m.d'); ?></td>
                    <td width="120">已报名 <span class="color-red"><?= $lesson->actual_students ?></span> / <?php echo $lesson->max_students != 0 ? '限'.$lesson->max_students : '不限'?>
                    </td>
                    <td width="140">
                        <!--放图片就行-->
                        <!--务必给图片加 class="img-responsive"-->
                        <i class="fa fa-qrcode fa-5x"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!--分页-->
        <nav class="text-center cp-pagination">
            <?php if ($pager->pageCount > 1 || true) { ?>
                <ul class="pagination pagination-sm">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => 1))) ?>">页首</a>
                    </li>
                    <li>
                        <?php if ($pager->currentPage == 0) { ?>
                            <a disabled href="#" aria-label="Previous"> <span aria-hidden="true">上一页</span> </a>
                        <?php } else { ?>
                            <a disabled href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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
                            href='<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
                    </li>
                    <?php } ?>

                    <li>
                        <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                            <a href="#" aria-label="Next"> <span aria-hidden="true">下一页</span> </a>
                        <?php } else { ?>
                            <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
                                <span aria-hidden="true">下一页</span>
                            </a>
                        <?php } ?>
                    </li>

                    <li>
                        <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
                    </li>

                </ul>
            <?php } ?>
        </nav>
		<?php else:?>
				<section class="list-teacher cp-media-sm cp-border-dotted">
					<span class="h4 text-danger">
						<i class="fa fa-exclamation-circle"></i>&nbsp;您暂未通过审核
					</span>
				</section>
		<?php endif;?>
    </div>

</section>